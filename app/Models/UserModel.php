<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'tipo_usuario', 'email', 'celular', 'senha', 'is_adm', 'nome_completo', 'cpf',
        'data_nascimento', 'genero', 'nome_fantasia', 'razao_social', 'cnpj', 'data_abertura',
        'informacoes_tributarias', 'inscricao_estadual', 'responsavel_compra', 'telefone_contato'
    ];

    public function getUserByEmailOrCpfOrCnpj($identifier)
    {
        return $this->where('email', $identifier)
                    ->orWhere('cpf', $identifier)
                    ->orWhere('cnpj', $identifier)
                    ->first();
    }
}