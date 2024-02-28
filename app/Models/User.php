<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'username', 'password', 'role', 'fullname'
    ];

    protected bool $allowEmptyInserts = false;

    public function roles()
    {
        return ['gudang', 'pembelian'];
    }
}