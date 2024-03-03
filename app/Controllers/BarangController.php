<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Barang;
use App\Models\Pemasok;
use App\Models\Satuan;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use Dompdf\Dompdf;

class BarangController extends BaseController
{
    protected $validation, $barang, $satuan, $datas;
    public function __construct()
    {
        $this->validation = Services::validation();
        $this->barang = new Barang();
        $this->satuan = new Satuan();
        $this->datas = [
            'main_title'    => 'Data Barang',
            'sub_title'     => 'Halaman',
            'semuaBarang'   => $this->barang->joinSatuanPemasok(),
            'semuaSatuan'   => $this->satuan->findAll(),
            'validation'    => $this->validation,
        ];
    }
    public function index()
    {
        return view('master/barang/index', $this->datas);
    }
    public function create()
    {
        return view('master/barang/create', $this->datas);
    }
    public function save()
    {
        # Validasi Request
        $rules = [
            'kode'          => ['required', 'is_unique[barang.kode]'],
            'satuan_id'     => ['required'],
            'nama_barang'   => ['required'],
        ];
        # Jika Validasi Gagal
        if (!$this->validate($rules)) {
            return view('master/barang/create', $this->datas);
        }

        # Jika Validasi Berhasil, Simpan Data Kedalam Database
        $this->barang->save([
            'kode'            => trim($this->request->getVar('kode')),
            'satuan_id'     => trim($this->request->getVar('satuan_id')),
            'nama_barang'   => trim($this->request->getVar('nama_barang')),
            'jumlah'        => '0',
            'tempat'        => trim($this->request->getVar('tempat')),
        ]);
        # Atur Pesan dan Arahkan Ke Halaman Barang
        session()->setFlashdata("message", 'Data Berhasil Disimpan.');
        return redirect()->to('barang');
    }
    public function edit($id)
    {
        $data = [
            'validation'    => Services::validation(),
            'main_title'    => 'Data Barang',
            'sub_title'     => 'Halaman',
            'barang'        => $this->barang->where('kode', $id)->first(),
            'semuaSatuan'   => $this->satuan->findAll(),
        ];
        return view('master/barang/edit', $data);
    }
    public function update($id)
    {
        # Validasi Request
        $rules = [
            'kode'          => 'required|is_unique[barang.kode,kode,' . $id . ']',
            'satuan_id'     => ['required'],
            'nama_barang'   => ['required'],
        ];
        # Jika Validasi Gagal
        if (!$this->validate($rules)) {
            $data = [
                'validation'    => Services::validation(),
                'main_title'    => 'Data Barang',
                'sub_title'     => 'Halaman',
                'barang'        => $this->barang->where('kode', $id)->first(),
                'semuaSatuan'   => $this->satuan->findAll(),
            ];
            return view('master/barang/edit', $data);
        }
        # Jika Validasi Berhasil. Perbarhi Data Didalam Database
        $this->barang->update($id, [
            'kode'            => trim($this->request->getVar('kode')),
            'satuan_id'     => trim($this->request->getVar('satuan_id')),
            'nama_barang'   => trim($this->request->getVar('nama_barang')),
            'tempat'        => trim($this->request->getVar('tempat')),
        ]);
        # Atur Pesan dan Arahkan Ke Halaman Barang
        session()->setFlashdata("message", 'Data Berhasil Disimpan.');
        return redirect()->to('barang');
    }
    public function delete($id)
    {
        # Hapus Data Dalam Database Sesuai Id
        $this->barang->where('kode', $id)->delete();
        # Atur Pesan dan Arahkan Ke Halaman Barang
        session()->setFlashdata('message', 'Data Berhasil Dihapus.');
        return redirect()->to('barang');
    }
    public function laporan()
    {
        # Nama File PDF
        $nama_file = date('y-m-d-H-i-s')  . '-barang-laporan';
        # Memanggil dan menggunakan kelas DomPDF
        $dompdf = new Dompdf();
        # Memuat Konten HTML
        $dompdf->loadHtml(view('master\barang\laporan', [
            'datas' => $this->barang->joinSatuanPemasok(),
        ]));
        # Mengatur Ukuran dan Orientasi Kertas
        $dompdf->setPaper('A4', 'landscape');
        # Render HTML Menjadi PDF
        $dompdf->render();
        # Unduh PDF Sesuai dengan Nama File
        $dompdf->stream($nama_file);
    }
}
