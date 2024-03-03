<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Permintaan;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    protected $permintaan, $barang, $barang_masuk, $barang_keluar;
    public function __construct()
    {
        $this->permintaan = new Permintaan();
        $this->barang = new Barang();
        $this->barang_masuk = new BarangMasuk();
        $this->barang_keluar = new BarangKeluar();
    }
    public function index()
    {
        return view('master/index', [
            'main_title'    => 'Dashboard',
            'sub_title'     => 'Dashboard',

            # Model Permintaan
            'permintaan'         => $this->permintaan->findAll(),
            'permintaan_baru'    => $this->permintaan->where('status_permintaan', 'kirim')->findAll(),
            'permintaan_selesai' => $this->permintaan->where('status_permintaan', 'selesai')->findAll(),
            'permintaan_gagal'   => $this->permintaan->where('status_permintaan', 'gagal')->findAll(),

            # Model Barang
            'barang'         =>  $this->barang->findAll(),
            'barang_masuk'   => $this->barang_masuk->findAll(),
            'barang_keluar'  => $this->barang_keluar->findAll(),
        ]);
    }
}
