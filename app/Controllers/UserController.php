<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    public function index()
    {
        $userModel = new UserModel();
        $data['usuarios'] = $userModel->findAll();
        return view('admin/usuarios', $data);
    }

    public function criar()
    {
        return view('admin/usuarios_criar');
    }

    public function salvar()
    {
        $userModel = new UserModel();

        $validationRules = [
            'nome_completo' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|is_unique[usuario.email]',
            'celular' => 'required',
            'is_adm' => 'required|in_list[0,1]' // Administrador: 0 ou 1
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nome_completo' => $this->request->getPost('nome_completo'),
            'email' => $this->request->getPost('email'),
            'celular' => $this->request->getPost('celular'),
            'is_adm' => $this->request->getPost('is_adm') == 1 ? true : false,
            'senha' => password_hash('senha_default', PASSWORD_BCRYPT),
        ];

        $userModel->save($data);

        return redirect()->to('/admin/usuarios')->with('success', 'Usuário criado com sucesso!');
    }

    public function editar($id)
    {
        $userModel = new UserModel();
        $data['usuario'] = $userModel->find($id);
        return view('admin/usuarios_editar', $data);
    }

    public function atualizar($id)
    {
        $userModel = new UserModel();

        $validationRules = [
            'nome_completo' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email',
            'celular' => 'required',
            'is_adm' => 'required|in_list[0,1]'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nome_completo' => $this->request->getPost('nome_completo'),
            'email' => $this->request->getPost('email'),
            'celular' => $this->request->getPost('celular'),
            'is_adm' => $this->request->getPost('is_adm') == 1 ? true : false,
        ];

        $userModel->update($id, $data);

        return redirect()->to('/admin/usuarios')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function deletar($id)
    {
        $userModel = new UserModel();

        $userModel->delete($id);

        return redirect()->to('/admin/usuarios')->with('success', 'Usuário deletado com sucesso!');
    }

    public function getUser($id)
    {
        $userModel = new UserModel();
        $usuario = $userModel->find($id);
        return $this->response->setJSON($usuario);
    }
}
