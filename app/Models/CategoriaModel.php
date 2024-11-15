<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends \CodeIgniter\Model
{
    protected $table = 'categoria';
    protected $primaryKey = 'id_categoria';
    protected $allowedFields = ['nome_categoria'];
}
