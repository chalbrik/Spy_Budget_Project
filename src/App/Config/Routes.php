<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{
    HomeController,
    MainUserPageController,
    AddIncomeController,
    AddExpenseController,
    CheckBalanceController,
    TrackExpensesController,
    SettingsController
};

function registerRoutes(App $app)
{

    $app->get('/', [HomeController::class, 'home']);

    $app->get('/userpage', [MainUserPageController::class, 'mainUserPage']);

    $app->get('/add-income', [AddIncomeController::class, 'addIncome']);

    $app->get('/add-expense', [AddExpenseController::class, 'addExpense']);

    $app->get('/check-balance', [CheckBalanceController::class, 'checkBalance']);

    $app->get('/track-expenses', [TrackExpensesController::class, 'trackExpenses']);

    $app->get('/settings', [SettingsController::class, 'settings']);
}