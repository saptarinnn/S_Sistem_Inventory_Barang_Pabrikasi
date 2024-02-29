<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengguna extends Model
{
    protected $table            = 'pengguna';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected bool $allowEmptyInserts = false;
    protected $allowedFields    = [
        'username', 'password', 'peran', 'nama_lengkap'
    ];

    public function semuaPeran()
    {
        return ['gudang', 'pembelian'];
    }
}
