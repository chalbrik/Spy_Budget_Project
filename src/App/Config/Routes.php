<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{
    HomeController,
    RegisteredUserController,
    AddIncomeController,
    AddExpenseController,
    CheckBalanceController,
    TrackExpensesController,
    SettingsController,
    TransactionAddedController
};
use App\Middleware\{AuthRequiredMiddleware, GuestOnlyMiddleware};

function registerRoutes(App $app)
{

    $app->get('/', [HomeController::class, 'home'])->add(GuestOnlyMiddleware::class);
    $app->post('/register', [HomeController::class, 'registerUser'])->add(GuestOnlyMiddleware::class);
    $app->post('/login', [HomeController::class, 'loginUser'])->add(GuestOnlyMiddleware::class);

    $app->get('/registered', [RegisteredUserController::class, 'registeredPage'])->add(AuthRequiredMiddleware::class);

    $app->get('/add-income', [AddIncomeController::class, 'addIncomePage'])->add(AuthRequiredMiddleware::class);
    $app->post('/add-income', [AddIncomeController::class, 'addIncome'])->add(AuthRequiredMiddleware::class);

    $app->get('/api/add-expense/limit-info/{categoryId}', [AddExpenseController::class, 'getCategoryLimit'])->add(AuthRequiredMiddleware::class);
    $app->get('/api/add-expense/limit-value/{categoryId}/{date}/', [AddExpenseController::class, 'getLimitValue'])->add(AuthRequiredMiddleware::class);

    $app->post('/settings/category-limit/{categoryId}', [AddExpenseController::class, 'updateCategoryLimit'])->add(AuthRequiredMiddleware::class);

    $app->get('/add-expense', [AddExpenseController::class, 'addExpensePage'])->add(AuthRequiredMiddleware::class);
    $app->post('/add-expense', [AddExpenseController::class, 'addExpense'])->add(AuthRequiredMiddleware::class);



    $app->get('/transaction-added', [TransactionAddedController::class, 'transactionAddedPage'])->add(AuthRequiredMiddleware::class);

    $app->get('/check-balance', [CheckBalanceController::class, 'checkBalance'])->add(AuthRequiredMiddleware::class);
    $app->post('/check-balance', [CheckBalanceController::class, 'checkBalance'])->add(AuthRequiredMiddleware::class);

    $app->get('/track-expenses', [TrackExpensesController::class, 'trackExpenses'])->add(AuthRequiredMiddleware::class);

    $app->get('/settings', [SettingsController::class, 'settings'])->add(AuthRequiredMiddleware::class);
    $app->post('/settings', [SettingsController::class, 'settings'])->add(AuthRequiredMiddleware::class);
    $app->post('/settings-change-username', [SettingsController::class, 'changeUsername'])->add(AuthRequiredMiddleware::class);
    $app->post('/settings-change-password', [SettingsController::class, 'changePassword'])->add(AuthRequiredMiddleware::class);
    $app->delete('/settings/delete-account', [SettingsController::class, 'deleteAccount'])->add(AuthRequiredMiddleware::class);
    $app->post('/settings-add-new-income-category', [SettingsController::class, 'addNewIncomeCategory'])->add(AuthRequiredMiddleware::class);
    $app->post('/settings-add-new-expense-category', [SettingsController::class, 'addNewExpenseCategory'])->add(AuthRequiredMiddleware::class);
    $app->delete('/settings/expense-category/{category}', [SettingsController::class, 'deleteExpenseCategory'])->add(AuthRequiredMiddleware::class);
    $app->delete('/settings/income-category/{category}', [SettingsController::class, 'deleteIncomeCategory'])->add(AuthRequiredMiddleware::class);


    $app->get('/logout', [HomeController::class, 'logoutUser'])->add(AuthRequiredMiddleware::class);
}
