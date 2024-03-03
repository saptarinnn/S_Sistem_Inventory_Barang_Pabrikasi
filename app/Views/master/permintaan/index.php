<?= $this->extend('layouts/app') ?>

<?= $this->section('sub-title') ?> <?= $sub_title ?> <?= $this->endSection() ?>
<?= $this->section('main-title') ?> <?= $main_title ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Alert -->
<?php if (session()->has('message')) : ?>
    <div id="dismiss-alert" class="p-4 mt-3 text-teal-800 transition duration-300 border border-teal-200 rounded-lg hs-removing:translate-x-5 hs-removing:opacity-0 bg-teal-50" role="alert">
        <div class="flex items-center justify-center">
            <div class="flex-shrink-0">
                <i class='text-teal-800 bx-xs bx bx-check-double'></i>
            </div>
            <div class="ms-2">
                <div class="font-semibold">
                    <?= session()->getFlashData('message') ?>.
                </div>
            </div>
            <div class="ps-3 ms-auto">
                <div class="-mx-1.5 -my-1.5">
                    <button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600" data-hs-remove-element="#dismiss-alert">
                        <span class="sr-only">Dismiss</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path d="M5.28 4.22a.75.75 0 0 0-1.06 1.06L6.94 8l-2.72 2.72a.75.75 0 1 0 1.06 1.06L8 9.06l2.72 2.72a.75.75 0 1 0 1.06-1.06L9.06 8l2.72-2.72a.75.75 0 0 0-1.06-1.06L8 6.94 5.28 4.22Z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="w-full py-5 mx-auto">
    <!-- Card -->
    <div class="p-4 bg-white shadow rounded-xl sm:p-7">
        <div class="flex justify-end gap-2">
            <?php if (session('peran') == 'admin' || session('peran') == 'gudang') : ?>
                <a href="<?= site_url('permintaan/create') ?>" class="px-2 py-1 pb-2 text-sm font-semibold text-white transition duration-300 rounded-md bg-slate-500 hover:bg-slate-600">Tambah Data</a>
            <?php endif; ?>
            <?php if (session('peran') == 'admin' || session('peran') == 'manager') : ?>
                <a href="<?= site_url('permintaan/laporan') ?>" target="_blank" class="px-2 py-1 pb-2 text-sm font-semibold text-white transition duration-300 bg-green-600 rounded-md hover:bg-green-700">Laporan</a>
            <?php endif; ?>
        </div>

        <div class="flex flex-col mt-4">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-slate-200" id="dataTableConf">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 font-semibold capitalize text-slate-900 text-start">Tgl. Permintaan</th>
                                    <th scope="col" class="px-6 py-3 font-semibold capitalize text-slate-900 text-start">Barang</th>
                                    <th scope="col" class="px-6 py-3 font-semibold capitalize text-slate-900 text-start">Nama Pemohon</th>
                                    <th scope="col" class="px-6 py-3 font-semibold capitalize text-slate-900 text-start">Jabatan Pemohon</th>
                                    <th scope="col" class="px-6 py-3 font-semibold capitalize text-slate-900 text-start">Ket. Pemohon</th>
                                    <th scope="col" class="px-6 py-3 font-semibold capitalize text-slate-900 text-start">Status</th>
                                    <?php if (session('peran') == 'admin' || session('peran') == 'pembelian') : ?>
                                        <th scope="col" class="px-6 py-3 font-semibold capitalize text-slate-900 text-start">Aksi</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200">
                                <?php foreach ($semuaPermintaan as $permintaan) :  ?>
                                    <tr>
                                        <td class="font-semibold text-slate-900"><?= ucwords($permintaan->tgl_permintaan) ?></td>
                                        <td class="font-semibold text-slate-900"><?= ucwords($permintaan->nama_barang) ?></td>
                                        <td class="font-semibold text-slate-900"><?= ucwords($permintaan->nama_peminta) ?></td>
                                        <td class="font-semibold text-slate-900"><?= ucwords($permintaan->jabatan_peminta) ?></td>
                                        <td class="font-semibold text-slate-900"><?= ucwords($permintaan->ket_peminta) ?></td>
                                        <td class="font-semibold text-slate-900">
                                            <?php if ($permintaan->status_permintaan == 'kirim') : ?>
                                                <span class="text-sm font-bold text-blue-500">Menunggu Konfirmasi Admin</span>
                                            <?php endif; ?>
                                            <?php if ($permintaan->status_permintaan == 'selesai') : ?>
                                                <span class="text-sm font-bold text-green-500">Diterima</span>
                                            <?php endif; ?>
                                            <?php if ($permintaan->status_permintaan == 'gagal') : ?>
                                                <span class="text-sm font-bold text-red-500">Ditolak</span>
                                            <?php endif; ?>
                                        </td>
                                        <?php if (session('peran') == 'admin' || session('peran') == 'pembelian') : ?>
                                            <td>
                                                <?php if ($permintaan->status_permintaan == 'kirim') : ?>
                                                    <div class="flex gap-2">
                                                        <a href="<?= site_url('permintaan/' . $permintaan->id . '/confirm') ?>" class="p-2 font-semibold text-green-800 bg-green-200 rounded-lg hover:bg-green-300">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                                                                <path fill-rule="evenodd" d="M12.416 3.376a.75.75 0 0 1 .208 1.04l-5 7.5a.75.75 0 0 1-1.154.114l-3-3a.75.75 0 0 1 1.06-1.06l2.353 2.353 4.493-6.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                                            </svg>
                                                        </a>
                                                        <a href="<?= site_url('permintaan/' . $permintaan->id . '/cancel') ?>" class="p-2 font-semibold text-red-800 bg-red-200 rounded-lg hover:bg-red-300">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                                                                <path d="M5.28 4.22a.75.75 0 0 0-1.06 1.06L6.94 8l-2.72 2.72a.75.75 0 1 0 1.06 1.06L8 9.06l2.72 2.72a.75.75 0 1 0 1.06-1.06L9.06 8l2.72-2.72a.75.75 0 0 0-1.06-1.06L8 6.94 5.28 4.22Z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                <?php else : ?>
                                                    <strong>-</strong>
                                                <?php endif; ?>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card -->
</div>
<!-- End Card Section -->

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    new DataTable('#dataTableConf');
</script>
<?= $this->endSection() ?>