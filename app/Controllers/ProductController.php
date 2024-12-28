<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $data['produtos'] = $productModel->getLimitedProducts(24);
        return view('index', $data);
    }


    public function categoria($id_categoria)
    {
        $productModel = new ProductModel();
        $data['produtos'] = $productModel->getProductsByCategory($id_categoria);
        return view('product_view', $data);
    }
    public function detalhes($id_produto)
    {
        $produtoModel = new \App\Models\ProdutoIndividualModel();

        $produto = $produtoModel->find($id_produto);

        if (!$produto) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produto não encontrado');
        }

        return view('produto_detalhes', ['produto' => $produto]);
    }
}
