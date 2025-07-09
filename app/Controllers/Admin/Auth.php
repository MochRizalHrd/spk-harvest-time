<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    // Menampilkan halaman login
    public function login()
    {
        return view('auth/login');
    }

    // Proses login
    public function loginProcess()
    {
        $userModel = new UserModel();
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Set session jika login berhasil
            session()->set([
                'user_id'    => $user['id'],
                'username'   => $user['username'],
                'email'      => $user['email'],
                'role'    => $user['role'], // penting
                'isLoggedIn' => true
            ]);

            return redirect()->to('/');
        }

        // Login gagal
        return redirect()->back()->with('error', 'Email atau password salah');
    }

    // Menampilkan halaman registrasi
    public function register()
    {
        return view('auth/register');
    }

    // Proses registrasi
    public function registerProcess()
    {
        $userModel = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        $userModel->insert($data);

        return redirect()->to('/login')->with('success', 'Pendaftaran berhasil. Silakan login.');
    }

    // Logout dan hapus session
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
