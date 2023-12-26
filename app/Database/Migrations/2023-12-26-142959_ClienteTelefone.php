<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ClienteTelefone extends Migration
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
            'telefone' => [
                'type'       => 'INT',
                'constraint' => '100',
            ],
            'telefone_alternativo' => [
                'type'       => 'INT',
                'constraint' => '100',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('cliente_id', 'cliente', 'id', 'CASCADE', 'CASCADE', 'fk_cliente_telefone');
        $this->forge->createTable('cliente_telefone');
    }

    public function down()
    {
        $this->forge->dropTable('cliente_telefone');
    }
}
