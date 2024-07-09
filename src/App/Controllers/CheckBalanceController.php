<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{TransactionService, UserService};

class CheckBalanceController
{
    public function __construct(private TemplateEngine $view, private TransactionService $transactionService, private UserService $userService)
    {
    }

    public function checkBalance()
    {

        unset($_SESSION['settings-field-name']);

        //tutaj trzeba wcześniej zastosowac metody, które wysyłają zapytania do bazy danych o dane dotyczące przychodów i wydatków aby móc je wyświeltlać na stronie

        $transactionsData = $this->transactionService->getTransactionsData();

        //zapisanie pobranych danych transakcyjnych do odpowiednich zmiennych

        $totalIncomesAmount = $transactionsData['total_incomes_amount'];
        $totalExpensesAmount = $transactionsData['total_expenses_amount'];
        $incomesLabels = $transactionsData['incomes_labels'];
        $incomesValues = $transactionsData['incomes_values'];
        $expensesLabels = $transactionsData['expenses_labels'];
        $expensesValues = $transactionsData['expenses_values'];

        //pobranie nazwy użytkownika z bazy danych

        $usernameData = $this->userService->getUsername();
        $username = $usernameData["user_name"];

        echo $this->view->render(
            "/check-balance.php",
            [
                'username' => $username,
                'totalIncomesAmount' => $totalIncomesAmount,
                'totalExpensesAmount' => $totalExpensesAmount,
                'incomesLabels' => $incomesLabels,
                'incomesValues' => $incomesValues,
                'expensesLabels' => $expensesLabels,
                'expensesValues' => $expensesValues,
            ]
        );
    }
}
