<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatModel extends Model
{
    protected $table      = 'riwayat';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'user_id',
        'kode_alternatif',
        'nama_alternatif',
        'umur_ikan',
        'berat_ikan',
        'konsumsi_pakan',
        'aktivitas_ikan',
        'kematian_ikan',
        'skor',
        'rekomendasi',
    ];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
