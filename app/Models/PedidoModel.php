<?php

namespace App\Models;

use CodeIgniter\Model;

class PedidoModel extends Model
{
    protected $table = 'pedidos';
    protected $primaryKey = 'id_pedido';
    protected $allowedFields = ['id_usuario', 'data_pedido', 'total', 'status'];

    protected $useTimestamps = false;
}
