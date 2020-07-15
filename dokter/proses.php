<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

// use Ramsey\Uuid\Uuid;
// use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $id_dokter = trim(mysqli_real_escape_string($con, $_POST['id_dokter']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $jenkel = trim(mysqli_real_escape_string($con, $_POST['jenkel']));
    $spesialis = trim(mysqli_real_escape_string($con, $_POST['spesialis']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $no_telp = trim(mysqli_real_escape_string($con, $_POST['no_telp']));
    $user = trim(mysqli_real_escape_string($con, $_POST['user']));
    $pass = trim(mysqli_real_escape_string($con, $_POST['password']));
    $passhash = password_hash($pass, PASSWORD_DEFAULT);
    mysqli_query($con, "INSERT INTO tb_dokter (id_dokter, nama_dokter, jenis_kelamin, spesialis, alamat, no_telp, username, password) 
                            VALUES ('$id_dokter', '$nama', '$jenkel', '$spesialis', '$alamat', '$no_telp', '$user', '$passhash')") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";  
} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $jenkel = trim(mysqli_real_escape_string($con, $_POST['jenkel']));
    $spesialis = trim(mysqli_real_escape_string($con, $_POST['spesialis']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $no_telp = trim(mysqli_real_escape_string($con, $_POST['no_telp']));
    mysqli_query($con, "UPDATE tb_dokter SET nama_dokter = '$nama', spesialis = '$spesialis', alamat = '$alamat', no_telp = '$no_telp' WHERE id_dokter = '$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>"; 
}
?>