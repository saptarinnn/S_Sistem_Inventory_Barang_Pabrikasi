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
    <h2 style="text-align: center;">Laporan Data Barang Keluar</h2>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Ukuran</th>
                <th>Jumlah Keluar</th>
                <th>User</th>
                <th>Area</th>
                <th>No. JOB/SO</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datas as $data) :  ?>
                <tr>
                    <td><?= ($data->tgl_barangkeluar) ?></td>
                    <td><?= strtoupper($data->kode_barangkeluar) ?></td>
                    <td><?= ucwords($data->nama_barang) ?></td>
                    <td><?= ucwords($data->ukuran) ?></td>
                    <td><?= ucwords($data->jumlah_barangkeluar) ?></td>
                    <td><?= ucwords($data->user) ?></td>
                    <td><?= ucwords($data->area) ?></td>
                    <td><?= ucwords($data->job_so) ?></td>
                    <td><?= ucwords($data->ket) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>