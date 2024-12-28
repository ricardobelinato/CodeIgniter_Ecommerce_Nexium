<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemPedidoModel extends Model
{
    protected $table = 'itens_do_pedido';
    protected $primaryKey = 'id_item';
    protected $allowedFields = ['id_pedido', 'id_produto', 'quantidade', 'preco_unitario'];
    protected $returnType = 'array';
    protected $useTimestamps = false;

    protected $useAutoIncrement = true;

    protected $validationRules = [
        'id_pedido' => 'required|integer',
        'id_produto' => 'required|integer',
        'quantidade' => 'required|integer',
        'preco_unitario' => 'required|decimal',
    ];

    public function getItensPorPedido($id_pedido)
    {
        return $this->where('id_pedido', $id_pedido)->findAll();
    }
}
