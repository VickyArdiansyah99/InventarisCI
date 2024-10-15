<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="<?= base_url('home') ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <?php if (session()->get('level') == 0) : ?>
                <li>
                    <a href="<?= base_url('users') ?>">
                        <i class="fa fa-group"></i> <span>Manajemen User</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('lokasi') ?>">
                        <i class="fa fa-map-marker"></i> <span>Manajemen Lokasi</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('barang') ?>">
                        <i class="fa fa-cubes"></i> <span>Inventaris</span>
                    </a>
                </li>
            <?php elseif (session()->get('level') == 1) : ?>
                <li>
                    <a href="<?= base_url('kelolausulan') ?>">
                        <i class="fa fa-cube"></i> <span>Kelola Usulan</span>
                    </a>
                </li>
            <?php elseif (session()->get('level') == 2) : ?>
                <li>
                    <a href="<?= base_url('barang') ?>">
                        <i class="fa fa-cubes"></i> <span>Inventaris</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('usulanbarang') ?>">
                        <i class="fa fa-cube"></i> <span>Usulan Barang</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container">
        <!-- <section class="content-header">
        </section> -->
    </div>

    <!-- Main content -->
    <section class="content">