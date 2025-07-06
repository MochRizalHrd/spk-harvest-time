<?php

namespace App\Models;

use CodeIgniter\Model;

class UmurModel extends Model
{
    protected $table      = 'umur';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = ['kategori', 'nilai', 'keterangan'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
