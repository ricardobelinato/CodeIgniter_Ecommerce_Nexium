<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInitialTablesForNexium extends Migration
{
    public function up()
    {
        // Criação do banco de dados
        $this->db->query("CREATE DATABASE IF NOT EXISTS nexium");
        $this->db->query("USE nexium");

        // Tabela usuario
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'tipo_usuario' => [
                'type'       => 'ENUM',
                'constraint' => "'fisica'",
                'null'       => false,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'celular' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => true,
            ],
            'senha' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'is_adm' => [
                'type'       => 'BOOLEAN',
                'default'    => false,
                'null'       => true,
            ],
            'nome_completo' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'cpf' => [
                'type'       => 'VARCHAR',
                'constraint' => '14',
                'null'       => true,
                'unique'     => true,
            ],
            'data_nascimento' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'genero' => [
                'type'       => 'ENUM',
                'constraint' => "'masculino', 'feminino', 'outro'",
                'null'       => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('usuario');

        // Tabela categoria
        $this->forge->addField([
            'id_categoria' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'nome_categoria' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'null'       => false,
            ]
        ]);
        $this->forge->addKey('id_categoria', true);
        $this->forge->createTable('categoria');

        // Tabela produtos
        $this->forge->addField([
            'id_produto' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'img' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'valor_sem_desconto' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => true,
            ],
            'valor' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => false,
            ],
            'nome_produto' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'null'       => false,
            ],
            'descricao' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'informacoes_tecnicas' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'id_categoria' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ]
        ]);
        $this->forge->addKey('id_produto', true);
        $this->forge->addForeignKey('id_categoria', 'categoria', 'id_categoria');
        $this->forge->createTable('produtos');

        // Tabela pedidos
        $this->forge->addField([
            'id_pedido' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'id_usuario' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
            'data_pedido' => [
                'type'       => 'DATETIME',
                'null'       => true,
                'default'    => 'CURRENT_TIMESTAMP',
            ],
            'total' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => false,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => "'pendente', 'processando', 'enviado', 'concluido', 'cancelado'",
                'default'    => 'pendente',
                'null'       => false,
            ]
        ]);
        $this->forge->addKey('id_pedido', true);
        $this->forge->addForeignKey('id_usuario', 'usuario', 'id');
        $this->forge->createTable('pedidos');

        // Tabela itens_do_pedido
        $this->forge->addField([
            'id_item' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'id_pedido' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
            'id_produto' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
            'quantidade' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
            'preco_unitario' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => false,
            ],
            'subtotal' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => false,
                'stored'     => true,
            ]
        ]);
        $this->forge->addKey('id_item', true);
        $this->forge->addForeignKey('id_pedido', 'pedidos', 'id_pedido');
        $this->forge->addForeignKey('id_produto', 'produtos', 'id_produto');
        $this->forge->createTable('itens_do_pedido');
    }

    public function down()
    {
        // Remover tabelas na ordem reversa para evitar erros de dependência
        $this->forge->dropTable('itens_do_pedido');
        $this->forge->dropTable('pedidos');
        $this->forge->dropTable('produtos');
        $this->forge->dropTable('categoria');
        $this->forge->dropTable('usuario');
    }
}