<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Cek apakah user sudah login
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/register')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Cek apakah role user sesuai
        $userRole = $session->get('role');
        if ($arguments && !in_array($userRole, $arguments)) {
            return redirect()->to('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        // Jika lolos semua, lanjutkan request
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak melakukan apa-apa setelah request
    }
}
