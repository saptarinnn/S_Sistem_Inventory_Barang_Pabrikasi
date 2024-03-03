<?= $this->extend('layouts/app') ?>

<?= $this->section('main-title') ?> <?= $main_title ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Peran Pembelian -->
<?php if (session('peran') == 'admin' || session('peran') == 'pembelian') : ?>
    <!-- Card Section -->
    <div class="grid w-full grid-cols-1 gap-2 pt-5 mx-auto lg:grid-cols-2 xl:grid-cols-4">
        <!-- Total Permintaan Barang -->
        <div class="p-4 bg-white shadow rounded-xl">
            <h3 class="mb-[2px] text-lg font-semibold text-slate-400">Total Permintaan Barang</h3>
            <p class="text-3xl font-extrabold text-blue-600"><?= count($permintaan) ?></p>
            <span class="font-bold text-slate-500">Barang</span>
        </div>
        <!-- End Total Permintaan Barang -->

        <!-- Permintaan Barang Baru -->
        <div class="p-4 bg-white shadow rounded-xl">
            <h3 class="mb-[2px] text-lg font-semibold text-slate-400">Permintaan Barang Baru</h3>
            <p class="text-3xl font-extrabold text-cyan-600"><?= count($permintaan_baru) ?></p>
            <span class="font-bold text-slate-500">Barang</span>
        </div>
        <!-- End Permintaan Barang Baru -->

        <!-- Permintaan Barang Diterima -->
        <div class="p-4 bg-white shadow rounded-xl">
            <h3 class="mb-[2px] text-lg font-semibold text-slate-400">Permintaan Barang Diterima</h3>
            <p class="text-3xl font-extrabold text-green-600"><?= count($permintaan_selesai) ?></p>
            <span class="font-bold text-slate-500">Barang</span>
        </div>
        <!-- End Permintaan Barang Diterima -->

        <!-- Permintaan Barang Ditolak -->
        <div class="p-4 bg-white shadow rounded-xl">
            <h3 class="mb-[2px] text-lg font-semibold text-slate-400">Permintaan Barang Ditolak</h3>
            <p class="text-3xl font-extrabold text-red-600"><?= count($permintaan_gagal) ?></p>
            <span class="font-bold text-slate-500">Barang</span>
        </div>
        <!-- End Permintaan Barang Ditolak -->

    </div>
    <!-- End Card Section -->
<?php endif; ?>
<!-- End Peran Pembelian -->

<!-- Peran Gudang & Manager -->
<?php if (session('peran') == 'admin' || session('peran') == 'gudang' || session('peran') == 'manager') : ?>
    <!-- Card Section -->
    <div class="grid w-full grid-cols-1 gap-2 pt-5 mx-auto lg:grid-cols-2 xl:grid-cols-4">
        <!-- Total Barang -->
        <div class="p-4 bg-white shadow rounded-xl">
            <h3 class="mb-[2px] text-lg font-semibold text-slate-400">Total Barang</h3>
            <p class="text-3xl font-extrabold text-blue-600"><?= count($barang) ?></p>
            <span class="font-bold text-slate-500">Barang</span>
        </div>
        <!-- End Total Barang -->

        <!-- Transaksi Barang Masuk -->
        <div class="p-4 bg-white shadow rounded-xl">
            <h3 class="mb-[2px] text-lg font-semibold text-slate-400">Transaksi Barang Masuk</h3>
            <p class="text-3xl font-extrabold text-green-600"><?= count($barang_masuk) ?></p>
            <span class="font-bold text-slate-500">Barang</span>
        </div>
        <!-- End Transaksi Barang Masuk -->

        <!-- Transaksi Barang Keluar -->
        <div class="p-4 bg-white shadow rounded-xl">
            <h3 class="mb-[2px] text-lg font-semibold text-slate-400">Transaksi Barang Keluar</h3>
            <p class="text-3xl font-extrabold text-red-600"><?= count($barang_keluar) ?></p>
            <span class="font-bold text-slate-500">Barang</span>
        </div>
        <!-- End Transaksi Barang Keluar -->

        <!-- Total Permintaan Barang -->
        <div class="p-4 bg-white shadow rounded-xl">
            <h3 class="mb-[2px] text-lg font-semibold text-slate-400">Total Permintaan Barang</h3>
            <p class="text-3xl font-extrabold text-cyan-600"><?= count($permintaan) ?></p>
            <span class="font-bold text-slate-500">Barang</span>
        </div>
        <!-- End Total Permintaan Barang -->

    </div>
    <!-- End Card Section -->
<?php endif; ?>
<!-- End Peran Gudang & Manager -->

<?= $this->endSection() ?>