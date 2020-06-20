<?php
require_once "_config/config.php";
require "_assets/libs/vendor/autoload.php";

if (!isset($_SESSION['user'])) {
    echo "<script>window.location='" . base_url('auth/login.php') . "';</script>";
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Puskesmas Majasari</title>
    <!-- Bootstrap Core CSS -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="../_assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="../_assets/libs/DataTables/datatables.min.css" rel="stylesheet">
    <link rel="icon" href="<?= base_url() ?>/_assets/hospital.png">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    
</head>

<body>
    <script src="<?= base_url('_assets/js/jquery.js') ?>"></script>
    <script src="<?= base_url('_assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('_assets/libs/DataTables/datatables.min.js') ?>"></script>
    <script src="<?= base_url('_assets/libs/vendor/ckeditor/ckeditor/ckeditor.js') ?>"></script>
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href=""><span class="text-primary"><b>Puskesmas Majasari</b></span></a>
                </li>

                <li>
                    <a href="<?= base_url('dashboard') ?>"><i class="fas fa-home fa-lg"></i>   Dashboard</a>
                </li>

                <?php if ($_SESSION['level'] == 'Dokter' or $_SESSION['level'] == 'Nakes' or $_SESSION['level'] == 'Admin') { ?>
                    <li>
                        <a href="<?= base_url('pasien/data.php') ?>"><i class="fa fa-database fa-lg" aria-hidden="true"></i>   Data Pasien</a>
                    </li>
                <?php } ?>

                <?php if ($_SESSION['level'] == 'Admin') { ?>
                    <li>
                        <a href="<?= base_url('dokter/data.php') ?>"><i class="fa fa-database fa-lg" aria-hidden="true"></i>   Data Dokter</a>
                    </li>
                <?php } ?>

                <?php if ($_SESSION['level'] == 'Admin') { ?>
                    <li>
                        <a href="<?= base_url('nakes') ?>"><i class="fa fa-database fa-lg" aria-hidden="true"></i>   Data Tenaga Kesehatan</a>
                    </li>
                <?php } ?>

                <?php if ($_SESSION['level'] == 'Admin' or $_SESSION['level'] == 'Nakes') { ?>
                    <li>
                        <a href="<?= base_url('poliklinik/data.php') ?>"><i class="fa fa-database fa-lg" aria-hidden="true"></i>  Data Poliklinik</a>
                    </li>
                <?php } ?>

                <?php if ($_SESSION['level'] == 'Dokter' or $_SESSION['level'] == 'Nakes' or $_SESSION['level'] == 'Admin') { ?>
                    <li>
                        <a href="<?= base_url('obat/data.php') ?>"><i class="fa fa-database fa-lg" aria-hidden="true"></i>   Data Obat</a>
                    </li>
                <?php } ?>

                <?php if ($_SESSION['level'] == 'Dokter' or $_SESSION['level'] == 'Nakes' or $_SESSION['level'] == 'Admin') { ?>
                    <li>
                        <a href="<?= base_url('rekammedis/data.php') ?>"><i class="fas fa-book fa-lg"></i>   Rekam Medis</a>
                    </li>
                <?php } ?>

                <?php if ($_SESSION['level'] == 'Dokter' or $_SESSION['level'] == 'Nakes' or $_SESSION['level'] == 'Admin') { ?>
                    <li>
                        <a href="<?= base_url('profile') ?>"><i class="fas fa-user-md fa-lg"></i>   Profile</a>
                    </li>
                <?php } ?>

                <li>
                    <a href="<?= base_url('auth/logout.php') ?>"><i class="fas fa-sign-out-alt fa-lg"></i>  <span class="text-danger">Logout</span></a>
                </li>
            </ul>
        </div>
        <div id="page-content-wrapper">
            <div class="container-fluid">