<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class AuthController extends BaseController
{
    protected $users, $session, $validation;
    public function __construct()
    {
        $this->session = session();
        $this->validation = Services::validation();
        $this->users = new User();
    }
    public function login()
    {
        return view('guest/login');
    }
    public function loginPost()
    {
        # Ambil data sesuai username dalam database
        $data = $this->users->where('username', $this->request->getVar('username'))->first();
        # Jika data ada
        if ($data) {
            # Verifikasi password
            $password = password_verify($this->request->getVar('password'), $data->password);
            # Jika password benar
            if ($password) {
                # Set data dalam session
                $this->session->set([
                    'id'        => $data->id,
                    'username'  => $data->username,
                    'role'      => $data->role,
                    'fullname'  => $data->fullname,
                    'logged_in' => TRUE
                ]);
                # Arahkan ke dashboard
                return redirect()->to('dashboard');
            }
        }
        # Jika data tidak ada atau password salah arahkan kembali dengan pesan error
        $this->session->setFlashdata('error', '');
        return redirect()->back();
    }
    public function logout()
    {
        # Hapus data session dan arahkan ke login
        $this->session->destroy();
        return redirect()->to('login');
    }
}
