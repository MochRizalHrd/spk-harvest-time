<?php

namespace App\Models;

use CodeIgniter\Model;

class RatingModel extends Model
{
    protected $table = 'rating_nilai';
    protected $primaryKey = 'id';
    protected $allowedFields = [
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
