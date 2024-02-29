<?= $this->extend('layouts/app') ?>

<?= $this->section('sub-title') ?> <?= $sub_title ?> <?= $this->endSection() ?>
<?= $this->section('main-title') ?>Edit <?= $main_title ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>


<div class="w-full py-5 mx-auto">
    <!-- Card -->
    <div class="p-4 bg-white shadow rounded-xl sm:p-7">

        <form method="post" action="<?= site_url('pemasok/' . $pemasok->id . '/update') ?>">
            <?= csrf_field(); ?>
            <!-- Nama Pemasok -->
            <div class="mb-4">
                <label for="nama" class="block mb-2 font-bold">Nama Pemasok</label>
                <input type="text" id="nama" name="nama" class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg" placeholder="Input nama pemasok" required value="<?= $pemasok->nama ?>">
                <!-- Error -->
                <?php if ($validation->getError('nama')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('nama'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Button -->
            <div class="w-full">
                <button type="submit" class="w-full py-3 font-semibold text-white rounded-lg bg-slate-600 hover:bg-slate-700">Save Data</button>
            </div>
        </form>

    </div>
    <!-- End Card -->
</div>

<?= $this->endSection() ?>