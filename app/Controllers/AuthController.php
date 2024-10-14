<?php

namespace App\Controllers;

use App\Models\UsuarioModel; // Modelo para a tabela de usuários
use App\Models\FuncionarioModel; // Modelo para a tabela de funcionários
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        // Carregar a visão de login
        return view('login'); // Ajuste conforme necessário
    }

    public function loginProcess()
    {
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');

        $usuarioModel = new UsuarioModel();
        $funcionarioModel = new FuncionarioModel();

        // Verificar na tabela de usuários
        $usuario = $usuarioModel->where('email', $email)->first();

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            // Login bem-sucedido para o usuário
            session()->set('user_id', $usuario['id']);
            session()->set('user_type', 'usuario');
            return redirect()->to('/hardware'); // Ajuste conforme necessário
        }

        // Verificar na tabela de funcionários
        $funcionario = $funcionarioModel->where('email', $email)->first();

        if ($funcionario && password_verify($senha, $funcionario['senha'])) {
            // Login bem-sucedido para o funcionário
            session()->set('user_id', $funcionario['id']);
            session()->set('user_type', 'funcionario');
            return redirect()->to('/perifericos'); // Ajuste conforme necessário
        }

        // Se não encontrou nenhum usuário ou funcionário
        return redirect()->back()->with('error', 'Email ou senha incorretos.');
    }
}
