<?= $this->extend('layouts/app') ?>

<?= $this->section('sub-title') ?> <?= $sub_title ?> <?= $this->endSection() ?>
<?= $this->section('main-title') ?>Tambah <?= $main_title ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>


<div class="w-full py-5 mx-auto">
    <!-- Card -->
    <div class="p-4 bg-white shadow rounded-xl sm:p-7">

        <form method="post" action="<?= site_url('barang/save') ?>">
            <?= csrf_field(); ?>
            <!-- Kode Barang -->
            <div class="mb-4">
                <label for="kode" class="block mb-2 font-bold">Kode Barang</label>
                <input type="text" id="kode" maxlength="6" name="kode" class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg" placeholder="Input kode barang" required>
                <!-- Error -->
                <?php if ($validation->getError('kode')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('kode'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Satuan Barang -->
            <div class="mb-4">
                <label for="satuan_id" class="block mb-2 font-bold">Satuan Barang</label>
                <select name="satuan_id" id="satuan_id" required class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg">
                    <option value="">Select One</option>
                    <?php foreach ($semuaSatuan as $satuan) : ?>
                        <option value="<?= $satuan->id ?>"><?= ucwords($satuan->nama_satuan) ?></option>
                    <?php endforeach; ?>
                </select>
                <!-- Error -->
                <?php if ($validation->getError('satuan_id')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('satuan_id'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Nama Barang -->
            <div class="mb-4">
                <label for="nama_barang" class="block mb-2 font-bold">Nama Barang</label>
                <input type="text" id="nama_barang" name="nama_barang" class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg" placeholder="Input nama barang" required>
                <!-- Error -->
                <?php if ($validation->getError('nama_barang')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('nama_barang'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Tempat -->
            <div class="mb-4">
                <label for="tempat" class="block mb-2 font-bold">Tempat</label>
                <input type="text" id="tempat" name="tempat" class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg" placeholder="Input tempat">
                <!-- Error -->
                <?php if ($validation->getError('tempat')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('tempat'); ?>
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