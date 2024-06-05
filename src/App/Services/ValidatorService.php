<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Validator;
use Framework\Rules\{RequiredRule, EmailRule, MatchRule, LengthMaxRule, NumericRule, DateFormatRule};

class ValidatorService
{
    private Validator $validator;

    public function __construct()
    {
        $this->validator = new Validator();

        $this->validator->add('required', new RequiredRule());
        $this->validator->add('email', new EmailRule());
        $this->validator->add('match', new MatchRule());
        $this->validator->add('lengthMax', new LengthMaxRule());
        $this->validator->add('numeric', new NumericRule());
        $this->validator->add('dateFormat', new DateFormatRule());
    }

    public function validateRegister(array $formData)
    {

        $this->validator->validate($formData, [
            'username-register' => ['required'],
            'email-register' => ['required', 'email'],
            'password-register' => ['required'],
            'password-repeat-register' => ['required', 'match:password-register']
        ]);
    }

    public function validateLogin(array $formData)
    {
        $this->validator->validate($formData, [
            'email-login' => ['required', 'email'],
            'password-login' => ['required'],
        ]);
    }

    public function validateTransaction(array $formData)
    {
        $this->validator->validate($formData, [
            'amount' => ['required', 'numeric'],
            'transaction-date' => ['required', 'dateFormat:Y-m-d'],
            'transaction-category' => ['required'],
            'note' => ['lengthMax:255']
        ]);
    }
}
