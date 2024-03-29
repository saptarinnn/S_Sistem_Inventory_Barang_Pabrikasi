<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pengguna;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class AuthController extends BaseController
{
    protected $pengguna, $session, $validation;
    public function __construct()
    {
        $this->session = session();
        $this->validation = Services::validation();
        $this->pengguna = new Pengguna();
    }
    public function login()
    {
        return view('guest/login');
    }
    public function loginPost()
    {
        # Ambil data sesuai username dalam database
        $data = $this->pengguna->where('username', $this->request->getVar('username'))->first();
        # Jika data ada
        if ($data) {
            # Verifikasi password
            $password = password_verify($this->request->getVar('password'), $data->password);
            # Jika password benar
            if ($password) {
                # Set data dalam session
                $this->session->set([
                    'id'            => $data->id,
                    'username'      => $data->username,
                    'peran'         => $data->peran,
                    'nama_lengkap'  => $data->nama_lengkap,
                    'logged_in'     => TRUE
                ]);
                # Arahkan ke dashboard
                return redirect()->to('dashboard');
            }
        }
        # Jika data tidak ada atau password salah arahkan kembali dengan pesan error
        $this->session->setFlashdata('error', '');
        return redirect()->back();
    }
    public function changePass()
    {
        return view('master/change-password', [
            'main_title'    => 'Rubah Password',
            'sub_title'     => 'Rubah Password',
            'validation'    => \Config\Services::validation(),
        ]);
    }
    public function changePassword($id)
    {
        # Validasi Request
        $rules = [
            'nama_lengkap'  => ['required'],
            'username'      => ['required'],
            'password_baru' => ['required'],
        ];
        # Jika Validasi Gagal
        if (!$this->validate($rules)) {
            return view('master/change-password', [
                'main_title'    => 'Rubah Password',
                'sub_title'     => 'Rubah Password',
                'validation'    => \Config\Services::validation(),
            ]);
        }
        # Jika Validasi Berhasil, Rubah Data Kedalam Database
        $this->pengguna->update($id, [
            'password' => trim(password_hash($this->request->getVar('password_baru'), PASSWORD_BCRYPT)),
        ]);
        # Atur Pesan dan Arahkan Ke Halaman Rubah Password
        session()->setFlashdata("message", 'Password Berhasil Dirubah.');
        return redirect()->to('change-password');
    }
    public function logout()
    {
        # Hapus data session dan arahkan ke login
        $this->session->destroy();
        return redirect()->to('login');
    }
}
