<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Barang;
use App\Models\Pemasok;
use App\Models\Permintaan;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use Dompdf\Dompdf;

class PermintaanController extends BaseController
{
    protected $validation, $permintaan, $barang, $datas;
    public function __construct()
    {
        $this->validation = Services::validation();
        $this->permintaan = new Permintaan();
        $this->barang = new Barang();
        $this->datas = [
            'main_title'    => 'Data Permintaan Barang',
            'sub_title'     => 'Transaksi',
            'semuaBarang'   => $this->barang->joinSatuanPemasok(),
            'semuaPermintaan'   => $this->permintaan->joinBarang(),
            'validation'    => $this->validation,
        ];
    }
    public function index()
    {
        return view('master/permintaan/index', $this->datas);
    }
    public function create()
    {
        return view('master/permintaan/create', $this->datas);
    }
    public function save()
    {
        # Validasi Request
        $rules = [
            'barang_kode' => ['required'],
            'tgl_permintaan' => ['required'],
            'nama_peminta' => ['required'],
            'jabatan_peminta' => ['required'],
            'ket_peminta' => ['required'],
        ];
        # Jika Validasi Gagal
        if (!$this->validate($rules)) {
            return view('master/permintaan/create', $this->datas);
        }

        # Jika Validasi Berhasil, Simpan Data Kedalam Database
        $this->permintaan->save([
            'barang_kode' => trim($this->request->getVar('barang_kode')),
            'tgl_permintaan' => trim($this->request->getVar('tgl_permintaan')),
            'nama_peminta' => trim($this->request->getVar('nama_peminta')),
            'jabatan_peminta' => trim($this->request->getVar('jabatan_peminta')),
            'ket_peminta' => trim($this->request->getVar('ket_peminta')),
            'status_permintaan' => 'kirim',
        ]);
        # Atur Pesan dan Arahkan Ke Halaman Barang
        session()->setFlashdata("message", 'Data Berhasil Disimpan.');
        return redirect()->to('permintaan');
    }
    public function confirm($id)
    {
        # Perbarhi Data Didalam Database
        $this->permintaan->update($id, [
            'status_permintaan' => 'selesai',
        ]);
        # Atur Pesan dan Arahkan Ke Halaman Barang
        session()->setFlashdata('message', 'Permintaan Barang Berhasil Dikonfirmasi.');
        return redirect()->to('permintaan');
    }
    public function cancel($id)
    {
        # Perbarhi Data Didalam Database
        $this->permintaan->update($id, [
            'status_permintaan' => 'gagal',
        ]);
        # Atur Pesan dan Arahkan Ke Halaman Barang
        session()->setFlashdata('message', 'Permintaan Barang Tidak Diterima.');
        return redirect()->to('permintaan');
    }
    public function laporan()
    {
        # Nama File PDF
        $nama_file = date('y-m-d-H-i-s')  . '-permintaan-barang-laporan';
        # Memanggil dan menggunakan kelas DomPDF
        $dompdf = new Dompdf();
        # Memuat Konten HTML
        $dompdf->loadHtml(view('master\permintaan\laporan', [
            'datas' => $this->permintaan->joinBarang(),
        ]));
        # Mengatur Ukuran dan Orientasi Kertas
        $dompdf->setPaper('A4', 'landscape');
        # Render HTML Menjadi PDF
        $dompdf->render();
        # Unduh PDF Sesuai dengan Nama File
        $dompdf->stream($nama_file);
    }
}
