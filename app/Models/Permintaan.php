<?php

namespace App\Models;

use CodeIgniter\Model;

class Permintaan extends Model
{
    protected $table            = 'permintaan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected bool $allowEmptyInserts = false;
    protected $allowedFields    = [
        'barang_kode', 'tgl_permintaan', 'nama_peminta', 'jabatan_peminta', 'ket_peminta', 'status_permintaan'
    ];

    function joinBarang()
    {
        return $this->db->table('permintaan')
            ->join('barang', 'barang.kode = permintaan.barang_kode')
            ->get()
            ->getResultObject();
    }
}
