<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class UsuarioController extends BaseController
{
    public function cadastrar()
    {
        return view('cadastrar');
    }

    public function salvar()
    {
        $usuarioModel = new UsuarioModel();

        $dados = [
            'email' => $this->request->getPost('email'),
            'celular' => $this->request->getPost('celular') ?? $this->request->getPost('celularPJ'),
            'senha' => password_hash($this->request->getPost('senha'), PASSWORD_BCRYPT),
        ];

        if ($this->request->getPost('nome')) {
            $dados += [
                'nome_completo' => $this->request->getPost('nome'),
                'cpf' => $this->request->getPost('cpf'),
                'data_nascimento' => $this->request->getPost('dataNascimento'),
                'genero' => $this->request->getPost('genero'),
            ];
        }

        if ($usuarioModel->insert($dados)) {
            session()->setFlashdata('success', 'Cadastro realizado com sucesso!');
        } else {
            session()->setFlashdata('error', 'Houve um erro ao cadastrar. Tente novamente.');
        }

        return redirect()->back();
    }
}
