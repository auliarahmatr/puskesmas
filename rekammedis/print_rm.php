<?php

$host       = "localhost";
$user       = "root";
$password   = "";
$database   = "puskesmas";

$koneksi    = mysqli_connect($host, $user, $password, $database);

$id = $_GET['id'];

// $queryobat = mysqli_query($con, "SELECT tb_rm_obat.id_rm, tb_obat.id_obat, tb_obat.nama_obat, tb_obat.ket_obat FROM `tb_rm_obat` JOIN tb_obat ON tb_rm_obat.id_obat = tb_obat.id_obat WHERE `id_rm` = '$id'");

// $row = mysqli_fetch_assoc($queryrm);

require_once '../dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$queryrm = mysqli_query($koneksi, "SELECT * FROM tb_rekammedis INNER JOIN tb_pasien ON tb_rekammedis.id_pasien = tb_pasien.id_pasien INNER JOIN tb_dokter ON tb_rekammedis.id_dokter = tb_dokter.id_dokter INNER JOIN tb_poliklinik ON tb_rekammedis.id_poli = tb_poliklinik.id_poli WHERE tb_rekammedis.id_rm = '$id'");
$queryobat = mysqli_query($koneksi, "SELECT tb_rm_obat.id_rm, tb_obat.id_obat, tb_obat.nama_obat, tb_obat.ket_obat FROM `tb_rm_obat` JOIN tb_obat ON tb_rm_obat.id_obat = tb_obat.id_obat WHERE `id_rm` = '$id'");
$row = mysqli_fetch_assoc($queryrm);
$keluhan = htmlspecialchars($row['keluhan']);

$html = '<!DOCTYPE html>
    <html>
    <head>
        <title>Detail Rekam Medis</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body>

    <center>
        <h1>Puskesmas Majasari</h1>
        <h4>Jl. Stadion Badak No.29, Saruni, Kec. Majasari</h4>
        <h2>DETAIL REKAM MEDIS</h2>
        <hr style="border:0.5px solid black; margin: 20px 5px 15px 5px;"><br>
    </center>

    <div style="margin-left: 20px; font-size: 20px; color: black;">
        <a style="margin-left: 20px; color: black;">Tanggal</a>
        <a style="margin-left: 20px; color: black;">:</a>
        <a style="margin-left: 50px; color: black;">' . $row['tgl_periksa'] . '</a>
    </div>

    <div style="margin-left: 20px; font-size: 20px;">
        <a style="color: black;">Nama Pasien : </a><a style="color: black;">' . $row['nama_pasien'] . '</a>
    </div>

    <div style="margin-left: 20px; font-size: 20px;">
        <a style="color: black;">Keluhan : </a>
        <input type="text" readonly style="" class="form-control-plaintext" value="' . $keluhan . '">
    </div>
    
    <div style="margin-left: 20px; font-size: 20px;">
        <a style="color: black;">Diagnosa : </a><a style="color: black;">' . $row['diagnosa'] . '</a>
    </div>

    <div style="margin-left: 20px; font-size: 20px;">
        <a style="color: black;">Nama Dokter : </a><a style="color: black;">' . $row['nama_dokter'] . '</a>
    </div>

    <div style="margin-left: 20px; font-size: 20px;">
        <a style="color: black;">Poliklinik : </a><a style="color: black;">' . $row['nama_poli'] . '</a>
    </div>
    
    <div style="margin-left: 20px; font-size: 20px;">
        <a style="color: black;">Obat : </a><a style="color: black;">';

while ($data = mysqli_fetch_array($queryobat)) {
    $html .=
        $data['nama_obat'] . ", ";
}

$html .= '</a></div> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    </body>
    </html>';

$dompdf->loadHtml($html);

// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');

// Rendering dari HTML Ke PDF
$dompdf->render();

// Melakukan output file Pdf
$dompdf->stream('Rekam Medis - ' . $row['nama_pasien'] . ' - ' .  $row['tgl_periksa'] . '.pdf');
