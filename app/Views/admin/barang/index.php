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
                    <?php if (session()->get('level') == "Owner") { ?>
                        <div class="mb-4">
                            <a href="<?= base_url("barang/d_tambah") ?>" class="btn btn-success" id="tambah"> <i class="fas fa-plus"></i> Tambah</a>
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
                        </div>
                    <?php } ?>
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Data Suku Cadang</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tabelData" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Jenis</th>
                                        <th>
                                            <center>
                                                Re-Stok
                                            </center>
                                        </th>
                                        <th>
                                            <center>
                                                <i class="fas fa-cogs"></i>
                                            </center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($databarang as $ds) :
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $ds['211149_namabarang']; ?></td>
                                            <td id="harga<?= $no ?>"></td>
                                            <td><?= $ds['211149_stok']; ?></td>
                                            <td><?= $ds['211149_jenisbarang']; ?></td>
                                            <td>
                                                <center>
                                                    <a href="<?= base_url("barang/d_stok/") . $ds['211149_idbarang'] ?>" class="btn btn-primary" id="detail">Tambah Stok</a>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a href="<?= base_url("/barang/d_detail/") . $ds['211149_idbarang'] ?>" class="btn btn-info" id="detail"><i class="fas fa-info p-1"></i></a>
                                                    <?php if (session()->get('level') == "Owner") { ?>
                                                        <a href="<?= base_url("barang/d_edit/") . $ds['211149_idbarang'] ?>" class="btn btn-warning" id="Edit"><i class="fas fa-edit"></i></a>
                                                        <a href="<?= base_url("barang/delete/") . $ds['211149_idbarang'] . "/" . $ds['211149_foto'] ?>" class="btn btn-danger" id="delete" onclick="konfirmasiHapus()"><i class="fas fa-trash"></i></a>
                                                    <?php } ?>
                                                </center>
                                            </td>
                                        </tr>
                                        <script>
                                            var harga<?= $no ?> = <?= $ds['211149_harga']; ?>;

                                            var formatHarga<?= $no ?> = 'Rp. ' + harga<?= $no ?>.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

                                            document.getElementById('harga<?= $no ?>').innerText = formatHarga<?= $no ?>;
                                        </script>
                                    <?php endforeach; ?>
                                </tbody>
                                <script>
                                    function konfirmasiHapus() {
                                        if (confirm("Anda yakin ingin menghapus barang ini?")) {
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
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->