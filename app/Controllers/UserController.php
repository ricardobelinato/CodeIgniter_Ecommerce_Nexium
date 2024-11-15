<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    public function index()
    {
        $userModel = new UserModel();
        $data['usuarios'] = $userModel->findAll(); // Pega todos os usuários
        return view('admin/usuarios', $data); // Passa para a view que lista os usuários
    }

    public function criar()
    {
        return view('admin/usuarios_criar'); // Chama a view do formulário de criação
    }

    public function salvar()
    {
        $userModel = new UserModel();

        // Regras de validação para o formulário
        $validationRules = [
            'nome_completo' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|is_unique[usuario.email]', // Validar email único
            'celular' => 'required',
            'is_adm' => 'required|in_list[0,1]' // Administrador: 0 ou 1
        ];

        // Se a validação falhar, volta com os erros
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Dados a serem salvos
        $data = [
            'nome_completo' => $this->request->getPost('nome_completo'),
            'email' => $this->request->getPost('email'),
            'celular' => $this->request->getPost('celular'),
            'is_adm' => $this->request->getPost('is_adm') == 1 ? true : false,
            'senha' => password_hash('senha_default', PASSWORD_BCRYPT), // Senha padrão, você pode mudar conforme necessário
        ];

        // Salva os dados no banco
        $userModel->save($data);

        // Redireciona para a lista de usuários com uma mensagem de sucesso
        return redirect()->to('/admin/usuarios')->with('success', 'Usuário criado com sucesso!');
    }

    public function editar($id)
    {
        $userModel = new UserModel();
        $data['usuario'] = $userModel->find($id); // Pega os dados do usuário a ser editado
        return view('admin/usuarios_editar', $data); // Passa para a view de edição
    }

    public function atualizar($id)
    {
        $userModel = new UserModel();

        // Regras de validação para o formulário de edição
        $validationRules = [
            'nome_completo' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email', // Email não precisa ser único para edição
            'celular' => 'required',
            'is_adm' => 'required|in_list[0,1]'
        ];

        // Se a validação falhar, volta com os erros
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Dados a serem atualizados
        $data = [
            'nome_completo' => $this->request->getPost('nome_completo'),
            'email' => $this->request->getPost('email'),
            'celular' => $this->request->getPost('celular'),
            'is_adm' => $this->request->getPost('is_adm') == 1 ? true : false,
        ];

        // Atualiza os dados no banco
        $userModel->update($id, $data);

        // Redireciona para a lista de usuários com uma mensagem de sucesso
        return redirect()->to('/admin/usuarios')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function deletar($id)
    {
        $userModel = new UserModel();

        // Deleta o usuário pelo ID
        $userModel->delete($id);

        // Redireciona para a lista de usuários com uma mensagem de sucesso
        return redirect()->to('/admin/usuarios')->with('success', 'Usuário deletado com sucesso!');
    }

    // Método para obter dados de usuário via AJAX para edição
    public function getUser($id)
    {
        $userModel = new UserModel();
        $usuario = $userModel->find($id);
        return $this->response->setJSON($usuario);
    }
}
