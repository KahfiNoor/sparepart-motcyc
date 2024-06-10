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
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Data Barang</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Data Transaksi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Data Supplier</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Data User</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                    <a href="#" class="btn btn-success my-3" id="cetak" onclick="cetakBarang()"><i class="fas fa-print"></i> Cetak</a>
                                    <a href="<?= base_url('laporan/barangPdf'); ?>" target="_blank" class="btn btn-primary my-3" id="pdf"><i class="fas fa-download"></i> PDF</a>
                                    
                                    <div id="data-content">
                                        <!-- Brand Logo -->
                                        <h1 class="logo" id="logo">
                                            <span class="logo font-weight-bold"><span class="logo text-warning">Spare</span>Part</span>
                                        </h1>
                                        <p id="title-data" class="title-barang font-weight-bold"><?= $titleData['barang'] ?></p>
                                        <table id="tabelData" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama Barang</th>
                                                    <th>Harga</th>
                                                    <th>Stok</th>
                                                    <th>Supplier</th>
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
                                                        <td><?= $ds['211149_namasupplier']; ?></td>
                                                    </tr>
                                                    <script id="javascript-code">
                                                        var harga<?= $no ?> = <?= $ds['211149_harga']; ?>;

                                                        var formatHarga<?= $no ?> = 'Rp. ' + harga<?= $no ?>.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

                                                        document.getElementById('harga<?= $no ?>').innerText = formatHarga<?= $no ?>;
                                                    </script>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <script>
                                        function cetakBarang() {
                                            window.print();
                                        }
                                    </script>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                    <a href="#" class="btn btn-success my-3" id="cetak" onclick="cetakTabel()"><i class="fas fa-print"></i> Cetak</a>
                                    <a href="<?= base_url('laporan/transaksiPdf'); ?>" target="_blank" class="btn btn-primary my-3" id="pdf"><i class="fas fa-download"></i> PDF</a>
                                    <style>
                                        #logo,
                                        #title-data {
                                            display: none;
                                        }

                                        @media print {
                                            body * {
                                                visibility: hidden;
                                                /* margin: 20mm 20mm 20mm 20mm; */
                                            }

                                            #data-content,
                                            #data-content * {
                                                visibility: visible;
                                            }

                                            #logo {
                                                top: 0;
                                                display: block;
                                                position: absolute;
                                                margin: 0;
                                                padding: 0;
                                                left: -15px;
                                            }

                                            #title-data {
                                                position: fixed;
                                                top: 80px;
                                                /* Sesuaikan dengan posisi yang diinginkan */
                                                display: block;
                                                break-inside: auto;
                                                margin: 0;
                                                padding: 0;
                                                left: 0;
                                            }

                                            #tabelData,
                                            #tabelData * {
                                                visibility: visible;
                                            }

                                            #tabelData {
                                                position: fixed;
                                                left: 0px;
                                                top: 120px;
                                                /* margin-bottom: 50px; */
                                                page-break-inside: avoid;
                                                /* Avoid page breaks inside table rows */
                                                break-inside: avoid;
                                                /* Additional rule for some browsers */
                                                page-break-inside: avoid;
                                                /* Avoid page breaks inside table rows */
                                                break-inside: avoid;
                                                /* Additional rule for some browsers */
                                            }
                                        }
                                    </style>
                                    <div id="data-content">
                                        <!-- Brand Logo -->
                                        <h3 class="logo" id="logo">
                                            <span class="logo font-weight-bold"><span class="logo text-warning">Spare</span>Part</span>
                                        </h3>
                                        <p id="title-data" class="title-barang font-weight-bold"><?= $titleData['transaksi'] ?></p>
                                        <table id="tabelData" class="table table-bordered table-hover">
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
                                            <tfoot>
                                                <tr>
                                                    <th colspan="7">Total Pendapatan</th>
                                                    <th colspan="3" id="total_pendapatan"></th>
                                                </tr>
                                                <script>
                                                    var total_hasil = <?= $transaksitotal[0]['total_pendapatan']; ?>;

                                                    var total_pendapatan = 'Rp. ' + total_hasil.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

                                                    document.getElementById('total_pendapatan').innerText = total_pendapatan;
                                                </script>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <script>
                                        function cetakTabel() {
                                            window.print();
                                        }
                                    </script>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                                    <a href="#" class="btn btn-success my-3" id="cetak" onclick="cetakTabel()"><i class="fas fa-print"></i> Cetak</a>
                                    <a href="<?= base_url('laporan/supplierPdf'); ?>" target="_blank" class="btn btn-primary my-3" id="pdf"><i class="fas fa-download"></i> PDF</a>
                                    
                                    <div id="data-content">
                                        <!-- Brand Logo -->
                                        <h1 class="logo" id="logo">
                                            <span class="logo font-weight-bold"><span class="logo text-warning">Spare</span>Part</span>
                                        </h1>
                                        <p id="title-data" class="title-barang font-weight-bold"><?= $titleData['supplier'] ?></p>
                                        <table id="tabelData" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama Supplier</th>
                                                    <th>No. Telp</th>
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
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <script>
                                        function cetakTabel() {
                                            window.print();
                                        }
                                    </script>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                                    <a href="#" class="btn btn-success my-3" id="cetak" onclick="cetakTabel()"><i class="fas fa-print"></i> Cetak</a>
                                    <a href="<?= base_url('laporan/userPdf'); ?>" target="_blank" class="btn btn-primary my-3" id="pdf"><i class="fas fa-download"></i> PDF</a>
                                    
                                    <div id="data-content">
                                        <!-- Brand Logo -->
                                        <h1 class="logo" id="logo">
                                            <span class="logo font-weight-bold"><span class="logo text-warning">Spare</span>Part</span>
                                        </h1>
                                        <p id="title-data" class="title-barang font-weight-bold"><?= $titleData['user'] ?></p>
                                        <table id="tabelData" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama User</th>
                                                    <th>No. Telp</th>
                                                    <th>Level</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($datauser as $ds) :
                                                ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $ds['211149_nama']; ?></td>
                                                        <td><?= $ds['211149_notelp']; ?></td>
                                                        <td><?= $ds['211149_level']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <script>
                                        function cetakTabel() {
                                            window.print();
                                        }
                                    </script>
                                </div>
                            </div>
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