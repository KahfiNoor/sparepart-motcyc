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
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Supplier</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($databarang as $ds) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $ds['211149_namabarang']; ?></td>
                    <td><?= 'Rp. ' . number_format($ds['211149_harga'], 0, ',', '.'); ?></td>
                    <td><?= $ds['211149_stok']; ?></td>
                    <td><?= $ds['211149_namasupplier']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>