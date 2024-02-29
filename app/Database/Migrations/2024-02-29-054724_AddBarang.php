<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBarang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kode' => [
                'type'              => 'VARCHAR',
                'constraint'        => 6,
            ],
            'satuan_id' => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => true,
            ],
            'pemasok_id' => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => true,
            ],
            'nama_barang' => [
                'type'           => 'VARCHAR',
                'constraint'     => 150,
            ],
            'jumlah' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'tempat' => [
                'type'           => 'VARCHAR',
                'constraint'     => 150,
                'null'           => true,
            ],
        ]);
        $this->forge->addKey('kode', true);
        $this->forge->addForeignKey('satuan_id', 'satuan', 'id');
        $this->forge->addForeignKey('pemasok_id', 'pemasok', 'id');
        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}
