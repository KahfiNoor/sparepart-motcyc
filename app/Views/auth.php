<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sparepart | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('/') ?>dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('/'); ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
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
                            icon: 'error',
                            title: pesan
                        });
                    });
                </script>";
        }
        ?>
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?= base_url('auth') ?>" class="h1"><b>Sparepart</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Login Account</p>

                <?php if (session()->getFlashdata('pesan')) {
                    $pesan = session()->getFlashdata('pesan');
                    echo "<span class='text-danger'>" . $pesan . "</span>";
                } ?>
                <form action="<?= base_url('auth/login') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </form>
                <br>
                <p class="login-box-msg">belum punya akun Owner? <a href="<?= base_url('auth/regis') ?>">Sign Up</a></p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('/') ?>dist/js/adminlte.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url('/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
</body>

</html>