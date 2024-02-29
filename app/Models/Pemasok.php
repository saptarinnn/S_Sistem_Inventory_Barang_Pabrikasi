<?php

namespace App\Models;

use CodeIgniter\Model;

class Pemasok extends Model
{
    protected $table            = 'pemasok';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected bool $allowEmptyInserts = false;
    protected $allowedFields    = [
        'nama'
    ];
}
