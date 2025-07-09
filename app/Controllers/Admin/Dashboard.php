<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KriteriaModel;
use App\Models\AlternatifModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $kriteriaModel   = new KriteriaModel();
        $alternatifModel = new AlternatifModel();
        $userModel       = new UserModel();

        $data = [
            'title'           => 'Dashboard',
            'total_kriteria'  => $kriteriaModel->countAll(),
            'total_alternatif'=> $alternatifModel->countAll(),
            'total_users'     => $userModel->countAll(),
        ];

        return view('admin/pages/dashboard', $data);
    }
}
