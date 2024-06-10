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
                <div class="col-8">
                    <!-- Horizontal Form -->
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Input Data</h3>
                        </div>
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
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="POST" action="<?= base_url('barang/edit') ?>" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nama_barang" class="col-sm-3 col-form-label">Nama Barang</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" name="id_barang" id="id_barang" value="<?= $databarang['211149_idbarang']; ?>">
                                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?= $databarang['211149_namabarang']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenis_barang" class="col-sm-3 col-form-label">Jenis Barang</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="jenis_barang" id="jenis_barang" placeholder="Jenis Barang" value="<?= $databarang['211149_jenisbarang']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?= $databarang['211149_harga']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="stok" class="col-sm-3 col-form-label">Stok</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="stok" id="stok" placeholder="Stok" value="<?= $databarang['211149_stok']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="id_supplier" class="col-sm-3 col-form-label">Supplier</label>
                                    <div class="col-sm-9">
                                        <p>Supplier : <?= $namasupplier[0]['211149_namasupplier']; ?></p>
                                        <select name="id_supplier" id="id_supplier" class="form-control select2bs4 select" required>
                                            <option disabled selected>Pilih Supplier</option>
                                            <?php foreach ($datasupplier as $ds) : ?>
                                                <option value="<?= $ds['211149_idsupplier']; ?>"><?= $ds['211149_namasupplier']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="foto" class="col-sm-3 col-form-label">Foto</label>
                                    <div class=" col-sm-9">
                                        <span class="text-sm text-danger">File harus berformat JPG, JPEG, atau PNG</span>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="foto" name="foto">
                                            <input type="hidden" class="custom-file-input" id="foto_old" name="foto_old" value="<?= $databarang['211149_foto']; ?>">
                                            <label class="custom-file-label" for="foto">Pilih File</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ket" class="col-sm-3 col-form-label">Ket</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="ket" id="ket" rows="12" placeholder="Keterangan" required><?= htmlspecialchars(str_replace("<br>", "\n", $databarang['211149_ket'])); ?></textarea>
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
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="<?= base_url('/dist/img/');
                                        echo $databarang['211149_foto'] ?>" class="product-image" alt="Product Image">
                        </div>
                    </div>
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