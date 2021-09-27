<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/fontawesome.css') ?>">
</head>

<body>
    <!-- As a heading -->
    <nav class="navbar navbar-dark bg-info">
        <span class="navbar-brand mb-0 h1">Sistem Inventarisir Barang</span>
        <ul class="navbar-nav ml-auto">
            <?php if ($this->session->userdata('username')) { ?>
                <li class="nav-item">
                    <a href="<?= base_url() ?>login/logout" class="btn border-primary bg-light">Logout</a>
                </li>
            <?php } ?>
        </ul>
    </nav>