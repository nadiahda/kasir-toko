<aside class="main-sidebar sidebar-dark-primary elevation-4 bg-navy color-pallete">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <li class="fas fa-shopping-cart ml-3"></li>
        <span class="brand-text font-weight-light ml-3" style="font-family: monospace;">
            Nadia Store
        </span>
    </a>

    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('AdminLTE') ?>/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= session()->get('nama') ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('Admin') ?>" class="nav-link <?= $menu == 'dashboard' ? 'active bg-secondary' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Penjualan') ?>" class="nav-link">
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p>
                            Penjualan

                        </p>
                    </a>
                </li>



                <li class="nav-item <?= $menu == 'masterdata' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $menu == 'masterdata' ? 'active bg-secondary' : '' ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Master Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Produk') ?>" class="nav-link <?= $submenu == 'produk' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Produk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Kategori') ?>" class="nav-link <?= $submenu == 'kategori' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Satuan') ?>" class="nav-link <?= $submenu == 'satuan' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Satuan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('User') ?>" class="nav-link <?= $submenu == 'user' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item <?= $menu == 'laporan' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $menu == 'laporan' ? 'active bg-secondary' : '' ?>">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Laporan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Laporan/LaporanHarian') ?>" class="nav-link <?= $submenu == 'laporan-harian' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Harian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Laporan/LaporanBulanan') ?>" class="nav-link <?= $submenu == 'laporan-bulanan' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Bulanan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Laporan/LaporanTahunan') ?>" class="nav-link <?= $submenu == 'laporan-tahunan' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Tahunan</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Admin/About') ?>" class="nav-link <?= $menu == 'about' ? 'active bg-secondary' : '' ?>">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            About

                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>