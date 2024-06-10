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
                        <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">Data User</a></li>
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
                                        icon: 'warning',
                                        title: pesan
                                    });
                                });
                            </script>";
                    }
                    ?>
                    <div class="mb-4">
                        <a href="<?= base_url("user") ?>" class="btn btn-warning" id="kembali"> <i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="col-8">
                    <!-- Horizontal Form -->
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Input Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="POST" action="<?= base_url('user/tambah') ?>">
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nama_user" class="col-sm-3 col-form-label">Nama User</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Nama User">
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Nama User</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                        <?php if (session()->getFlashdata('email_already')) {
                                            $pesan = session()->getFlashdata('email_already');
                                            echo "<span class='text-danger'>" . $pesan . "</span>";
                                        } ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                                        <?php if (session()->getFlashdata('username')) {
                                            $pesan = session()->getFlashdata('username');
                                            echo "<span class='text-danger'>" . $pesan . "</span>";
                                        } elseif (session()->getFlashdata('username_already')) {
                                            $pesan = session()->getFlashdata('username_already');
                                            echo "<span class='text-danger'>" . $pesan . "</span>";
                                        } ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                        <?php if (session()->getFlashdata('password')) {
                                            $pesan = session()->getFlashdata('password');
                                            echo "<span class='text-danger'>" . $pesan . "</span>";
                                        } ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_telp" class="col-sm-3 col-form-label">No. Telp</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="no_telp" id="no_telp" placeholder="No. Telp">
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <label for="level" class="col-sm-3 col-form-label">Level</label>
                                    <div class="col-sm-9">
                                        <select name="level" id="level" class="form-control select2bs4">
                                            <option disabled selected>Pilih Level</option>
                                            <option value="Karyawan">Karyawan</option>
                                            <option value="Owner">Owner</option>
                                        </select>
                                    </div>
                                </div> -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
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