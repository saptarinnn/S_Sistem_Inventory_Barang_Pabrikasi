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
    <h2 style="text-align: center;">Laporan Data Barang</h2>
    <table>
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Jumlah</th>
                <th>Tempat</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datas as $data) :  ?>
                <tr>
                    <td><?= strtoupper($data->kode) ?></td>
                    <td><?= ucwords($data->nama_barang) ?></td>
                    <td><?= ucwords($data->nama_satuan) ?></td>
                    <td><?= ucwords($data->jumlah) ?></td>
                    <td><?= ucwords($data->tempat) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>