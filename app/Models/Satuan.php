<?php

namespace App\Models;

use CodeIgniter\Model;

class Satuan extends Model
{
    protected $table            = 'satuan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected bool $allowEmptyInserts = false;
    protected $allowedFields    = [
        'nama_satuan'
    ];
}
