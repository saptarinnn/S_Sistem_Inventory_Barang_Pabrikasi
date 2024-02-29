<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PenggunaSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('pengguna')->insert([
            'username'      => 'admin',
            'password'      => password_hash('qweasd123#', PASSWORD_BCRYPT),
            'peran'         => 'admin',
            'nama_lengkap'  => 'super admin',
        ]);
        $this->db->table('pengguna')->insert([
            'username'      => 'manager',
            'password'      => password_hash('qweasd123#', PASSWORD_BCRYPT),
            'peran'         => 'manager',
            'nama_lengkap'  => 'manager',
        ]);
    }
}
