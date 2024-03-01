<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangMasuk extends Model
{
    protected $table            = 'barangmasuk';
    protected $primaryKey       = 'kode_barangmasuk';
    protected $useAutoIncrement = false;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected bool $allowEmptyInserts = false;
    protected $allowedFields    = [
        'kode_barangmasuk', 'tgl_barangmasuk', 'barang_kode', 'ukuran', 'jumlah_barangmasuk'
    ];

    function joinBarang()
    {
        return $this->db->table('barangmasuk')
            ->join('barang', 'barang.kode = barangmasuk.barang_kode')
            ->join('satuan', 'satuan.id = barang.satuan_id')
            ->join('pemasok', 'pemasok.id = barang.pemasok_id')
            ->get()
            ->getResultObject();
    }
}
