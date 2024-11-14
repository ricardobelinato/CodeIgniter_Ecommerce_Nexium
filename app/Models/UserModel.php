<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'email', 'celular', 'senha', 'is_adm', 'nome_completo', 'cpf',
        'data_nascimento', 'genero'
    ];

    // Função para obter usuário por e-mail ou CPF
    public function getUserByEmailOrCpf($identifier)
    {
        return $this->where('email', $identifier)
                    ->orWhere('cpf', $identifier)
                    ->first();
    }
}