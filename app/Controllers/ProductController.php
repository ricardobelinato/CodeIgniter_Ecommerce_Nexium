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
}
