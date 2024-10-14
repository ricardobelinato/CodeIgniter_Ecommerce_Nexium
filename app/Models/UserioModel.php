<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios'; // Nome da tabela
    protected $primaryKey = 'id'; // Chave primária
    protected $allowedFields = ['nome', 'email', 'senha', 'tipo']; // Campos permitidos
}
