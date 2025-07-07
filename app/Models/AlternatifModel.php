<?php

namespace App\Models;

use CodeIgniter\Model;

class AlternatifModel extends Model
{
    protected $table = 'alternatif';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'kode',
        'nama',
        'umur_ikan',
        'rata_rata_ikan',
        'tingkat_konsumsi',
        'aktivitas_ikan',
        'tingkat_kematian'
    ];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
