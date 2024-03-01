<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangKeluar extends Model
{
    protected $table            = 'barangkeluar';
    protected $primaryKey       = 'kode_barangkeluar';
    protected $useAutoIncrement = false;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected bool $allowEmptyInserts = false;
    protected $allowedFields    = [
        'kode_barangkeluar', 'tgl_barangkeluar', 'barang_kode', 'ukuran', 'jumlah_barangkeluar', 'user', 'area', 'job_so', 'ket'
    ];

    function joinBarang()
    {
        return $this->db->table('barangkeluar')
            ->join('barang', 'barang.kode = barangkeluar.barang_kode')
            ->join('satuan', 'satuan.id = barang.satuan_id')
            ->get()
            ->getResultObject();
    }
}
