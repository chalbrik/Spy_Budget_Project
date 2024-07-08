<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\UserService;

class SettingsController
{
    public function __construct(private TemplateEngine $view, private UserService $userService)
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
        if (!empty($_POST)) {
            return $_POST['settings-field-name'];
        } else {
            return 'Profile information';
        }
    }
}
