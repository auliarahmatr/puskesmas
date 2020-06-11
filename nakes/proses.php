<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $jenkel = trim(mysqli_real_escape_string($con, $_POST['jenis_kelamin']));
    $jabatan = trim(mysqli_real_escape_string($con, $_POST['jabatan']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $no_telp = trim(mysqli_real_escape_string($con, $_POST['no_telp']));
    $user = trim(mysqli_real_escape_string($con, $_POST['username']));
    $pass = trim(mysqli_real_escape_string($con, $_POST['password']));
    $passhash = password_hash($pass, PASSWORD_DEFAULT);
    mysqli_query($con, "INSERT INTO tb_nakes (id_nakes, nama_nakes, jenis_kelamin, jabatan, alamat, no_telp, username, password) 
                            VALUES ('$uuid', '$nama', '$jenkel', '$jabatan', '$alamat', '$no_telp', '$user', '$passhash')") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";  
} else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $jenkel = trim(mysqli_real_escape_string($con, $_POST['jenis_kelamin']));
    $jabatan = trim(mysqli_real_escape_string($con, $_POST['jabatan']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $no_telp = trim(mysqli_real_escape_string($con, $_POST['no_telp']));
    // $user = trim(mysqli_real_escape_string($con, $_POST['username']));
    mysqli_query($con, "UPDATE tb_nakes SET nama_nakes = '$nama', jenis_kelamin = '$jenkel', jabatan = '$jabatan', alamat = '$alamat', no_telp = '$no_telp' WHERE id_nakes = '$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>"; 
}
?>