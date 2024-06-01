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

        $password = password_hash($formData['password'], PASSWORD_BCRYPT, ['cost' => 12]);

        $this->db->query(
            "INSERT INTO user_data(user_name, password, address_email) 
            VALUES(:username, :password, :email)",
            [
                'username' => $formData['username'],
                'password' =>  $password,
                'email' => $formData['email']
            ]
        );
    }
}
