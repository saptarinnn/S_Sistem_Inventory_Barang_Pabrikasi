<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBarangKeluar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kode_barangkeluar' => [
                'type'              => 'VARCHAR',
                'constraint'        => 15,
            ],
            'tgl_barangkeluar' => [
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
            'jumlah_barangkeluar' => [
                'type'           => 'INT',
                'constraint'     => 10,
            ],
            'user' => [
                'type'           => 'VARCHAR',
                'constraint'     => 150,
                'null'           => true,
            ],
            'area' => [
                'type'           => 'VARCHAR',
                'constraint'     => 150,
                'null'           => true,
            ],
            'job_so' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null'           => true,
            ],
            'ket' => [
                'type'           => 'TEXT',
                'null'           => true,
            ],
        ]);
        $this->forge->addKey('kode_brgmasuk', true);
        $this->forge->addForeignKey('barang_kode', 'barang', 'kode', 'CASCADE', 'CASCADE');
        $this->forge->createTable('barangkeluar');
    }

    public function down()
    {
        $this->forge->dropTable('barangkeluar');
    }
}
