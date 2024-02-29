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
        <div class="flex justify-end">
            <a href="<?= site_url('pemasok/create') ?>" class="px-3 py-1 pb-2 font-semibold text-white transition duration-300 rounded-md bg-slate-500 hover:bg-slate-600">Tambah Data Data</a>
        </div>

        <div class="flex flex-col mt-4">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-slate-200" id="dataTableConf">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 font-semibold capitalize text-slate-900 text-start">Nama Pemasok</th>
                                    <th scope="col" class="px-6 py-3 font-semibold capitalize text-slate-900 text-start">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200">
                                <?php foreach ($semuaPemasok as $pemasok) :  ?>
                                    <tr>
                                        <td class="font-semibold text-slate-900"><?= ucwords($pemasok->nama) ?></td>
                                        <td class="flex gap-2">
                                            <a href="<?= site_url('pemasok/' . $pemasok->id . '/edit') ?>" class="p-2 font-semibold text-yellow-800 bg-yellow-200 rounded-lg hover:bg-yellow-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                                                    <path d="M13.488 2.513a1.75 1.75 0 0 0-2.475 0L6.75 6.774a2.75 2.75 0 0 0-.596.892l-.848 2.047a.75.75 0 0 0 .98.98l2.047-.848a2.75 2.75 0 0 0 .892-.596l4.261-4.262a1.75 1.75 0 0 0 0-2.474Z" />
                                                    <path d="M4.75 3.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h6.5c.69 0 1.25-.56 1.25-1.25V9A.75.75 0 0 1 14 9v2.25A2.75 2.75 0 0 1 11.25 14h-6.5A2.75 2.75 0 0 1 2 11.25v-6.5A2.75 2.75 0 0 1 4.75 2H7a.75.75 0 0 1 0 1.5H4.75Z" />
                                                </svg>
                                            </a>
                                            <a onclick="return confirm('Yakin Hapus Data ?')" href="<?= site_url('pemasok/' . $pemasok->id . '/delete') ?>" class="p-2 font-semibold text-red-800 bg-red-200 rounded-lg hover:bg-red-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                                                    <path fill-rule="evenodd" d="M5 3.25V4H2.75a.75.75 0 0 0 0 1.5h.3l.815 8.15A1.5 1.5 0 0 0 5.357 15h5.285a1.5 1.5 0 0 0 1.493-1.35l.815-8.15h.3a.75.75 0 0 0 0-1.5H11v-.75A2.25 2.25 0 0 0 8.75 1h-1.5A2.25 2.25 0 0 0 5 3.25Zm2.25-.75a.75.75 0 0 0-.75.75V4h3v-.75a.75.75 0 0 0-.75-.75h-1.5ZM6.05 6a.75.75 0 0 1 .787.713l.275 5.5a.75.75 0 0 1-1.498.075l-.275-5.5A.75.75 0 0 1 6.05 6Zm3.9 0a.75.75 0 0 1 .712.787l-.275 5.5a.75.75 0 0 1-1.498-.075l.275-5.5a.75.75 0 0 1 .786-.711Z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </td>
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