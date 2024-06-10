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
                            <a href="<?= base_url("supplier/d_tambah") ?>" class="btn btn-success" id="tambah"> <i class="fas fa-plus"></i> Tambah</a>
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
                            <h3 class="card-title">Data Supplier</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tabelData" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Supplier</th>
                                        <th>No. Telp</th>

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
                                    foreach ($datasupplier as $ds) :
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $ds['211149_namasupplier']; ?></td>
                                            <td><?= $ds['211149_notelp']; ?></td>

                                            <?php if (session()->get('level') == "Owner") { ?>
                                                <td>
                                                    <center>
                                                        <a href="<?= base_url("supplier/d_edit/") . $ds['211149_idsupplier'] ?>" class="btn btn-warning" id="Edit"><i class="fas fa-edit"></i></a>
                                                        <a href="<?= base_url("supplier/delete/") . $ds['211149_idsupplier'] ?>" class="btn btn-danger" id="delete" onclick="konfirmasiHapus()"><i class="fas fa-trash"></i></a>
                                                    </center>
                                                </td>
                                            <?php } ?>
                                        </tr>
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
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->