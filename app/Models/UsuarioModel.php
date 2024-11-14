<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'email', 'celular', 'senha', 'is_adm',
        'nome_completo', 'cpf', 'data_nascimento', 'genero',
        'nome_fantasia', 'razao_social', 'cnpj', 'data_abertura',
        'informacoes_tributarias', 'inscricao_estadual', 'responsavel_compra', 'telefone_contato'
    ];

    protected $validationRules = [
        'email' => 'required|valid_email|is_unique[usuario.email]',
        'senha' => 'required|min_length[6]',
        'nome_completo' => 'permit_empty|string',
        'cpf' => 'permit_empty|is_unique[usuario.cpf]',
        'cnpj' => 'permit_empty|is_unique[usuario.cnpj]',
    ];

    protected $validationMessages = [
        'email' => [
            'is_unique' => 'Este e-mail já está cadastrado.',
        ],
        'cpf' => [
            'is_unique' => 'Este CPF já está cadastrado.',
        ],
        'cnpj' => [
            'is_unique' => 'Este CNPJ já está cadastrado.',
        ],
    ];
}