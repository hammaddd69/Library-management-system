<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function authenticate()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();

        $user = $userModel->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {

            session()->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'isLoggedIn' => true
            ]);

            return redirect()->to(base_url('dashboard'));

        } else {

            return redirect()->to(base_url('login'))
                ->with('error', 'Incorrect username or password.');
        }
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(base_url('login'));
    }
}

