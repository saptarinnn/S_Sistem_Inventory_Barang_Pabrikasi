<?= $this->extend('layouts/app') ?>

<?= $this->section('sub-title') ?> <?= $sub_title ?> <?= $this->endSection() ?>
<?= $this->section('main-title') ?>Tambah <?= $main_title ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>


<div class="w-full py-5 mx-auto">
    <!-- Card -->
    <div class="p-4 bg-white shadow rounded-xl sm:p-7">

        <form method="post" action="<?= site_url('pengguna/save') ?>">
            <?= csrf_field(); ?>
            <!-- Username -->
            <div class="mb-4">
                <label for="username" class="block mb-2 font-bold">Username</label>
                <input type="text" id="username" name="username" class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg" placeholder="Input username" required>
                <!-- Error -->
                <?php if ($validation->getError('username')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('username'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Peran -->
            <div class="mb-4">
                <label for="peran" class="block mb-2 font-bold">Peran</label>
                <select name="peran" id="peran" required class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg">
                    <option value="">Select One</option>
                    <?php foreach ($semuaPeran as $peran) : ?>
                        <option value="<?= $peran ?>"><?= ucwords($peran) ?></option>
                    <?php endforeach; ?>
                </select>
                <!-- Error -->
                <?php if ($validation->getError('peran')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('peran'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Nama Lengkap -->
            <div class="mb-4">
                <label for="nama_lengkap" class="block mb-2 font-bold">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg" placeholder="Input nama lengkap" required>
                <!-- Error -->
                <?php if ($validation->getError('nama_lengkap')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('nama_lengkap'); ?>
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