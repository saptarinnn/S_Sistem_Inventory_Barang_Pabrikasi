<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Barang;
use App\Models\BarangMasuk;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class BarangMasukController extends BaseController
{
    protected $validation, $barang, $barang_masuk, $datas;
    public function __construct()
    {
        $this->validation = Services::validation();
        $this->barang = new Barang();
        $this->barang_masuk = new BarangMasuk();
        $this->datas = [
            'main_title'        => 'Data Barang Masuk',
            'sub_title'         => 'Halaman',
            'semuaBarangMasuk'  => $this->barang_masuk->joinBarang(),
            'semuaBarang'       => $this->barang->findAll(),
            'validation'        => $this->validation,
        ];
    }
    public function index()
    {
        return view('master/masuk/index', $this->datas);
    }
    public function create()
    {
        return view('master/masuk/create', $this->datas);
    }
    public function setkode()
    {
        # Ambil Kode Barang Dari Ajax
        $kode_barang = $this->request->getVar('kode_barang');
        # Cek Kode Barang Pada Database
        $data = $this->barang_masuk->where('barang_kode', $kode_barang)->findAll();
        # Tampilkan Data Respon Ajax
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function save()
    {
        # Validasi Request
        $rules = [
            'kode_barangmasuk'   => ['required', 'is_unique[barangmasuk.kode_barangmasuk]'],
            'tgl_barangmasuk'    => ['required'],
            'barang_kode'        => ['required'],
            'ukuran'             => ['required'],
            'jumlah_barangmasuk' => ['required', 'numeric'],
        ];
        # Jika Validasi Gagal
        if (!$this->validate($rules)) {
            return view('master/masuk/create', $this->datas);
        }
        # Ambil Data Barang 
        $data = $this->barang->where('kode', $this->request->getVar('barang_kode'))->first();
        # Jika Validasi Berhasil, Simpan Data Kedalam Database
        $this->barang_masuk->save([
            'tgl_barangmasuk'    => trim($this->request->getVar('tgl_barangmasuk')),
            'kode_barangmasuk'   => trim($this->request->getVar('kode_barangmasuk')),
            'barang_kode'        => trim($this->request->getVar('barang_kode')),
            'ukuran'             => trim($this->request->getVar('ukuran')),
            'jumlah_barangmasuk' => trim($this->request->getVar('jumlah_barangmasuk')),
        ]);
        # Update Stok Barang 
        $this->barang->update($this->request->getVar('barang_kode'), [
            'jumlah' => $data->jumlah + $this->request->getVar('jumlah_barangmasuk'),
        ]);
        # Atur Pesan dan Arahkan Ke Halaman Barang
        session()->setFlashdata("message", 'Data Berhasil Disimpan.');
        return redirect()->to('barang-masuk');
    }
    public function delete($id)
    {
        $barang_masuk = $this->barang_masuk->where('kode_barangmasuk', $id)->first();
        $barang = $this->barang->where('kode', $barang_masuk->barang_kode)->first();
        # Update Stok Barang 
        $this->barang->update($barang_masuk->barang_kode, [
            'jumlah' => $barang->jumlah - $barang_masuk->jumlah_barangmasuk,
        ]);
        # Hapus Data Dalam Database Sesuai Id
        $this->barang_masuk->where('kode_barangmasuk', $id)->delete();
        # Atur Pesan dan Arahkan Ke Halaman Barang
        session()->setFlashdata('message', 'Data Berhasil Dihapus.');
        return redirect()->to('barang-masuk');
    }
}
