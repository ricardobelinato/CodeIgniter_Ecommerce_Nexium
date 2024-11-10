<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $data['produtos'] = $productModel->getAllProducts();
        return view('index', $data);
    }

    public function categoria($id_categoria)
    {
        $productModel = new ProductModel();
        $data['produtos'] = $productModel->getProductsByCategory($id_categoria);
        return view('product_view', $data);
    }
}
