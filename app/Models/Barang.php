<?php

namespace App\Models;

use CodeIgniter\Model;

class Barang extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'kode';
    protected $useAutoIncrement = false;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected bool $allowEmptyInserts = false;
    protected $allowedFields    = [
        'kode', 'satuan_id', 'nama_barang', 'jumlah', 'tempat'
    ];

    function joinSatuanPemasok()
    {
        return $this->db->table('barang')
            ->join('satuan', 'satuan.id = barang.satuan_id')
            ->get()
            ->getResultObject();
    }
    function joinSatuanNotZero()
    {
        return $this->db->table('barang')
            ->join('satuan', 'satuan.id = barang.satuan_id')
            ->where('barang.jumlah >', '0')
            ->get()
            ->getResultObject();
    }
}
