<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class AuthController extends BaseController
{
    public function loginForm()
    {
        return view('login');
    }

    private function validateLogin(): bool
    {
        return $this->validate([
            'email' => 'required|valid_email',
            'password' => 'required',
        ], [
            'email' => [
                'required' => 'O email é obrigatorio',
                'valid_email' => 'O email tem que ser valido'
            ],
            'password' => [
                'required' => 'O email é obrigatorio'
            ]
        ]);
    }

    public function loginSubmit()
    {
        if (!$this->validateLogin()) {
            return redirect()->route('login_form')->with('errors', $this->validator->getErrors());
        }

        $user = new User();
        $userFound = $user->where('email', $this->request->getPost('email'))->first();

        if (!$userFound) {
            return redirect()->route('login_form')->with('message', 'User Not Found');
        }

        if (!password_verify($this->request->getPost('password'), $userFound->password)) {
            return redirect()->route('login_form')->with('message', 'User Not Found');
        }

        unset($userFound->password);

        session()->set('user', $userFound);

        return redirect()->route('list_all');
    }
}
