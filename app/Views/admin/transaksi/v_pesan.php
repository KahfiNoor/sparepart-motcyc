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
                    <div class="mb-4">
                        <a href="<?= base_url("transaksi") ?>" class="btn btn-warning" id="kembali"> <i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="col-8">
                    <!-- Horizontal Form -->
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Masukkan Jumlah</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="POST" action="<?= base_url('transaksi/bayar') ?>">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nama_barang" class="col-sm-3 col-form-label">Nama Barang</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" name="id_barang" id="id_barang" value="<?= $databarang['211149_idbarang']; ?>">
                                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?= $databarang['211149_namabarang']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?= $databarang['211149_harga']; ?>" disabled>
                                        <input type="hidden" name="harga" id="harga" value="<?= $databarang['211149_harga']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jumlah" class="col-sm-3 col-form-label">Masukkan Jumlah Barang</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" name="stok" id="stok" value="<?= $databarang['211149_stok']; ?>">
                                        <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="subtotal" class="col-sm-3 col-form-label">Total</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="subtotal" id="subtotal" placeholder="Subtotal" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dibayar" class="col-sm-3 col-form-label">Masukkan Nominal Uang</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="dibayar" id="dibayar" placeholder="Nominal">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kembalian" class="col-sm-3 col-form-label">Kembalian</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="kembalian" id="kembalian" placeholder="Kembalian" disabled>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="btnBayar" disabled>Bayar</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                // Cek stok barang saat jumlah pesanan berubah
                                $("#jumlah").on("change", function() {
                                    updateStok();
                                });

                                // Update kembalian saat dibayar berubah
                                $("#dibayar").on("input", function() {
                                    updateKembalian();
                                    updateButtonState();
                                });

                                function updateSubtotal() {
                                    var harga = parseInt($('#harga').val()) || 0;
                                    var jumlah = parseInt($('#jumlah').val()) || 0;

                                    if (!isNaN(harga) && !isNaN(jumlah)) {
                                        var subtotal = harga * jumlah;
                                        $('#subtotal').val(subtotal);
                                        updateButtonState(); // Update status tombol setelah menghitung subtotal
                                    } else {
                                        $('#subtotal').val("0");
                                        updateButtonState(); // Update status tombol jika terjadi kesalahan
                                    }
                                }

                                function updateKembalian() {
                                    var subtotal = parseInt($('#subtotal').val()) || 0;
                                    var dibayar = parseInt($('#dibayar').val()) || 0;

                                    if (!isNaN(subtotal) && !isNaN(dibayar)) {
                                        var kembalian = dibayar - subtotal;
                                        $('#kembalian').val(kembalian);
                                    } else {
                                        $('#kembalian').val("0");
                                    }
                                }

                                function updateStok() {
                                    var stok = parseInt($('#stok').val()) || 0;
                                    var jumlah = parseInt($('#jumlah').val()) || 0;

                                    if (!isNaN(stok) && !isNaN(jumlah)) {
                                        if (jumlah > stok) {
                                            // Tampilkan pesan peringatan menggunakan SweetAlert
                                            if ($('#bayar').attr('data-swal-fired') == null) {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Jumlah pesanan melebihi stok!'
                                                });
                                                $('#bayar').attr('data-swal-fired', 'true');
                                            }

                                            // Nonaktifkan tombol bayar dan ubah teksnya
                                            $('#bayar').prop('disabled', true);
                                            $('#bayar').text('Jumlah pesanan melebihi stok');
                                        } else {
                                            // Update subtotal dan status tombol
                                            updateSubtotal();
                                            updateButtonState();
                                        }
                                    } else {
                                        // Nonaktifkan tombol bayar
                                        $('#bayar').prop('disabled', true);
                                    }
                                }

                                function updateButtonState() {
                                    var stok = parseInt($('#stok').val()) || 0;
                                    var jumlah = parseInt($('#jumlah').val()) || 0;

                                    if (!isNaN(stok) && !isNaN(jumlah)) {
                                        if (jumlah > stok) {
                                            $('#bayar').prop('disabled', true);
                                            alert('Jumlah pesanan melebihi stok!');
                                        } else {
                                            var nominal = parseInt($('#dibayar').val()) || 0;
                                            var subtotal = parseInt($('#subtotal').val()) || 0;

                                            // Nonaktifkan tombol jika nominal kurang dari subtotal
                                            $('#btnBayar').prop('disabled', nominal < subtotal);
                                        }
                                    } else {
                                        $('#bayar').prop('disabled', true);
                                    }
                                }
                            });
                        </script>
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