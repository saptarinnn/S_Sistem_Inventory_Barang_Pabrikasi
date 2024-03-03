<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #000;
            padding: 5px 10px;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">Laporan Data Permintaan Barang</h2>
    <table>
        <thead>
            <tr>
                <th>Tgl. Permintaan</th>
                <th>Barang</th>
                <th>Nama Pemohon</th>
                <th>Jabatan Pemohon</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datas as $data) :  ?>
                <tr>
                    <td><?= $data->tgl_permintaan ?></td>
                    <td><?= ucwords($data->nama_barang) ?></td>
                    <td><?= ucwords($data->nama_peminta) ?></td>
                    <td><?= ucwords($data->jabatan_peminta) ?></td>
                    <td class="font-semibold text-slate-900">
                        <?php if ($data->status_permintaan == 'kirim') : ?>
                            <span>Menunggu Konfirmasi Admin</span>
                        <?php endif; ?>
                        <?php if ($data->status_permintaan == 'selesai') : ?>
                            <span>Diterima</span>
                        <?php endif; ?>
                        <?php if ($data->status_permintaan == 'gagal') : ?>
                            <span>Ditolak</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>