<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBarangMasuk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kode_barangmasuk' => [
                'type'              => 'VARCHAR',
                'constraint'        => 15,
            ],
            'tgl_barangmasuk' => [
                'type'           => 'DATE',
            ],
            'barang_kode' => [
                'type'           => 'VARCHAR',
                'constraint'     => 6,
            ],
            'ukuran' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
                'null'           => true,
            ],
            'jumlah_barangmasuk' => [
                'type'           => 'INT',
                'constraint'     => 10,
            ],
        ]);
        $this->forge->addKey('kode_brgmasuk', true);
        $this->forge->addForeignKey('barang_kode', 'barang', 'kode');
        $this->forge->createTable('barangmasuk');
    }

    public function down()
    {
        $this->forge->dropTable('barangmasuk');
    }
}
