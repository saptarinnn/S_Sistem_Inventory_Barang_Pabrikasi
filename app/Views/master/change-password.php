<?= $this->extend('layouts/app') ?>

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

<!-- Card Section -->
<div class="w-full pt-5 mx-auto">
    <!-- Total Permintaan Barang -->
    <div class="p-4 bg-white shadow rounded-xl">
        <form method="post" action="<?= site_url('change-password/' . session('id')) ?>">
            <?= csrf_field(); ?>
            <!-- Nama Lengkap -->
            <div class="mb-4">
                <label for="nama_lengkap" class="block mb-2 font-bold">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" class="block w-full px-3 py-2 font-bold bg-gray-100 border border-gray-200 rounded-lg" value="<?= ucwords(session('nama_lengkap')) ?>" required readonly>
                <!-- Error -->
                <?php if ($validation->getError('nama_lengkap')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('nama_lengkap'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Username -->
            <div class="mb-4">
                <label for="username" class="block mb-2 font-bold">Username</label>
                <input type="text" id="username" name="username" class="block w-full px-3 py-2 font-bold bg-gray-100 border border-gray-200 rounded-lg" value="<?= session('username') ?>" required readonly>
                <!-- Error -->
                <?php if ($validation->getError('username')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('username'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Password Baru -->
            <div class="mb-4">
                <label for="password_baru" class="block mb-2 font-bold">Password Baru</label>
                <input type="password" id="password_baru" name="password_baru" class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg" placeholder="Input password baru" required>
                <!-- Error -->
                <?php if ($validation->getError('password_baru')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('password_baru'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Button -->
            <div class="w-full">
                <button type="submit" class="w-full py-3 font-semibold text-white rounded-lg bg-slate-600 hover:bg-slate-700">Simpan Data</button>
            </div>
        </form>
    </div>
    <!-- End Total Permintaan Barang -->
</div>
<!-- End Card Section -->


<?= $this->endSection() ?>