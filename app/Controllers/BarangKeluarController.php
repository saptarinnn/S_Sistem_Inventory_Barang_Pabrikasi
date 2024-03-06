<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Barang;
use App\Models\BarangKeluar;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use Dompdf\Dompdf;

class BarangKeluarController extends BaseController
{
    protected $validation, $barang, $barang_keluar, $pemasok, $datas, $session;
    public function __construct()
    {
        $this->session = session();
        $this->validation = Services::validation();
        $this->barang = new Barang();
        $this->barang_keluar = new BarangKeluar();
        $this->datas = [
            'main_title'        => 'Data Barang Keluar',
            'sub_title'         => 'Transaksi',
            'semuaBarangKeluar' => $this->barang_keluar->joinBarang(),
            'semuaBarang'       => $this->barang->joinSatuanNotZero(),
            'validation'        => $this->validation,
        ];
    }
    public function index()
    {
        return view('master/keluar/index', $this->datas);
    }
    public function create()
    {
        return view('master/keluar/create', $this->datas);
    }
    public function setkode()
    {
        # Ambil Kode Barang Dari Ajax
        $kode_barang = $this->request->getVar('kode_barang');
        # Cek Kode Barang Pada Database
        $data = $this->barang_keluar->where('barang_kode', $kode_barang)->findAll();
        # Tampilkan Data Respon Ajax
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function save()
    {
        # Validasi Request
        $rules = [
            'kode_barangkeluar'     => ['required', 'is_unique[barangkeluar.kode_barangkeluar]'],
            'tgl_barangkeluar'      => ['required'],
            'barang_kode'           => ['required'],
            'jumlah_barangkeluar'   => ['required', 'numeric'],
        ];
        # Jika Validasi Gagal
        if (!$this->validate($rules)) {
            return view('master/keluar/create', $this->datas);
        }
        # Ambil Data Barang 
        $data = $this->barang->where('kode', $this->request->getVar('barang_kode'))->first();
        if ($this->request->getVar('jumlah_barangkeluar') > $data->jumlah) {
            $this->session->setFlashdata('error', '');
            return view('master/keluar/create', $this->datas);
        }
        # Jika Validasi Berhasil, Simpan Data Kedalam Database
        $this->barang_keluar->save([
            'tgl_barangkeluar'      => trim($this->request->getVar('tgl_barangkeluar')),
            'kode_barangkeluar'     => trim($this->request->getVar('kode_barangkeluar')),
            'barang_kode'           => trim($this->request->getVar('barang_kode')),
            'ukuran'                => trim($this->request->getVar('ukuran')),
            'jumlah_barangkeluar'   => trim($this->request->getVar('jumlah_barangkeluar')),
            'user'                  => trim($this->request->getVar('user')),
            'area'                  => trim($this->request->getVar('area')),
            'job_so'                => trim($this->request->getVar('job_so')),
            'ket'                   => trim($this->request->getVar('ket')),
        ]);
        # Update Stok Barang 
        $this->barang->update($this->request->getVar('barang_kode'), [
            'jumlah' => $data->jumlah - $this->request->getVar('jumlah_barangkeluar'),
        ]);
        # Atur Pesan dan Arahkan Ke Halaman Barang
        session()->setFlashdata("message", 'Data Berhasil Disimpan.');
        return redirect()->to('barang-keluar');
    }
    public function delete($id)
    {
        $barang_keluar = $this->barang_keluar->where('kode_barangkeluar', $id)->first();
        $barang = $this->barang->where('kode', $barang_keluar->barang_kode)->first();
        # Update Stok Barang 
        $this->barang->update($barang_keluar->barang_kode, [
            'jumlah' => $barang->jumlah + $barang_keluar->jumlah_barangkeluar,
        ]);
        # Hapus Data Dalam Database Sesuai Id
        $this->barang_keluar->where('kode_barangkeluar', $id)->delete();
        # Atur Pesan dan Arahkan Ke Halaman Barang
        session()->setFlashdata('message', 'Data Berhasil Dihapus.');
        return redirect()->to('barang-keluar');
    }
    public function laporan()
    {
        # Nama File PDF
        $nama_file = date('y-m-d-H-i-s')  . '-barang-laporan';
        # Memanggil dan menggunakan kelas DomPDF
        $dompdf = new Dompdf();
        # Memuat Konten HTML
        $dompdf->loadHtml(view('keluar_laporan', [
            'datas' => $this->barang_keluar->joinBarang(),
        ]));
        # Mengatur Ukuran dan Orientasi Kertas
        $dompdf->setPaper('A4', 'landscape');
        # Render HTML Menjadi PDF
        $dompdf->render();
        # Unduh PDF Sesuai dengan Nama File
        $dompdf->stream($nama_file);
    }
}
