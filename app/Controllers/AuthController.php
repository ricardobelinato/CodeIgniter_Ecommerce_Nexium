<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        helper(['form', 'url']);
        echo view('login');
    }

    public function authenticate()
    {
        $session = session();
        $userModel = new UserModel();

        $identifier = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->getUserByEmailOrCpf($identifier); 

        if ($user && password_verify($password, $user['senha'])) {
            $sessionData = [
                'id' => $user['id'],
                'email' => $user['email'],
                'is_adm' => $user['is_adm'],
                'logged_in' => true
            ];
            $session->set($sessionData);

            if ($user['is_adm']) {
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->to('/hardware');
            }

        } else {
            $session->setFlashdata('error', 'Login ou senha inválidos');
            return redirect()->to('/login');
        }
    }
}
