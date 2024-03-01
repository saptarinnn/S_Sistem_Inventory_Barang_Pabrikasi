<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BarangMasukSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('barangmasuk')->insert([
            'kode_barangmasuk'      => 'an10n5_P0001',
            'tgl_barangmasuk'       => date("Y-m-d"),
            'barang_kode'           => 'an10n5',
            'ukuran'                => 'no 5',
            'jumlah_barangmasuk'    => '45',
        ]);

        $this->db->table('barang')->update([
            'jumlah' => '45'
        ], ['kode' => 'an10n5']);
    }
}
