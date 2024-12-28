<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoIndividualModel extends Model
{
    protected $table = 'produtos';
    protected $primaryKey = 'id_produto';
    protected $allowedFields = [
        'nome_produto',
        'descricao',
        'informacoes_tecnicas',
        'valor',
        'valor_sem_desconto',
        'id_categoria',
        'img',
    ];
}