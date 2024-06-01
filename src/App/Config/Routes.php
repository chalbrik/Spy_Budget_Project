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
use App\Middleware\{AuthRequiredMiddleware, GuestOnlyMiddleware};

function registerRoutes(App $app)
{

    $app->get('/', [HomeController::class, 'home'])->add(GuestOnlyMiddleware::class);
    $app->post('/register', [HomeController::class, 'registerUser'])->add(GuestOnlyMiddleware::class);
    $app->post('/login', [HomeController::class, 'loginUser'])->add(GuestOnlyMiddleware::class);

    $app->get('/userpage', [MainUserPageController::class, 'mainUserPage'])->add(AuthRequiredMiddleware::class);

    $app->get('/add-income', [AddIncomeController::class, 'addIncome'])->add(AuthRequiredMiddleware::class);

    $app->get('/add-expense', [AddExpenseController::class, 'addExpense'])->add(AuthRequiredMiddleware::class);

    $app->get('/check-balance', [CheckBalanceController::class, 'checkBalance'])->add(AuthRequiredMiddleware::class);

    $app->get('/track-expenses', [TrackExpensesController::class, 'trackExpenses'])->add(AuthRequiredMiddleware::class);

    $app->get('/settings', [SettingsController::class, 'settings'])->add(AuthRequiredMiddleware::class);

    $app->get('/logout', [HomeController::class, 'logoutUser'])->add(AuthRequiredMiddleware::class);
}
