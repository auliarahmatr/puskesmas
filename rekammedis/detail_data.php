<?php include_once('../_header.php'); ?>

<?php
$id = $_GET['id'];
$_SESSION['id'] = $id;

$queryrm = mysqli_query($con, "SELECT * FROM tb_rekammedis INNER JOIN tb_pasien ON tb_rekammedis.id_pasien = tb_pasien.id_pasien AND tb_pasien.id_pasien = '$id' INNER JOIN tb_dokter ON tb_rekammedis.id_dokter = tb_dokter.id_dokter INNER JOIN tb_poliklinik ON tb_rekammedis.id_poli = tb_poliklinik.id_poli");

$query = mysqli_query ($con, "SELECT * FROM tb_pasien WHERE id_pasien = '$id'");

$row = mysqli_fetch_assoc($query);
?>

<div class="box">
    <h1>DETAIL REKAM MEDIS</h1>
    <h4>
        <small>Data Detail Rekam Medis</small>
        <div class="pull-right">
            <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            <?php if ($_SESSION['level'] == 'Admin' or $_SESSION['level'] == 'Dokter') { ?>
            <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
            <?php } ?>
        </div>
    </h4>
    
       <div class="row container">
        <div class="col-lg-3">
        	Nama
        </div>
        <div class="col-lg-1">:</div>
        <div class="col-lg-4">
          <p><?= $row['nama_pasien'] ?></p>
        </div>
      </div>
      
      <div class="row container">
        <div class="col-lg-3">
        	No Identitas
        </div>
        <div class="col-lg-1">:</div>
        <div class="col-lg-4">
          <p><?= $row['nomor_identitas'] ?></p>
        </div>
      </div><br>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="rekammedis">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal Periksa</th>
                    <th>Nama Dokter</th>
                    <th>Poliklinik</th>
                    <th><i class="glyphicon glyphicon-cog"></i></th>
                </tr>
            </thead> 
            <tbody>
                <?php
                $no =1;
                while ($data = mysqli_fetch_array($queryrm)) {
                ?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$data['tgl_periksa']?></td>
                        <td><?=$data['nama_dokter']?></td>
                        <td><?=$data['nama_poli']?></td>
                        <td>
                        <?php if ($_SESSION['level'] == 'Admin') { ?>
                        <a href="del.php?id=<?=$data['id_rm']?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin akan menghapus data?')"><i class="glyphicon glyphicon-trash"></i></a>
                        <?php } ?>
                        <a href="detail_rm.php?id=<?= $data['id_rm'] ?>" class="btn btn-info btn-xs">
                                <i class="glyphicon glyphicon-info-sign"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                } 
                ?>
            </tbody>
        </table>    
    </div>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#rekammedis').DataTable({
            columnDefs: [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": 4
                }
            ]
        });
    });
    </script>
</div>

<?php include_once('../_footer.php'); ?>