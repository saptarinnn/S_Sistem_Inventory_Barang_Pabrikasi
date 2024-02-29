<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Satuan;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class SatuanController extends BaseController
{
    protected $validation, $satuan, $datas;
    public function __construct()
    {
        $this->validation = Services::validation();
        $this->satuan = new Satuan();
        $this->datas = [
            'main_title'    => 'Data Satuan',
            'sub_title'     => 'Halaman',
            'semuaSatuan'  => $this->satuan->findAll(),
            'validation'    => $this->validation,
        ];
    }
    public function index()
    {
        return view('master/satuan/index', $this->datas);
    }
    public function create()
    {
        return view('master/satuan/create', $this->datas);
    }
    public function save()
    {
        # Validasi Request
        $rules = [
            'nama_satuan' => ['required', 'is_unique[satuan.nama_satuan]'],
        ];
        # Jika Validasi Gagal
        if (!$this->validate($rules)) {
            return view('master/satuan/create', $this->datas);
        }
        # Jika Validasi Berhasil, Simpan Data Kedalam Database
        $this->satuan->save([
            'nama_satuan' => trim($this->request->getVar('nama_satuan')),
        ]);
        # Atur Pesan dan Arahkan Ke Halaman Pengguna
        session()->setFlashdata("message", 'Data Berhasil Disimpan.');
        return redirect()->to('satuan');
    }
    public function edit($id)
    {
        $data = [
            'validation'    => Services::validation(),
            'main_title'    => 'Data Satuan',
            'sub_title'     => 'Halaman',
            'satuan'       => $this->satuan->where('id', $id)->first(),
        ];
        return view('master/satuan/edit', $data);
    }
    public function update($id)
    {
        # Validasi Request
        $rules = [
            'nama_satuan'  => 'required|is_unique[satuan.nama_satuan,id,' . $id . ']',
        ];
        # Jika Validasi Gagal
        if (!$this->validate($rules)) {
            $data = [
                'validation'    => Services::validation(),
                'main_title'    => 'Data Satuan',
                'sub_title'     => 'Halaman',
                'satuan'      => $this->satuan->where('id', $id)->first(),
            ];
            return view('master/satuan/edit', $data);
        }
        # Jika Validasi Berhasil. Perbarhi Data Didalam Database
        $this->satuan->update($id, [
            'nama_satuan' => trim($this->request->getVar('nama_satuan')),
        ]);
        # Atur Pesan dan Arahkan Ke Halaman Pengguna
        session()->setFlashdata("message", 'Data Berhasil Disimpan.');
        return redirect()->to('satuan');
    }
    public function delete($id)
    {
        # Hapus Data Dalam Database Sesuai Id
        $this->satuan->where('id', $id)->delete();
        # Atur Pesan dan Arahkan Ke Halaman Pengguna
        session()->setFlashdata('message', 'Data Berhasil Dihapus.');
        return redirect()->to('satuan');
    }
}
