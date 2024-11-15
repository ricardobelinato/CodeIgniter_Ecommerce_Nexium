<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoModel extends Model
{
    protected $table = 'produtos';
    protected $primaryKey = 'id_produto';
    protected $allowedFields = ['img', 'valor_sem_desconto', 'valor', 'nome_produto', 'descricao', 'informacoes_tecnicas', 'id_categoria'];
    protected $useTimestamps = false;
}
