<?php

namespace App\Controllers;

use App\Models\CategoriaModel;
use CodeIgniter\Controller;

class CategoriaController extends Controller
{
    public function index()
    {
        $categoriaModel = new CategoriaModel();
        $data['categorias'] = $categoriaModel->findAll();
        return view('admin/categorias', $data);
    }

    public function criar()
    {
        return view('admin/categorias_criar');
    }

    public function salvar()
    {
        $categoriaModel = new CategoriaModel();

        $validationRules = [
            'nome_categoria' => 'required|min_length[3]|max_length[255]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nome_categoria' => $this->request->getPost('nome_categoria'),
        ];

        $categoriaModel->save($data);

        return redirect()->to('/admin/categorias')->with('success', 'Categoria criada com sucesso!');
    }

    public function editar($id)
    {
        $categoriaModel = new CategoriaModel();
        $data['categoria'] = $categoriaModel->find($id);

        if (!$data['categoria']) {
            return redirect()->to('/admin/categorias')->with('error', 'Categoria não encontrada!');
        }

        return view('admin/categorias_editar', $data);
    }

    public function atualizar($id)
    {
        $categoriaModel = new CategoriaModel();

        $validationRules = [
            'nome_categoria' => 'required|min_length[3]|max_length[255]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nome_categoria' => $this->request->getPost('nome_categoria'),
        ];

        $categoriaModel->update($id, $data);

        return redirect()->to('/admin/categorias')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function deletar($id)
    {
        $categoriaModel = new CategoriaModel();
        $categoriaModel->delete($id);

        return redirect()->to('/admin/categorias')->with('success', 'Categoria deletada com sucesso!');
    }
}
