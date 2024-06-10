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
                    <!-- Default box -->
                    <div class="card card-solid">
                        <div class="card-body pb-0">
                            <div class="row">
                                <?php
                                foreach ($databarang as $ds) :
                                    if ($ds['211149_stok'] == 0) {
                                        $stok = 'Stok Habis';
                                        $ds['211149_disabled'] = true;
                                    } else {
                                        $stok = $ds['211149_stok'] . " Tersedia";
                                        $ds['211149_disabled'] = false;
                                    }
                                ?>
                                    <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch flex-column">
                                        <div class="card bg-light d-flex flex-fill">
                                            <img src="<?= base_url('/dist/img/') ?><?= $ds['211149_foto']; ?>" class="card-img-top" alt="Image">
                                            <div class="card-body pt-0">
                                                <div class="row text-center">
                                                    <h2 class="card-title col-md-12"><b><?= $ds['211149_namabarang']; ?></b></h2>
                                                    <span class="text-secondary col-md-12"><?= $ds['211149_namasupplier']; ?></span>
                                                </div>
                                                <div class="row d-flex justify-content-center">
                                                    <div class="bg-primary rounded sticky-bottom pt-3 px-4 mt-3 col-12">
                                                        <h5 class="mb-0">
                                                            <i class="fas fa-solid fa-money-bill"></i> <b>Rp. <?= $ds['211149_harga']; ?></b>
                                                        </h5>
                                                        <p class="mt-0"><?= $stok; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="float-right d-flex align-items-center justify-content-around">
                                                    <a href="<?= base_url("transaksi/d_pesan/") . $ds['211149_idbarang'] ?>" id="pesan" class="btn btn-danger <?php if ($ds['211149_disabled']) : ?>disabled<?php endif; ?>">
                                                        <?php if ($stok == 'Stok Habis') {
                                                            echo 'Stok Habis';
                                                        } else {
                                                            echo '<i class="fas fa-shopping-cart"></i> Pesan';
                                                        } ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->