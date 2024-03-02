<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPermintaan extends Migration
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
            'barang_kode' => [
                'type'           => 'VARCHAR',
                'constraint'     => 6,
            ],
            'tgl_permintaan' => [
                'type'           => 'DATE',
            ],
            'nama_peminta' => [
                'type'           => 'VARCHAR',
                'constraint'     => 150,
            ],
            'jabatan_peminta' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],
            'ket_peminta' => [
                'type'           => 'TEXT',
            ],
            'status_permintaan' => [
                'type'           => 'ENUM',
                'constraint'     => array('kirim', 'proses', 'gagal', 'selesai'),
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('barang_kode', 'barang', 'kode', 'CASCADE', 'CASCADE');
        $this->forge->createTable('permintaan');
    }

    public function down()
    {
        $this->forge->dropTable('permintaan');
    }
}
