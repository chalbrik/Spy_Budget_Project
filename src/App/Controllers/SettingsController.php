<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{UserService, ValidatorService};

class SettingsController
{
    public function __construct(private TemplateEngine $view, private UserService $userService, private ValidatorService $validatorService)
    {
    }

    public function settings()
    {

        $selectedSettingsFieldTab =  $this->getSettingsFieldTab();
        $usernameData = $this->userService->getUsername();
        $username = $usernameData["user_name"];

        echo $this->view->render("/settings.php", [
            'selectedSettingsFieldTab' => $selectedSettingsFieldTab,
            'username' => $username
        ]);
    }

    public function getSettingsFieldTab()
    {
        if (isset($_POST['settings-field-name'])) {
            return $_POST['settings-field-name'];
        } else {
            return 'Profile information';
        }
    }

    public function changeUsername()
    {
        $this->validatorService->validateUpdate($_POST);

        $this->userService->changeUsername($_POST['new-username']);

        redirectTo('/settings');
    }

    public function changePassword()
    {
        $this->validatorService->validateUpdate($_POST);

        $this->userService->changePassword($_POST);
    }
}
