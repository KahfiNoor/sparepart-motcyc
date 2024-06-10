<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('home'); ?>" class="brand-link">
        <img src="<?= base_url('/'); ?>dist/img/default.png" alt="Sparepart Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold"><span class="text-warning">Spare</span>Part</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#"><b><?=session()->get('nama')?></b><br><span class="badge badge-primary"><?=session()->get('level')?></span></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item user-panel">
                    <a href="<?= base_url("/home"); ?>" class="nav-link <?= $menu == 'home' ? 'active' : ''?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">Data</li>
                <li class="nav-item">
                    <a href="<?= base_url("/barang"); ?>" class="nav-link <?= $menu == 'barang' ? 'active' : ''?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Data Barang
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url("/supplier"); ?>" class="nav-link <?= $menu == 'supplier' ? 'active' : ''?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Supplier
                        </p>
                    </a>
                </li>
                <?php if (session()->get('level') == "Owner") { ?>
                    <li class="nav-item user-panel">
                    <a href="<?= base_url("/user"); ?>" class="nav-link <?= $menu == 'user' ? 'active' : ''?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Data User
                        </p>
                    </a>
                </li>
                <?php } ?>
                <li class="nav-header">Transaksi</li>
                <li class="nav-item">
                    <a href="<?= base_url("/transaksi"); ?>" class="nav-link <?= $menu == 'transaksi' ? 'active' : ''?>">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Transaksi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url("/transaksi/riwayat"); ?>" class="nav-link <?= $menu == 'riwayat' ? 'active' : ''?>">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Riwayat Transaksi
                        </p>
                    </a>
                </li>
                <?php if (session()->get('level') == "Owner") { ?>
                <li class="nav-item user-panel">
                    <a href="<?= base_url("/laporan"); ?>" class="nav-link <?= $menu == 'laporan' ? 'active' : ''?>">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>