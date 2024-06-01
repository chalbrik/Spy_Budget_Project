<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ValidatorService, UserService};
use Exception;
use Framework\Exceptions\ValidationException;

class HomeController
{

    public function __construct(
        private TemplateEngine $view,
        private ValidatorService $validatorService,
        private UserService $userService
    ) //poprzez wstawienie obiektu klasy template engine jako argumentu konstruktora umożliwiamy contenerowi do podejrzenia czego potrzebuje klasa home kontroler zeby została utworzona przez kontener
    {
    }

    public function home()
    {
        echo $this->view->render("/index.php");
    }

    public function registerUser()
    {
        $this->validatorService->validateRegister($_POST);
        $this->userService->isEmailTaken($_POST['email-register']);

        $this->userService->create($_POST);

        redirectTo('/');
    }

    public function loginUser()
    {

        $this->validatorService->validateLogin($_POST);

        $this->userService->login($_POST);

        redirectTo('/');
    }

    public function logoutUser()
    {
        $this->userService->logout();

        redirectTo('/');
    }
}
