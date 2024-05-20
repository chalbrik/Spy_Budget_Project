<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;

class TrackExpensesController
{
    public function __construct(private TemplateEngine $view)
    {
    }

    public function trackExpenses()
    {
        echo $this->view->render("/track-expenses.php");
    }
}
