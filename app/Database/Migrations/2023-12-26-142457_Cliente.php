<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cliente extends Migration
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
            'nome' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique' => true
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique' => true
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('cliente');
    }

    public function down()
    {
        $this->forge->dropTable('cliente');
    }
}
