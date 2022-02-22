<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url() ?>" class="nav-link">Dashboard</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
            <a class="nav-link text-success" href="<?= base_url('profile') ?>">
                <i class="fas fa-user"></i><?= $this->session->userdata['nama'] ?>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link text-danger" href="<?= base_url('login/logout') ?>">
                <i class="fas fa-sign-out-alt"></i>Logout
            </a>
        </li>

    </ul>

</nav>
<!-- /.navbar -->