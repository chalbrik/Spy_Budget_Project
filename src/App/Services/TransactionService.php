<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;
use DateTime;
use Framework\Exceptions\ValidationException;

class TransactionService
{

    public function __construct(private Database $db) {}

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
                    'incomeCategory' => $formData['transaction-category'],
                    'incomeNote' => $formData['note'],
                    'userId' => $currentUserId

                ]
            );
        } else if ($formData['form_type'] == "expense") {
            $this->db->query(
                "
            INSERT INTO expenses(expense_amount, expense_date, expense_category_assigned_to_user_id, payment_method_assigned_to_user_id ,expense_note, user_id)
            VALUES(:expenseAmount, :expenseDate, :expenseCategory, :paymentMethod, :expenseNote, :userId) 
            ",
                [
                    'expenseAmount' => $formData['amount'],
                    'expenseDate' => $formData['transaction-date'],
                    'expenseCategory' => $formData['transaction-category'],
                    'paymentMethod' => 1,
                    'expenseNote' => $formData['note'],
                    'userId' => $currentUserId

                ]
            );
        }
    }

    public function applyCategoriesToForm(string $transactionsType): array
    {
        $currentUserId = $_SESSION['user'];

        if ($transactionsType == "incomes") {
            $diplayedCategories = $this->db->query("SELECT income_category_assigned_to_user_id, income_category_name  FROM incomes_category_assigned_to_users WHERE user_id = :userId", [
                'userId' => $currentUserId
            ])->findAll();
        } else if ($transactionsType == "expenses") {
            $diplayedCategories = $this->db->query("SELECT expense_category_assigned_to_user_id, expense_category_name, category_limit FROM expenses_category_assigned_to_users WHERE user_id = :userId", [
                'userId' => $currentUserId
            ])->findAll();
        }

        return $diplayedCategories;
    }

    public function getCategoryLimit(string $categoryId)
    {
        $currentUserId = $_SESSION['user'];

        if ($categoryId) {
            $categoryLimit = $this->db->query("SELECT category_limit FROM expenses_category_assigned_to_users WHERE user_id = :userId AND expense_category_assigned_to_user_id  = :categoryId", [
                'userId' => $currentUserId,
                'categoryId' => $categoryId
            ])->find();
        }

        return $categoryLimit;
    }

    public function getTransactionsData(): array
    {
        $currentUserId = $_SESSION['user'];
        $transactionsdata = [];


        if (isset($_POST['date'])) {
            $selectedTimeFrame = $_POST['date'];
        } else {
            $selectedTimeFrame = "current-month";
        }

        // Zapisanie wybranej opcji do sesji
        $_SESSION['selectedTimePeriod'] = $selectedTimeFrame;

        // Bazowe zapytania SQL
        $baseQueryIncome =
            'SELECT
                incomes_category_assigned_to_users.income_category_name,
                incomes.user_id,
                SUM(incomes.income_amount) AS overall_income
                FROM incomes_category_assigned_to_users
                INNER JOIN incomes ON incomes.income_category_assigned_to_user_id = incomes_category_assigned_to_users.income_category_assigned_to_user_id
                WHERE incomes.user_id = :logged_user_id';

        $baseQueryExpenses =
            'SELECT
                expenses_category_assigned_to_users.expense_category_name,
                expenses.user_id,
                SUM(expenses.expense_amount) AS overall_expense
                FROM expenses_category_assigned_to_users
                INNER JOIN expenses ON expenses.expense_category_assigned_to_user_id = expenses_category_assigned_to_users.expense_category_assigned_to_user_id
                WHERE expenses.user_id = :logged_user_id';

        // Dodanie warunków w zależności od wybranego okresu
        switch ($selectedTimeFrame) {
            case 'all-history':
                // Nie wymaga dodatkowych warunków
                break;
            case 'current-month':
                $startDate = date("Y-m-01");
                $endDate = date('Y-m-t');
                break;
            case 'previous-month':
                $startDate = date("Y-m-01", strtotime("-1 month"));
                $endDate = date('Y-m-t', strtotime("-1 month"));
                break;
        }

        // Rozszerzenie zapytań, jeśli potrzeba
        if (isset($startDate) && isset($endDate)) {
            $dateCondition = " AND incomes.income_date BETWEEN '$startDate' AND '$endDate'";
            $sqlQueryIncomePhrase = $baseQueryIncome . $dateCondition . ' GROUP BY incomes_category_assigned_to_users.income_category_name ORDER BY overall_income DESC';

            $dateCondition = " AND expenses.expense_date BETWEEN '$startDate' AND '$endDate'";
            $sqlQueryExpensesPhrase = $baseQueryExpenses . $dateCondition . ' GROUP BY expenses_category_assigned_to_users.expense_category_name ORDER BY overall_expense DESC';
        } else {
            $sqlQueryIncomePhrase = $baseQueryIncome . ' GROUP BY incomes_category_assigned_to_users.income_category_name ORDER BY overall_income DESC';
            $sqlQueryExpensesPhrase = $baseQueryExpenses . ' GROUP BY expenses_category_assigned_to_users.expense_category_name ORDER BY overall_expense DESC';
        }
        // } else {
        //     $sqlQueryIncomePhrase =
        //         'SELECT
        //     incomes_category_assigned_to_users.income_category_name,
        //     incomes.user_id,
        //     SUM(incomes.income_amount) AS overall_income
        //     FROM
        //     incomes_category_assigned_to_users
        //     INNER JOIN
        //     incomes ON incomes.income_category_assigned_to_user_id = incomes_category_assigned_to_users.income_category_assigned_to_user_id
        //     WHERE
        //     incomes.user_id = :logged_user_id
        //     GROUP BY incomes_category_assigned_to_users.income_category_name
        //     ORDER BY overall_income DESC';

        //     $sqlQueryExpensesPhrase =
        //         'SELECT
        //     expenses_category_assigned_to_users.expense_category_name,
        //     expenses.user_id,
        //     SUM(expenses.expense_amount) AS overall_expense
        //     FROM
        //     expenses_category_assigned_to_users
        //     INNER JOIN
        //     expenses ON expenses.expense_category_assigned_to_user_id = expenses_category_assigned_to_users.expense_category_assigned_to_user_id
        //     WHERE
        //     expenses.user_id = :logged_user_id
        //     GROUP BY expenses_category_assigned_to_users.expense_category_name
        //     ORDER BY overall_expense DESC';
        // }

        // ----Incomes----
        //kwerenda do stworzenia tabeli pobierającej wszystkie kategorie i ich warotść

        $overallIncomesData = $this->db->query($sqlQueryIncomePhrase, [
            'logged_user_id' => $currentUserId
        ])->findAll();


        $incomesLabels = [];
        $incomesValues = [];

        foreach ($overallIncomesData as $overallIncomeData) {
            $incomesLabels[] = $overallIncomeData['income_category_name'];
            $incomesValues[] = $overallIncomeData['overall_income'];
        }

        //sumuj wszystkie wartości
        $totalIncomesAmount = array_sum($incomesValues);

        // ----Expenses----
        //kwerenda do stworzenia tabeli pobierającej wszystkie kategorie i ich warotść

        $overallExpensesData = $this->db->query($sqlQueryExpensesPhrase, [
            'logged_user_id' => $currentUserId
        ])->findAll();

        $expensesLabels = [];
        $expensesValues = [];

        foreach ($overallExpensesData as $overallExpenseData) {
            $expensesLabels[] = $overallExpenseData['expense_category_name'];
            $expensesValues[] = $overallExpenseData['overall_expense'];
        }

        //sumuj wszystkie wartości
        $totalExpensesAmount = array_sum($expensesValues);

        $transactionsdata['total_incomes_amount'] = $totalIncomesAmount;
        $transactionsdata['total_expenses_amount'] = $totalExpensesAmount;
        $transactionsdata['incomes_labels'] = $incomesLabels;
        $transactionsdata['incomes_values'] = $incomesValues;
        $transactionsdata['expenses_labels'] = $expensesLabels;
        $transactionsdata['expenses_values'] = $expensesValues;


        return  $transactionsdata;
    }

    public function addNewIncomeCategory(array $formData)
    {
        $incomeCategoryName = $formData['new-income-category'];

        $incomeCategoryName = formatString($incomeCategoryName);

        $userId = $_SESSION['user'];

        $this->db->query(
            "INSERT INTO incomes_category_assigned_to_users(user_id, income_category_name) 
            VALUES(:userId, :incomeCategoryName)",
            [
                'userId' => $userId,
                'incomeCategoryName' =>  $incomeCategoryName
            ]
        );
    }

    public function addNewExpenseCategory(array $formData)
    {

        $userId = $_SESSION['user'];
        $expenseCategoryName = $formData['new-expense-category'];

        $expenseCategoryName = formatString($expenseCategoryName);

        $categoryLimit = 0.00;

        $this->db->query(
            "INSERT INTO expenses_category_assigned_to_users(user_id, expense_category_name, category_limit) 
            VALUES(:userId, :expenseCategoryName, :categoryLimit)",
            [
                'userId' => $userId,
                'expenseCategoryName' =>  $expenseCategoryName,
                'categoryLimit' => $categoryLimit
            ]
        );
    }

    public function deleteExpenseCategory(int $id)
    {

        $userId = $_SESSION['user'];

        $this->db->query(
            "DELETE FROM expenses_category_assigned_to_users WHERE expense_category_assigned_to_user_id = :categoryId AND user_id = :userId",
            [
                'categoryId' => $id,
                'userId' => $userId
            ]
        );
    }

    public function deleteIncomeCategory(int $id)
    {
        $userId = $_SESSION['user'];

        $this->db->query(
            "DELETE FROM incomes_category_assigned_to_users WHERE income_category_assigned_to_user_id = :categoryId AND user_id = :userId",
            [
                'categoryId' => $id,
                'userId' => $userId
            ]
        );
    }

    public function updateCategoryLimit(string $categoryId, string $categoryLimit)
    {
        $userId = $_SESSION['user'];


        $this->db->query("UPDATE expenses_category_assigned_to_users SET category_limit = :categoryLimit WHERE expense_category_assigned_to_user_id = :categoryId AND user_id = :userId", [
            'categoryLimit' => $categoryLimit,
            'categoryId' => $categoryId,
            'userId' => $userId
        ]);
    }

    public function getLimitValue(string $categoryId, string $date)
    {
        //teraz to co chcę zrobić to wysłac zapytanie aby pobrać sumę wydatków z okresu danego miesiąca
        // na podstawie nadej date trzeba wyciągnąć pierowszy i ostatni dzień miesiąca

        $userId = $_SESSION['user'];

        //stworzeniu zakresu miesięcy

        $currentDate = new DateTime($date);

        // Skopiuj obiekt DateTime i ustaw na pierwszy dzień miesiąca
        $firstDay = $currentDate->modify('first day of this month')->format('Y-m-d');

        // Skopiuj obiekt DateTime i ustaw na ostatni dzień miesiąca
        $lastDay = $currentDate->modify('last day of this month')->format('Y-m-d');

        $limitValue = $this->db->query("SELECT SUM(expense_amount) AS total_expenses FROM expenses WHERE expense_date BETWEEN :firstDay AND :lastDay AND user_id = :userId AND expense_category_assigned_to_user_id = :categoryId", [
            'firstDay' => $firstDay,
            'lastDay' => $lastDay,
            'userId' => $userId,
            'categoryId' => $categoryId
        ])->find();

        return $limitValue;
    }
}
