<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('transaksi') ?>">Transaksi</a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php
                    // Tambahkan kode JavaScript SweetAlert di sini
                    if (session()->getFlashdata('pesan')) {
                        $pesan = session()->getFlashdata('pesan');
                        echo "<script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    var pesan = '{$pesan}';
                                    var Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000
                                    });
                                    Toast.fire({
                                        icon: 'success',
                                        title: pesan
                                    });
                                });
                            </script>";
                    }
                    ?>
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Data Riwayat Transaksi</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="global" class="table table-bordered table-hover">
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
                                        <?php if (session()->get('level') == "Owner") { ?>
                                            <th>
                                                <center>
                                                    <i class="fas fa-cogs"></i>
                                                </center>
                                            </th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($datatransaksi as $ds) :
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $ds['211149_nama']; ?></td>
                                            <td><?= $ds['211149_namabarang']; ?></td>
                                            <td><?= $ds['211149_namasupplier']; ?></td>
                                            <td><?= $ds['211149_jumlah']; ?></td>
                                            <td><?= date("d/m/Y", strtotime($ds['211149_tgltransaksi'])); ?></td>
                                            <td><?= date("H:i:s", strtotime($ds['211149_tgltransaksi'])); ?></td>
                                            <td id="total<?= $no ?>"></td>
                                            <td id="dibayar<?= $no ?>"></td>
                                            <td id="kembalian<?= $no ?>"></td>
                                            <?php if (session()->get('level') == "Owner") { ?>
                                                <td>
                                                    <center>
                                                        <a href="<?= base_url("transaksi/delete/") . $ds['211149_idtransaksi'] ?>" class="btn btn-danger" id="delete" onclick="konfirmasiHapus()"><i class="fas fa-trash"></i></a>
                                                    </center>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                        <script>
                                            var total<?= $no ?> = <?= $ds['211149_total']; ?>;
                                            var dibayar<?= $no ?> = <?= $ds['211149_dibayar']; ?>;
                                            var kembalian<?= $no ?> = <?= $ds['211149_kembalian']; ?>;

                                            var formatTotal<?= $no ?> = 'Rp. ' + total<?= $no ?>.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                            var formatDibayar<?= $no ?> = 'Rp. ' + dibayar<?= $no ?>.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                            var formatKembalian<?= $no ?> = 'Rp. ' + kembalian<?= $no ?>.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

                                            document.getElementById('total<?= $no ?>').innerText = formatTotal<?= $no ?>;
                                            document.getElementById('dibayar<?= $no ?>').innerText = formatDibayar<?= $no ?>;
                                            document.getElementById('kembalian<?= $no ?>').innerText = formatKembalian<?= $no ?>;
                                        </script>
                                    <?php endforeach; ?>
                                </tbody>
                                <script>
                                    function konfirmasiHapus() {
                                        if (confirm("Anda yakin ingin menghapus data ini?")) {
                                            // Jika pengguna mengonfirmasi, maka akan mengarahkan ke halaman penghapusan.
                                            return true
                                        } else {
                                            // Jika pengguna membatalkan, maka tidak akan ada tindakan yang diambil.
                                            event.preventDefault();
                                            return false
                                        }
                                    }
                                </script>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->