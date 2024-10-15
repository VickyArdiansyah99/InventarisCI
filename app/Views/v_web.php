<?= $this->include('layout/v_head') ?>

<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="<?= base_url() ?>/template/index2.html" class="navbar-brand"><b>Inventaris</b></a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="<?= base_url('auth/login') ?>" class="fa fa-sign-in"> Login</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-custom-menu -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </header>
        <!-- Full Width Column -->
        <div class="content-wrapper">
            <div class="container">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-center">
                                <h1><b>Sistem Informasi Manajemen Inventaris Kampus</b></h1>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <img class="img-responsive pad" src="<?= base_url('img/bg.png') ?>" alt="Photo">
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <?= $this->include('layout/v_footer') ?>
</body>