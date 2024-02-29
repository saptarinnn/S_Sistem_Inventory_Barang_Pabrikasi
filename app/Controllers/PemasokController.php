<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pemasok;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class PemasokController extends BaseController
{
    protected $validation, $pemasok, $datas;
    public function __construct()
    {
        $this->validation = Services::validation();
        $this->pemasok = new Pemasok();
        $this->datas = [
            'main_title'    => 'Data Pemasok',
            'sub_title'     => 'Halaman',
            'semuaPemasok'  => $this->pemasok->findAll(),
            'validation'    => $this->validation,
        ];
    }
    public function index()
    {
        return view('master/pemasok/index', $this->datas);
    }
    public function create()
    {
        return view('master/pemasok/create', $this->datas);
    }
    public function save()
    {
        # Validasi Request
        $rules = [
            'name' => ['required', 'is_unique[pemasok.name]'],
        ];
        # Jika Validasi Gagal
        if (!$this->validate($rules)) {
            return view('master/pemasok/create', $this->datas);
        }
        # Jika Validasi Berhasil, Simpan Data Kedalam Database
        $this->pemasok->save([
            'name' => trim($this->request->getVar('name')),
        ]);
        # Atur Pesan dan Arahkan Ke Halaman Pengguna
        session()->setFlashdata("message", 'Data Berhasil Disimpan.');
        return redirect()->to('pemasok');
    }
    public function edit($id)
    {
        $data = [
            'validation'    => Services::validation(),
            'main_title'    => 'Data Pemasok',
            'sub_title'     => 'Halaman',
            'pemasok'       => $this->pemasok->where('id', $id)->first(),
        ];
        return view('master/pemasok/edit', $data);
    }
    public function update($id)
    {
        # Validasi Request
        $rules = [
            'nama'  => 'required|is_unique[pemasok.nama,id,' . $id . ']',
        ];
        # Jika Validasi Gagal
        if (!$this->validate($rules)) {
            $data = [
                'validation'    => Services::validation(),
                'main_title'    => 'Data Pemasok',
                'sub_title'     => 'Halaman',
                'pemasok'      => $this->pemasok->where('id', $id)->first(),
            ];
            return view('master/pemasok/edit', $data);
        }
        # Jika Validasi Berhasil. Perbarhi Data Didalam Database
        $this->pemasok->update($id, [
            'pemasok' => trim($this->request->getVar('pemasok')),
        ]);
        # Atur Pesan dan Arahkan Ke Halaman Pengguna
        session()->setFlashdata("message", 'Data Berhasil Disimpan.');
        return redirect()->to('pemasok');
    }
    public function delete($id)
    {
        # Hapus Data Dalam Database Sesuai Id
        $this->pemasok->where('id', $id)->delete();
        # Atur Pesan dan Arahkan Ke Halaman Pengguna
        session()->setFlashdata('message', 'Data Berhasil Dihapus.');
        return redirect()->to('pemasok');
    }
}
