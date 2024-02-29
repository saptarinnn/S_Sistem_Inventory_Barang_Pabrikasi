<?= $this->extend('layouts/app') ?>

<?= $this->section('sub-title') ?> <?= $sub_title ?> <?= $this->endSection() ?>
<?= $this->section('main-title') ?>Tambah <?= $main_title ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>


<div class="w-full py-5 mx-auto">
    <!-- Card -->
    <div class="p-4 bg-white shadow rounded-xl sm:p-7">

        <form method="post" action="<?= site_url('satuan/save') ?>">
            <?= csrf_field(); ?>
            <!-- Nama Satuan -->
            <div class="mb-4">
                <label for="nama_satuan" class="block mb-2 font-bold">Nama Satuan</label>
                <input type="text" id="nama_satuan" name="nama_satuan" class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg" placeholder="Input nama satuan" required>
                <!-- Error -->
                <?php if ($validation->getError('nama_satuan')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('nama_satuan'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Button -->
            <div class="w-full">
                <button type="submit" class="w-full py-3 font-semibold text-white rounded-lg bg-slate-600 hover:bg-slate-700">Simpan Data</button>
            </div>
        </form>

    </div>
    <!-- End Card -->
</div>

<?= $this->endSection() ?>