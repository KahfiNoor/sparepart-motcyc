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
                        <li class="breadcrumb-item"><a href="<?= base_url('supplier') ?>">Data Supplier</a></li>
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
                        <a href="<?= base_url("supplier") ?>" class="btn btn-warning" id="kembali"> <i class="fas fa-arrow-left"></i> Kembali</a>
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
                        <form class="form-horizontal" method="POST" action="<?= base_url('supplier/edit') ?>">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nama_supplier" class="col-sm-3 col-form-label">Nama Supplier</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" class="form-control" name="id_supplier" id="id_supplier" value="<?= $datasupplier[0]['211149_idsupplier']; ?>">
                                        <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" value="<?= $datasupplier[0]['211149_namasupplier']; ?>" placeholder="Nama Supplier">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_telp" class="col-sm-3 col-form-label">No. Telp</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="no_telp" id="no_telp" value="<?= $datasupplier[0]['211149_notelp']; ?>" placeholder="No. Telp">
                                    </div>
                                </div>
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