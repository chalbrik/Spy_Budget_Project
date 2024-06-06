<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;

class TransactionAddedController
{
    public function __construct(private TemplateEngine $view)
    {
    }

    public function transactionAddedPage()
    {
        echo $this->view->render("/transactionAdded.php");
    }
}
