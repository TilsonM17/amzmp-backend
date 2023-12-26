<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ClienteEndereco extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'cliente_id' => [
                'type'       => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'cep' => [
                'type'       => 'INT',
                'constraint' => '100',
            ],
            'logradouro' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'complemento' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'bairro' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'localidade' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'ibge' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('cliente_id', 'cliente', 'id', 'CASCADE', 'CASCADE', 'fk_cliente_endereco');
        $this->forge->createTable('cliente_endereco');
    }

    public function down()
    {
        $this->forge->dropTable('cliente_endereco');
    }
}
