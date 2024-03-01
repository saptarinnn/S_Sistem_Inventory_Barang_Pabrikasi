<?= $this->extend('layouts/app') ?>

<?= $this->section('sub-title') ?> <?= $sub_title ?> <?= $this->endSection() ?>
<?= $this->section('main-title') ?>Tambah <?= $main_title ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>


<div class="w-full py-5 mx-auto">
    <!-- Card -->
    <div class="p-4 bg-white shadow rounded-xl sm:p-7">

        <form method="post" action="<?= site_url('barang-keluar/save') ?>">
            <?= csrf_field(); ?>
            <!-- Tanggal Masuk Keluar -->
            <div class="mb-4">
                <label for="tgl_barangkeluar" class="block mb-2 font-bold">Tanggal Masuk Keluar</label>
                <input type="date" id="tgl_barangkeluar" maxlength="6" name="tgl_barangkeluar" class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg" placeholder="Input tanggal barang masuk" required>
                <!-- Error -->
                <?php if ($validation->getError('tgl_barangkeluar')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('tgl_barangkeluar'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Kode Masuk Keluar -->
            <div class="mb-4">
                <label for="kode_barangkeluar" class="block mb-2 font-bold">Kode Masuk Keluar</label>
                <input type="text" id="kode_barangkeluar" maxlength="6" name="kode_barangkeluar" class="block w-full px-3 py-2 font-bold bg-gray-100 border border-gray-200 rounded-lg" placeholder="Input kode barang masuk" required readonly>
                <!-- Error -->
                <?php if ($validation->getError('kode_barangkeluar')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('kode_barangkeluar'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Barang -->
            <div class="mb-4">
                <label for="barang_kode" class="block mb-2 font-bold">Barang</label>
                <select name="barang_kode" id="barang_kode" required class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg">
                    <option value="">Select One</option>
                    <?php foreach ($semuaBarang as $barang) : ?>
                        <option value="<?= $barang->kode ?>"><?= ucwords($barang->nama_barang) . ' - ' . $barang->jumlah . ' ' . $barang->nama_satuan ?></option>
                    <?php endforeach; ?>
                </select>
                <!-- Error -->
                <?php if ($validation->getError('barang_kode')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('barang_kode'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Ukuran -->
            <div class="mb-4">
                <label for="ukuran" class="block mb-2 font-bold">Ukuran</label>
                <input type="text" id="ukuran" name="ukuran" class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg" placeholder="Input ukuran">
                <!-- Error -->
                <?php if ($validation->getError('ukuran')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('ukuran'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Jumlah Barang Keluar -->
            <div class="mb-4">
                <label for="jumlah_barangkeluar" class="block mb-2 font-bold">Jumlah Barang Keluar</label>
                <input type="number" id="jumlah_barangkeluar" name="jumlah_barangkeluar" class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg" placeholder="Input jumlah barang masuk">
                <!-- Error -->
                <?php if ($validation->getError('jumlah_barangkeluar')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('jumlah_barangkeluar'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- User -->
            <div class="mb-4">
                <label for="user" class="block mb-2 font-bold">User</label>
                <input type="text" id="user" name="user" class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg" placeholder="Input user">
                <!-- Error -->
                <?php if ($validation->getError('user')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('user'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Area -->
            <div class="mb-4">
                <label for="area" class="block mb-2 font-bold">Area</label>
                <input type="text" id="area" name="area" class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg" placeholder="Input area">
                <!-- Error -->
                <?php if ($validation->getError('area')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('area'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- No. JOB/SO -->
            <div class="mb-4">
                <label for="job_so" class="block mb-2 font-bold">No. JOB/SO</label>
                <input type="text" id="job_so" name="job_so" class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg" placeholder="Input job_so">
                <!-- Error -->
                <?php if ($validation->getError('job_so')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('job_so'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Keterangan -->
            <div class="mb-4">
                <label for="ket" class="block mb-2 font-bold">Keterangan</label>
                <input type="text" id="ket" name="ket" class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg" placeholder="Input keterangan">
                <!-- Error -->
                <?php if ($validation->getError('ket')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('ket'); ?>
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

<?= $this->section('script') ?>
<script>
    let selectBarang = $("#barang_kode");
    selectBarang.change(function() {
        let selectedBarang = $(this).children("option:selected").val();
        setKodeBarangMasuk(selectedBarang);
    });

    function setKodeBarangMasuk(value) {
        $.ajax({
            url: '<?= site_url('barang-keluar/setkode') ?>',
            method: 'post',
            data: {
                kode_barang: value
            },
            dataType: 'json',
            cache: false,
            success: function(response) {
                if (value != '') {
                    if (response.length >= 0) {
                        $("#kode_barangkeluar").val(`${value}_P000${response.length + 1}`)
                    }
                    if (response.length >= 9) {
                        $("#kode_barangkeluar").val(`${value}_P00${response.length + 1}`)
                    }
                    if (response.length >= 99) {
                        $("#kode_barangkeluar").val(`${value}_P0${response.length + 1}`)
                    }
                    if (response.length >= 999) {
                        $("#kode_barangkeluar").val(`${value}_P${response.length + 1}`)
                    }
                } else {
                    $("#kode_barangkeluar").val('')
                }
            }
        });
    }
</script>
<?php if (session()->has('error')) : ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "error",
            title: "Jumlah Barang Keluar Meleihi Stock Barang!"
        });
    </script>
<?php endif; ?>
<?= $this->endSection() ?>