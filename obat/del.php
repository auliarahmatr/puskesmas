<?php
require_once "../_config/config.php";

$sql = mysqli_query($con, "DELETE FROM tb_obat WHERE id_obat = '$_GET[id]'") or die (mysqli_error($con));
if($sql) {
    echo "<script>alert('Data berhasil dihapus'); window.location='data.php';</script>";
} else {
    echo "<script>alert('Gagal hapus data'); window.location='data.php'; </script>";
}
?>