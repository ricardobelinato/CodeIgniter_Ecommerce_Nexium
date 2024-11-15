<?php

namespace App\Controllers;

use App\Models\ProdutoModel;
use App\Models\CategoriaModel;
use CodeIgniter\Controller;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtoModel = new ProdutoModel();
        $data['produtos'] = $produtoModel->findAll(); 
        return view('admin/produtos', $data); 
    }

    public function criar()
    {
        $categoriaModel = new CategoriaModel();
        $data['categorias'] = $categoriaModel->findAll(); 
        return view('admin/produtos_criar', $data);
    }

    public function salvar()
    {
        $produtoModel = new ProdutoModel();

        $validationRules = [
            'nome_produto' => 'required|min_length[3]|max_length[150]',
            'valor_sem_desconto' => 'required|decimal',
            'valor' => 'required|decimal',
            'id_categoria' => 'required|is_natural_no_zero',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'img' => $this->request->getPost('img'),
            'valor_sem_desconto' => $this->request->getPost('valor_sem_desconto'),
            'valor' => $this->request->getPost('valor'),
            'nome_produto' => $this->request->getPost('nome_produto'),
            'descricao' => $this->request->getPost('descricao'),
            'informacoes_tecnicas' => $this->request->getPost('informacoes_tecnicas'),
            'id_categoria' => $this->request->getPost('id_categoria'),
        ];

        $produtoModel->save($data);

        return redirect()->to('/admin/produtos')->with('success', 'Produto criado com sucesso!');
    }

    public function editar($id)
    {
        $produtoModel = new ProdutoModel();
        $categoriaModel = new CategoriaModel();

        $data['produto'] = $produtoModel->find($id); 
        $data['categorias'] = $categoriaModel->findAll();

        if (!$data['produto']) {
            return redirect()->to('/admin/produtos')->with('error', 'Produto não encontrado!');
        }

        return view('admin/produtos_editar', $data);
    }

    public function atualizar($id)
    {
        $produtoModel = new ProdutoModel();

        $validationRules = [
            'nome_produto' => 'required|min_length[3]|max_length[150]',
            'valor_sem_desconto' => 'required|decimal',
            'valor' => 'required|decimal',
            'id_categoria' => 'required|is_natural_no_zero',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'img' => $this->request->getPost('img'),
            'valor_sem_desconto' => $this->request->getPost('valor_sem_desconto'),
            'valor' => $this->request->getPost('valor'),
            'nome_produto' => $this->request->getPost('nome_produto'),
            'descricao' => $this->request->getPost('descricao'),
            'informacoes_tecnicas' => $this->request->getPost('informacoes_tecnicas'),
            'id_categoria' => $this->request->getPost('id_categoria'),
        ];

        $produtoModel->update($id, $data);

        return redirect()->to('/admin/produtos')->with('success', 'Produto atualizado com sucesso!');
    }

    public function deletar($id)
    {
        $produtoModel = new ProdutoModel();
        $produtoModel->delete($id);

        return redirect()->to('/admin/produtos')->with('success', 'Produto deletado com sucesso!');
    }
}
