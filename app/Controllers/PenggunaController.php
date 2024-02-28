<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pengguna;
use CodeIgniter\HTTP\ResponseInterface;

class PenggunaController extends BaseController
{
    protected $validation, $pengguna, $datas;
    public function __construct()
    {
        $this->validation = Services::validation();
        $this->pengguna = new Pengguna();
        $this->datas = [
            'main_title'    => 'Data Pengguna',
            'sub_title'     => 'Halaman',
            'semuaPengguna' => $this->pengguna->findAll(),
            'semuaPeran'    => $this->pengguna->semuaPeran(),
            'validation'    => $this->validation,
        ];
    }
    public function index()
    {
        return view('master/pengguna/index', $this->datas);
    }
    public function create()
    {
        return view('master/pengguna/create', $this->datas);
    }
    public function save()
    {
        # validation
        $rules = [
            'username'  => ['required', 'is_unique[pengguna.username]'],
            'role'      => ['required'],
            'fullname'  => ['required'],
        ];
        # if validation fails
        if (!$this->validate($rules)) {
            return view('master/pengguna/create', $this->datas);
        }
        # if validation is successful. save data to database
        $this->pengguna->save([
            'username'  => trim($this->request->getVar('username')),
            'password'  => password_hash('qweasd123#', PASSWORD_BCRYPT),
            'role'      => trim($this->request->getVar('role')),
            'fullname'  => trim($this->request->getVar('fullname')),
        ]);
        # set message and redirect to pengguna
        session()->setFlashdata("message", 'Data Berhasil Disimpan.');
        return redirect()->to('pengguna');
    }
    public function edit($id)
    {
        $data = [
            'validation'    => Services::validation(),
            'main_title'    => 'Data Pengguna',
            'sub_title'     => 'Halaman',
            'pengguna'      => $this->pengguna->where('id', $id)->first(),
            'semuaPeran'    => $this->pengguna->semuaPeran(),
        ];
        return view('master/pengguna/edit', $data);
    }
    public function update($id)
    {
        # validation
        $rules = [
            'username'  => ['required', 'is_unique[pengguna.username,id,{id}]'],
            'role'      => ['required'],
            'fullname'  => ['required'],
        ];
        # if validation fails
        if (!$this->validate($rules)) {
            $data = [
                'validation'    => Services::validation(),
                'main_title'    => 'Data Pengguna',
                'sub_title'     => 'Halaman',
                'pengguna'      => $this->pengguna->where('id', $id)->first(),
            ];
            return view('master/pengguna/edit', $data);
        }
        # if validation is successful. update data in the database
        $this->pengguna->update($id, [
            'username'  => trim($this->request->getVar('username')),
            'role'      => trim($this->request->getVar('role')),
            'fullname'  => trim($this->request->getVar('fullname')),
        ]);
        # set message and redirect to pengguna
        session()->setFlashdata("message", 'Data Berhasil Disimpan.');
        return redirect()->to('pengguna');
    }
    public function delete($id)
    {
        # delete data in the database
        $this->pengguna->where('id', $id)->delete();
        # set message and redirect to pengguna
        session()->setFlashdata('message', 'Data Berhasil Dihapus.');
        return redirect()->to('pengguna');
    }
}
