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
                        <li class="breadcrumb-item"><a href="<?= base_url('barang') ?>">Data Barang</a></li>
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
                    <div class="mb-4">
                        <a href="<?= base_url("barang") ?>" class="btn btn-warning" id="kembali"> <i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="<?= base_url('/dist/img/'); echo $databarang[0]['211149_foto'] ?>" class="product-image" alt="Product Image">
                            </div>
                            <div class="col-sm-8">
                                <h3 class="my-3"><?= $databarang[0]['211149_namabarang']; ?></h3>
                                <p><?= $databarang[0]['211149_jenisbarang']; ?></p>
                                <hr>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Harga</b> <a class="float-right">Rp. <?= $databarang[0]['211149_harga']; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Stok</b> <a class="float-right"><?= $databarang[0]['211149_stok']; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Supplier</b> <a class="float-right"><?= $databarang[0]['211149_namasupplier']; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>No. Telp</b> <a class="float-right"><?= $databarang[0]['211149_notelp']; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Keterangan</b><br><p><?= htmlspecialchars_decode($databarang[0]['211149_ket']); ?></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->