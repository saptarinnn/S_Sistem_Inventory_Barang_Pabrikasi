<?php

namespace App\Models;

use CodeIgniter\Model;

class Barang extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected bool $allowEmptyInserts = false;
    protected $allowedFields    = [
        'satuan_id', 'pemasok_id', 'nama_barang', 'ukuran', 'jumlah', 'tempat'
    ];
}
