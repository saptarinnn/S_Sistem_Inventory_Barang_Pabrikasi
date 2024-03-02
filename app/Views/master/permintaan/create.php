<?= $this->extend('layouts/app') ?>

<?= $this->section('sub-title') ?> <?= $sub_title ?> <?= $this->endSection() ?>
<?= $this->section('main-title') ?>Tambah <?= $main_title ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>


<div class="w-full py-5 mx-auto">
    <!-- Card -->
    <div class="p-4 bg-white shadow rounded-xl sm:p-7">

        <form method="post" action="<?= site_url('permintaan/save') ?>">
            <?= csrf_field(); ?>
            <!-- Tgl. Permintaan -->
            <div class="mb-4">
                <label for="tgl_permintaan" class="block mb-2 font-bold">Tgl. Permintaan</label>
                <input type="date" id="tgl_permintaan" name="tgl_permintaan" class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg" placeholder="Input tanggal permintaan" required>
                <!-- Error -->
                <?php if ($validation->getError('tgl_permintaan')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('tgl_permintaan'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Barang -->
            <div class="mb-4">
                <label for="barang_kode" class="block mb-2 font-bold">Barang</label>
                <select name="barang_kode" id="barang_kode" required class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg">
                    <option value="">Select One</option>
                    <?php foreach ($semuaBarang as $barang) : ?>
                        <option value="<?= $barang->kode ?>"><?= ucwords($barang->nama_barang) ?></option>
                    <?php endforeach; ?>
                </select>
                <!-- Error -->
                <?php if ($validation->getError('barang_kode')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('barang_kode'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Nama Pemohon -->
            <div class="mb-4">
                <label for="nama_peminta" class="block mb-2 font-bold">Nama Pemohon</label>
                <input type="text" id="nama_peminta" name="nama_peminta" class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg" placeholder="Input tanggal permintaan" required>
                <!-- Error -->
                <?php if ($validation->getError('nama_peminta')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('nama_peminta'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Jabatan Pemohon -->
            <div class="mb-4">
                <label for="jabatan_peminta" class="block mb-2 font-bold">Jabatan Pemohon</label>
                <input type="text" id="jabatan_peminta" name="jabatan_peminta" class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg" placeholder="Input tanggal permintaan" required>
                <!-- Error -->
                <?php if ($validation->getError('jabatan_peminta')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('jabatan_peminta'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Keterangan Pemohon -->
            <div class="mb-4">
                <label for="ket_peminta" class="block mb-2 font-bold">Keterangan Pemohon</label>
                <input type="text" id="ket_peminta" name="ket_peminta" class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg" placeholder="Input tanggal permintaan" required>
                <!-- Error -->
                <?php if ($validation->getError('ket_peminta')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('ket_peminta'); ?>
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