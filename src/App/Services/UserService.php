<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;
use Framework\Exceptions\ValidationException;

//ta klasa komunikuje sie z bazą danych
//jej zadaniem jest rejestrownie używkownika oraz logowanie użytkownika

class UserService
{
    public function __construct(private Database $db)
    {
    }

    public function isEmailTaken(string $email)
    {
        $emailCount = $this->db->query(
            "SELECT COUNT(*) FROM user_data WHERE address_email = :email",
            [
                'email' => $email
            ]
        )->count();

        if ($emailCount > 0) {
            throw new ValidationException(['email' => ['Email taken']]);
        }
    }

    public function create(array $formData)
    {

        $password = password_hash($formData['password-register'], PASSWORD_BCRYPT, ['cost' => 12]);

        $this->db->query(
            "INSERT INTO user_data(user_name, password, address_email) 
            VALUES(:username, :password, :email)",
            [
                'username' => $formData['username-register'],
                'password' =>  $password,
                'email' => $formData['email-register']
            ]
        );

        //poniżej fragment kodu, który umożliwi zalogowanie sie użytkownika od razu do portalu po rejestracji, zanim to oczywiscie ponowne utorzenie id sesji dla bezpieczeństwa strony przed atakiem xss
        session_regenerate_id();

        $_SESSION['user'] = $this->db->id();
    }

    public function assignDefaultCategoriesToUser()
    {
        $this->db->query('INSERT INTO incomes_category_assigned_to_users(income_category_assigned_to_user_id, user_id, income_category_name)
        SELECT NULL, :userId, income_category_name
        FROM incomes_category_default', [
            'userId' => $_SESSION['user']
        ]);

        $this->db->query('INSERT INTO expenses_category_assigned_to_users(expense_category_assigned_to_user_id, user_id, expense_category_name)
        SELECT NULL, :userId, expense_category_name
        FROM expenses_category_default', [
            'userId' => $_SESSION['user']
        ]);
    }

    public function login(array $formData)
    {

        $user = $this->db->query("SELECT * FROM user_data WHERE address_email = :email", [
            'email' => $formData['email-login']
        ])->find(); //celem metody find będzie odzyskanie wartości z zapytania

        $passwordMatch = password_verify($formData['password-login'], $user['password'] ?? '');

        if (!$user || !$passwordMatch) {
            throw new ValidationException(['password-login' => ['Invalid credentials']]);
        }

        session_regenerate_id(); //kolejna metoda służąca zabezpieczeniu strony przed atakami xss, id sesji zostanie zregenorowane kiedy użytkownik się zaloguje

        $_SESSION['user'] = $user['user_id'];
    }

    public function logout()
    {
        unset($_SESSION['user']);

        session_regenerate_id();
    }

    public function getUsername(): array
    {
        $userId = $_SESSION['user'];

        return $this->db->query("SELECT user_name FROM user_data WHERE user_id = :userId", [
            'userId' => $userId
        ])->find();
    }
}
