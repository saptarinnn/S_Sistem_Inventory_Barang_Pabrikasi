<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPemasok extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'username' => [
                'type'           => 'VARCHAR',
                'constraint'     => '20'
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pemasok');
    }

    public function down()
    {
        $this->forge->dropTable('pemasok');
    }
}
