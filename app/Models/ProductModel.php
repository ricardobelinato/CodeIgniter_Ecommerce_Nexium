<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'produtos';

    public function getAllProducts()
    {
        return $this->findAll();
    }

    public function getProductsByCategory($id_categoria)
    {
        return $this->where('id_categoria', $id_categoria)->findAll();
    }
}