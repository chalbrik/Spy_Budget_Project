<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;
use Framework\Exceptions\ValidationException;

class TransactionService
{

    public function __construct(private Database $db)
    {
    }

    public function create(array $formData)
    {

        $currentUserId = $_SESSION['user'];

        if ($formData['form_type'] == "income") {

            $this->db->query(
                "
            INSERT INTO incomes(income_amount, income_date, income_category_assigned_to_user_id, income_note, user_id)
            VALUES(:incomeAmount, :incomeDate, :incomeCategory, :incomeNote, :userId) 
            ",
                [
                    'incomeAmount' => $formData['amount'],
                    'incomeDate' => $formData['transaction-date'],
                    'incomeCategory' => 21,
                    'incomeNote' => $formData['note'],
                    'userId' => $currentUserId

                ]
            );
        } else if ($formData['form_type'] == "expense") {
            $this->db->query(
                "
            INSERT INTO expenses(expense_amount, expense_date, expense_category_assigned_to_user_id, expense_note, user_id)
            VALUES(:expenseAmount, :expenseDate, :expenseCategory, :expenseNote, :userId) 
            ",
                [
                    'expenseAmount' => $formData['amount'],
                    'expenseDate' => $formData['transaction-date'],
                    'expenseCategory' => 21,
                    'expenseNote' => $formData['note'],
                    'userId' => $currentUserId

                ]
            );
        }
    }
}
