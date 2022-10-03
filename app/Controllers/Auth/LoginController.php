<?php

namespace App\Controllers\Auth;

use CodeIgniter\Shield\Controllers\LoginController as ShieldLogin;

class LoginController extends ShieldLogin
{
   /**
     * Returns the rules that should be used for validation, but uses username instead of the default email.
     *
     * @return string[]
     */
    protected function getValidationRules(): array
    {
        return setting('Validation.login') ?? [
            'username' => [
                'label' => 'Auth.username',
                'rules' => config('AuthSession')->usernameValidationRules,
            ],
            //'email' => [
            //    'label' => 'Auth.email',
            //    'rules' => config('AuthSession')->emailValidationRules,
            //],
            'password' => [
                'label' => 'Auth.password',
                'rules' => 'required',
            ],
        ];
    }
}