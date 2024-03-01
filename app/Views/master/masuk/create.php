<?= $this->extend('layouts/app') ?>

<?= $this->section('sub-title') ?> <?= $sub_title ?> <?= $this->endSection() ?>
<?= $this->section('main-title') ?>Tambah <?= $main_title ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>


<div class="w-full py-5 mx-auto">
    <!-- Card -->
    <div class="p-4 bg-white shadow rounded-xl sm:p-7">

        <form method="post" action="<?= site_url('barang-masuk/save') ?>">
            <?= csrf_field(); ?>
            <!-- Tanggal Masuk Barang -->
            <div class="mb-4">
                <label for="tgl_barangmasuk" class="block mb-2 font-bold">Tanggal Masuk Barang</label>
                <input type="date" id="tgl_barangmasuk" maxlength="6" name="tgl_barangmasuk" class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg" placeholder="Input tanggal barang masuk" required>
                <!-- Error -->
                <?php if ($validation->getError('tgl_barangmasuk')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('tgl_barangmasuk'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Kode Masuk Barang -->
            <div class="mb-4">
                <label for="kode_barangmasuk" class="block mb-2 font-bold">Kode Masuk Barang</label>
                <input type="text" id="kode_barangmasuk" maxlength="6" name="kode_barangmasuk" class="block w-full px-3 py-2 font-bold bg-gray-100 border border-gray-200 rounded-lg" placeholder="Input kode barang masuk" required readonly>
                <!-- Error -->
                <?php if ($validation->getError('kode_barangmasuk')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('kode_barangmasuk'); ?>
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

            <!-- Ukuran -->
            <div class="mb-4">
                <label for="ukuran" class="block mb-2 font-bold">Ukuran</label>
                <input type="text" id="ukuran" name="ukuran" class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg" placeholder="Input ukuran" required>
                <!-- Error -->
                <?php if ($validation->getError('ukuran')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('ukuran'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Jumlah Barang Masuk -->
            <div class="mb-4">
                <label for="jumlah_barangmasuk" class="block mb-2 font-bold">Jumlah Barang Masuk</label>
                <input type="number" id="jumlah_barangmasuk" name="jumlah_barangmasuk" class="block w-full px-3 py-2 font-bold border border-gray-200 rounded-lg" placeholder="Input jumlah barang masuk">
                <!-- Error -->
                <?php if ($validation->getError('jumlah_barangmasuk')) : ?>
                    <div class='mt-1 mb-4 font-bold text-red-500'>
                        <?= $error = $validation->getError('jumlah_barangmasuk'); ?>
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
            url: '<?= site_url('barang-masuk/setkode') ?>',
            method: 'post',
            data: {
                kode_barang: value
            },
            dataType: 'json',
            cache: false,
            success: function(response) {
                if (value != '') {
                    if (response.length >= 0) {
                        $("#kode_barangmasuk").val(`${value}_P000${response.length + 1}`)
                    }
                    if (response.length >= 9) {
                        $("#kode_barangmasuk").val(`${value}_P00${response.length + 1}`)
                    }
                    if (response.length >= 99) {
                        $("#kode_barangmasuk").val(`${value}_P0${response.length + 1}`)
                    }
                    if (response.length >= 999) {
                        $("#kode_barangmasuk").val(`${value}_P${response.length + 1}`)
                    }
                } else {
                    $("#kode_barangmasuk").val('')
                }
            }
        });
    }
</script>
<?= $this->endSection() ?>