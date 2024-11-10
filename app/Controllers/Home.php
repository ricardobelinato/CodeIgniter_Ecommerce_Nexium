<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Home extends BaseController
{
    public function index(): string
    {
        $productModel = new ProductModel();
        $data['produtos'] = $productModel->getAllProducts();

        return view('index', $data);
    }
    public function login(): string
    {
        return view('login');
    }
    public function cadastrar(): string
    {
        return view('cadastrar');
    }
    public function hardware()
    {
        return $this->loadCategoryView(1, 'hardware');
    }
    public function perifericos()
    {
        return $this->loadCategoryView(2, 'perifericos');
    }
    public function cadeiras()
    {
        return $this->loadCategoryView(3, 'cadeiras');
    }
    public function monitores()
    {
        return $this->loadCategoryView(4, 'monitores');
    }
    public function computadores()
    {
        return $this->loadCategoryView(5, 'computadores');
    }
    public function notebooks()
    {
        return $this->loadCategoryView(6, 'notebooks');
    }
    private function loadCategoryView($categoryId, $viewName)
    {
        $productModel = new ProductModel();
        $data['produtos'] = $productModel->getProductsByCategory($categoryId);

        // Passando o nome da categoria para o título
        switch($categoryId) {
            case 1:
                $data['categoria_nome'] = 'Hardware';
                break;
            case 2:
                $data['categoria_nome'] = 'Periféricos';
                break;
            case 3:
                $data['categoria_nome'] = 'Cadeiras';
                break;
            case 4:
                $data['categoria_nome'] = 'Monitores';
                break;
            case 5:
                $data['categoria_nome'] = 'Computadores';
                break;
            case 6:
                $data['categoria_nome'] = 'Notebooks';
                break;
        }

        return view("categories/$viewName", $data);
    }
}