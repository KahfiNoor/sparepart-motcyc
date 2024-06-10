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
                <th>Nama User</th>
                <th>No. Telp</th>
                <th>Level</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($datauser as $ds) :
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $ds['211149_nama']; ?></td>
                    <td><?= $ds['211149_notelp']; ?></td>
                    <td><?= $ds['211149_level']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>