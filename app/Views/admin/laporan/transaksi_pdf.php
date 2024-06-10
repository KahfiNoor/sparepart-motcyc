<!-- app/Views/tabel_pdf.php -->

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Gaya CSS yang sesuai untuk tampilan PDF */

        body{
            font-family: sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }
        .brand {
            font-weight: bold;
            font-size: xx-large;
        }
        .yellow {
            color: #e6b400;
        }
    </style>
</head>

<body>
    <h1 class="brand"><span class="yellow">Spare</span>Part</h1>
    <h4><?= $title ?></h4>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Kasir</th>
                <th>Nama Barang</th>
                <th>Supplier</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Total</th>
                <th>Dibayar</th>
                <th>Kembalian</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($datatransaksi as $ds) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $ds['211149_nama']; ?></td>
                    <td><?= $ds['211149_namabarang']; ?></td>
                    <td><?= $ds['211149_namasupplier']; ?></td>
                    <td><?= $ds['211149_jumlah']; ?></td>
                    <td><?= date("d/m/Y", strtotime($ds['211149_tgltransaksi'])); ?></td>
                    <td><?= date("H:i:s", strtotime($ds['211149_tgltransaksi'])); ?></td>
                    <td><?= 'Rp. ' . number_format($ds['211149_total'], 0, ',', '.'); ?></td>
                    <td><?= 'Rp. ' . number_format($ds['211149_dibayar'], 0, ',', '.'); ?></td>
                    <td><?= 'Rp. ' . number_format($ds['211149_kembalian'], 0, ',', '.'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>