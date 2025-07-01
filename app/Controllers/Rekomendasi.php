<?php

namespace App\Controllers;

class Rekomendasi extends BaseController
{
    public function view()
    {
        return view('user/pages/rekomendasi.php', [
            'title' => 'Rekomendasi - SPK Panen Bandeng'
        ]);
    }
}
