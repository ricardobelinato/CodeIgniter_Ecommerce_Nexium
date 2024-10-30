<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'produtos';
    
    protected $allowedFields = [
        'id_produto', 'img', 'valor_sem_desconto', 'valor', 'nome_produto', 'descricao', 'informacoes_tecnicas'
    ];
    
    public function getAllProducts()
    {
        return $this->findAll();
    }
}