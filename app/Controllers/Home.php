<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('user/pages/home.php', [
            'title' => 'Beranda - SPK Panen Bandeng'
        ]);
    }
}
