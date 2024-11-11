 <!-- ========== Left Sidebar Start ========== -->
 <div class="vertical-menu">

<div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title" data-key="t-menu">Menu</li>

            <li>
                <a href="<?= base_url('Admin'); ?>">
                    <i data-feather="home"></i>
                    <span data-key="t-dashboard">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="<?= base_url('Admin/akun'); ?>">
                    <i data-feather="users"></i>
                    <span data-key="t-akun">Akun</span>
                </a>
            </li>

            <li>
                <a href="<?= base_url('Admin/kategori'); ?>">
                    <i data-feather="list"></i>
                    <span data-key="t-kategori">Kategori</span>
                </a>
            </li>

            
        </ul>

        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title" data-key="t-menu">Transaksi</li>

            <li>
                <a href="<?= base_url('Admin/transaksi'); ?>">
                    <i data-feather="refresh-cw"></i>
                    <span data-key="t-transaksi">Transaksi</span>
                </a>
            </li>

            <li>
                <a href="<?= base_url('Admin/transfer'); ?>">
                    <i data-feather="repeat"></i>
                    <span data-key="t-transaksi">Transfer Antar Akun</span>
                </a>
            </li>


        </ul>

        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title" data-key="t-menu">Laporan</li>

            <li>
                <a href="<?= base_url('Admin/laporanTransaksi'); ?>">
                    <i data-feather="file-text"></i>
                    <span data-key="t-laporantransaksi">Laporan Transaksi</span>
                </a>
            </li>

            <li>
                <a href="<?= base_url('Admin/laporanSaldo'); ?>">
                    <i data-feather="file"></i>
                    <span data-key="t-laporansaldo">Laporan Saldo</span>
                </a>
            </li>

        </ul>

    </div>
    <!-- Sidebar -->
</div>
</div>
<!-- Left Sidebar End -->