<?php include_once('../_header.php'); ?>

<?php
$id = $_GET['id'];

$queryrm = mysqli_query($con, "SELECT * FROM tb_rekammedis INNER JOIN tb_pasien ON tb_rekammedis.id_pasien = tb_pasien.id_pasien INNER JOIN tb_dokter ON tb_rekammedis.id_dokter = tb_dokter.id_dokter INNER JOIN tb_poliklinik ON tb_rekammedis.id_poli = tb_poliklinik.id_poli WHERE tb_rekammedis.id_rm = '$id'");

$querypasien = mysqli_query($con, "SELECT * FROM tb_pasien WHERE id_pasien = '$id'");

$queryobat = mysqli_query($con, "SELECT tb_rm_obat.id_rm, tb_obat.id_obat, tb_obat.nama_obat, tb_obat.ket_obat FROM `tb_rm_obat` JOIN tb_obat ON tb_rm_obat.id_obat = tb_obat.id_obat WHERE `id_rm` = '$id'");
// $sql_obat =  mysqli_query($con, "SELECT * FROM tb_rm_obat INNER JOIN tb_obat ON tb_rm_obat.id_obat = tb_obat.id_obat WHERE tb_rekammedis.id_rm = '$id'"); 
$row = mysqli_fetch_assoc($queryrm);
$keluhan = htmlspecialchars($row['keluhan']);
// $data = mysqli_fetch_assoc($queryobat);
?>

<div class="box">
  <h1>DETAIL REKAM MEDIS</h1>
  <h4>
    <small>Data Detail Rekam Medis</small>
    <div class="pull-right">
      <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
      <?php if ($_SESSION['level'] == 'Admin' or $_SESSION['level'] == 'Dokter') { ?>
        <a href="detail_data.php?id=<?= $_SESSION['id'] ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
      <?php } ?>
    </div>
  </h4>
  <br>
  <form>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Tanggal</label>
      <div class="col-sm-1">:</div>
      <div class="col-md-0">
        <input type="text" readonly style="border: 0;" class="form-control-plaintext" value="<?= $row['tgl_periksa'] ?>">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Nama Pasien</label>
      <div class="col-sm-1">:</div>
      <div class="col-md-0">
        <input type="text" readonly style="border: 0;" class="form-control-plaintext" value="<?= $row['nama_pasien'] ?>">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Keluhan</label>
      <div class="col-sm-1">:</div>
      <div class="col-md-0">
        <?php
        echo $row['keluhan']
        ?>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Diagnosa</label>
      <div class="col-sm-1">:</div>
      <div class="col-md-0">
        <input type="text" readonly style="border: 0;" class="form-control-plaintext" value="<?= $row['diagnosa'] ?>">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Nama Dokter</label>
      <div class="col-sm-1">:</div>
      <div class="col-md-0">
        <input type="text" readonly style="border: 0;" class="form-control-plaintext" value="<?= $row['nama_dokter'] ?>">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Poliklinik</label>
      <div class="col-sm-1">:</div>
      <div class="col-md-0">
        <input type="text" readonly style="border: 0;" class="form-control-plaintext" value="<?= $row['nama_poli'] ?>">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Obat</label>
      <div class="col-sm-1">:</div>
      <div class="col-md-0">
        <?php foreach ($queryobat as $data) : ?>
          <input type="text" readonly style="border: 0;" class="form-control-plaintext" value="- <?= $data['nama_obat'] ?>">
        <?php endforeach; ?>
      </div>
    </div>

  </form>

  <a href="print_rm.php?id=<?= $id ?>">
    <button class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-print"></i></button>
  </a>

  <!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#rekammedis').DataTable({
            columnDefs: [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": 8
                }
            ]
        });
    });
    </script> -->
</div>

<?php include_once('../_footer.php'); ?>