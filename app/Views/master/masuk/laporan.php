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
    <h2 style="text-align: center;">Laporan Data Barang Masuk</h2>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Ukuran</th>
                <th>Jumlah Masuk</th>
                <th>Lokasi</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datas as $data) :  ?>
                <tr>
                    <td><?= ($data->tgl_barangmasuk) ?></td>
                    <td><?= strtoupper($data->kode_barangmasuk) ?></td>
                    <td><?= ucwords($data->nama_barang) ?></td>
                    <td><?= ucwords($data->ukuran) ?></td>
                    <td><?= ucwords($data->jumlah_barangmasuk) ?></td>
                    <td><?= ucwords($data->tempat) ?></td>
                    <td><?= ucwords($data->nama) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>