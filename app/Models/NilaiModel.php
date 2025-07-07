<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
    protected $table = 'data_nilai';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id_alternatif',
        'id_kriteria',
        'nilai',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;

    // Contoh: ambil semua nilai berdasarkan alternatif
    public function getByAlternatif($idAlternatif)
    {
        return $this->where('id_alternatif', $idAlternatif)->findAll();
    }
}
