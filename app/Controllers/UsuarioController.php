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

        // Dados comuns
        $dados = [
            'email' => $this->request->getPost('email'),
            'celular' => $this->request->getPost('celular') ?? $this->request->getPost('celularPJ'),
            'senha' => password_hash($this->request->getPost('senha'), PASSWORD_BCRYPT),
        ];

        // Dados para Pessoa Física
        if ($this->request->getPost('nome')) {
            $dados += [
                'nome_completo' => $this->request->getPost('nome'),
                'cpf' => $this->request->getPost('cpf'),
                'data_nascimento' => $this->request->getPost('dataNascimento'),
                'genero' => $this->request->getPost('genero'),
            ];
        }

        // Dados para Pessoa Jurídica
        // if ($this->request->getPost('nomeFantasia')) {
        //     $dados += [
        //         'nome_fantasia' => $this->request->getPost('nomeFantasia'),
        //         'razao_social' => $this->request->getPost('razaoSocial'),
        //         'cnpj' => $this->request->getPost('cnpj'),
        //         'data_abertura' => $this->request->getPost('dataAbertura'),
        //         'informacoes_tributarias' => $this->request->getPost('infoTributaria'),
        //         'inscricao_estadual' => $this->request->getPost('inscricaoEstadual'),
        //         'responsavel_compra' => $this->request->getPost('responsavelCompra'),
        //         'telefone_contato' => $this->request->getPost('telefoneContato'),
        //     ];
        // }

        if ($usuarioModel->insert($dados)) {
            session()->setFlashdata('success', 'Cadastro realizado com sucesso!');
        } else {
            session()->setFlashdata('error', 'Houve um erro ao cadastrar. Tente novamente.');
        }

        return redirect()->back();
    }
}
