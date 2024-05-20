<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{HomeController, MainUserPageController, AddIncomeController, AddExpenseController};

function registerRoutes(App $app)
{

    $app->get('/', [HomeController::class, 'home']);

    $app->get('/userpage', [MainUserPageController::class, 'mainUserPage']);

    $app->get('/add-income', [AddIncomeController::class, 'addIncome']);

    $app->get('/add-expense', [AddExpenseController::class, 'addExpense']);
}
