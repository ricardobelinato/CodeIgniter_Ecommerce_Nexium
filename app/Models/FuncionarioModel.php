<?php

namespace App\Models;

use CodeIgniter\Model;

class FuncionarioModel extends Model
{
    protected $table = 'funcionarios'; // Nome da tabela
    protected $primaryKey = 'id'; // Chave primária
    protected $allowedFields = ['nome', 'email', 'senha', 'cargo']; // Campos permitidos
}
