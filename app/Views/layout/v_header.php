<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="https://pmb.amikpgrikebumen.ac.id/" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">
                    <img src="<?= base_url() ?>/img/amik.png" alt="Mini Logo" style="height: 50px;">
                </span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">
                    <img src="<?= base_url() ?>/img/amik.png" alt="Logo" style="height: 30px; margin-right: 10px;">
                    <b>AMIK PGRI</b> Kebumen
                </span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url('img/foto/' . session()->get('foto')) ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= session()->get('nama') ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?= base_url('img/foto/' . session()->get('foto')) ?>" class="img-circle" alt="User Image">

                                    <p>
                                        <?= session()->get('nama') ?> - <?php if (session()->get('level') == 1) {
                                                                            echo 'Admin';
                                                                        } else {
                                                                            echo 'User';
                                                                        } ?>
                                        <small><?= date('d M Y') ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <!-- <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div> -->
                                    <div class="text-center">
                                        <a href="<?= base_url('auth/logout') ?>" class="btn btn-default btn-flat fa fa-sign-out"> Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->