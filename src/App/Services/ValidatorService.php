<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Validator;
use Framework\Rules\{RequiredRule, EmailRule, MatchRule};

class ValidatorService
{
    private Validator $validator;

    public function __construct()
    {
        $this->validator = new Validator();

        $this->validator->add('required', new RequiredRule());
        $this->validator->add('email', new EmailRule());
        $this->validator->add('match', new MatchRule());
    }

    public function validateRegister(array $formData)
    {

        $this->validator->validate($formData, [
            'username-register' => ['required'],
            'email-register' => ['required', 'email'],
            'password-register' => ['required'],
            'password-repeat-register' => ['required', 'match:password']
        ]);
    }

    public function validateLogin(array $formData)
    {
        $this->validator->validate($formData, [
            'email-login' => ['required', 'email'],
            'password-login' => ['required'],
        ]);
    }
}
