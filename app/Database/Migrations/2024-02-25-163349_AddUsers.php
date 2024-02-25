<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsers extends Migration
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
            'password' => [
                'type'           => 'VARCHAR',
                'constraint'     => '150'
            ],
            'role' => [
                'type'              => 'ENUM',
                'constraint'        => array('admin', 'manager', 'gudang', 'pembelian'),
            ],
            'fullname' => [
                'type'           => 'VARCHAR',
                'constraint'     => '70'
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
