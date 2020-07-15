<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    
    $pasien = trim(mysqli_real_escape_string($con, $_POST['pasien']));
    $keluhan = trim(mysqli_real_escape_string($con, $_POST['keluhan']));
    $dokter = trim(mysqli_real_escape_string($con, $_POST['dokter']));
    $diagnosa = trim(mysqli_real_escape_string($con, $_POST['diagnosa']));
    $poli = trim(mysqli_real_escape_string($con, $_POST['poli']));
    $tanggal = trim(mysqli_real_escape_string($con, $_POST['tanggal']));

    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date("dmy");
    $idrm = "RM" . $pasien . "-" . $tanggal;

    mysqli_query($con, "INSERT INTO tb_rekammedis (id_rm, id_pasien, keluhan, id_dokter, diagnosa, id_poli, tgl_periksa) VALUES ('$idrm', '$pasien', '$keluhan', '$dokter', '$diagnosa', '$poli', '$tanggal')") or die (mysqli_error($con));

    $obat = $_POST['obat'];
    foreach ($obat as $obt) {
        mysqli_query($con, "INSERT INTO tb_rm_obat (id_rm, id_obat) VALUES ('$uuid', '$obt')") or die (mysqli_error($con));
    }
    echo "<script>window.location='data.php';</script>";  
}
?>