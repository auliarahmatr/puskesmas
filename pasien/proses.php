<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $identitas = trim(mysqli_real_escape_string($con, $_POST['identitas']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $jenkel = trim(mysqli_real_escape_string($con, $_POST['jenkel']));
    $tanggal_lahir = trim(mysqli_real_escape_string($con, $_POST['tanggal_lahir']));
    $agama = trim(mysqli_real_escape_string($con, $_POST['agama']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $nama_kk = trim(mysqli_real_escape_string($con, $_POST['nama_kk']));
    $no_telp = trim(mysqli_real_escape_string($con, $_POST['no_telp']));
    $sql_cek_identitas = mysqli_query($con, "SELECT * FROM tb_pasien WHERE nomor_identitas = '$identitas'") or die (mysqli_error($con));
    if(mysqli_num_rows($sql_cek_identitas) > 0) {
        echo "<script>alert('Nomor Identitas sudah terdaftar!'); window.location='add.php';</script>";
    } else {
        mysqli_query($con, "INSERT INTO tb_pasien (id_pasien, nomor_identitas, nama_pasien, jenis_kelamin, tanggal_lahir, agama, alamat, nama_kk, no_telp) VALUES ('$uuid', '$identitas', '$nama', '$jenkel', '$tanggal_lahir', '$agama', '$alamat', '$nama_kk', '$no_telp')") or die (mysqli_error($con));
        echo "<script>window.location='data.php';</script>";  
    }
} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $identitas = trim(mysqli_real_escape_string($con, $_POST['identitas']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $jenkel = trim(mysqli_real_escape_string($con, $_POST['jenkel']));
    $tanggal_lahir = trim(mysqli_real_escape_string($con, $_POST['tanggal_lahir']));
    $agama = trim(mysqli_real_escape_string($con, $_POST['agama']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $nama_kk = trim(mysqli_real_escape_string($con, $_POST['nama_kk']));
    $no_telp = trim(mysqli_real_escape_string($con, $_POST['no_telp']));
    $sql_cek_identitas = mysqli_query($con, "SELECT * FROM tb_pasien WHERE nomor_identitas = '$identitas' AND id_pasien !='$id'") or die (mysqli_error($con));
    if(mysqli_num_rows($sql_cek_identitas) > 0) {
        echo "<script>alert('Nomor Identitas sudah pernah diinput!'); window.location='edit.php?id=$id';</script>";
    } else {
        mysqli_query($con, "UPDATE tb_pasien SET nomor_identitas = '$identitas', nama_pasien = '$nama', jenis_kelamin = '$jenkel', tanggal_lahir = '$tanggal_lahir', agama = '$agama', alamat = '$alamat', nama_kk = '$nama_kk', no_telp = '$no_telp' WHERE id_pasien = '$id'") or die (mysqli_error($con));
        echo "<script>window.location='data.php';</script>";  
    }
} else if(isset($_POST['import'])) {
    $file = $_FILES['file']['name'];
    $ekstensi = explode(".", $file);
    $file_name = "file-".round(microtime(true)).".".end($ekstensi);
    $sumber = $_FILES['file']['tmp_name'];
    $target_dir = "../_file/";
    $target_file = $target_dir.$file_name;
    move_uploaded_file($sumber, $target_file);

    $objct = PHPExcel_IOFactory::load($target_file);
    $all_data = $objct->getActiveSheet()->toArray(null, true, true, true);

    $sql = "INSERT INTO tb_pasien (id_pasien, nomor_identitas, nama_pasien, jenis_kelamin, tanggal_lahir, agama, alamat, nama_kk, no_telp) VALUES";
    for ($i=3; $i <= count($all_data); $i++) { 
        $uuid = Uuid::uuid4()->toString();
        $identitas = $all_data[$i]['A'];
        $nama = $all_data[$i]['B'];
        $jenkel = $all_data[$i]['C'];
        $tanggal_lahir = $all_data[$i]['D'];
        $agama = $all_data[$i]['E'];
        $alamat = $all_data[$i]['F'];
        $nama_kk = $all_data[$i]['G'];
        $no_telp = $all_data[$i]['H'];
        $sql .= "('$uuid', '$identitas', '$nama', '$jenkel', '$tanggal_lahir', '$agama', '$alamat', '$nama_kk', '$no_telp'),";
    }
    $sql = substr($sql, 0, -1);
    mysqli_query($con, $sql) or die (mysqli_error($con));

    unlink($target_file);
    echo "<script>window.location='data.php';</script>"; 
}
?>