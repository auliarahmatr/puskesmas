<?php include_once('../_header.php'); ?>

<?php
    $query = mysqli_query($con, "SELECT * FROM tb_pasien");
?>
<div class="box">
    <h1>REKAM MEDIS</h1>
    <h4>
        <small>Data Rekam Medis</small>
        <div class="pull-right">
            <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            <?php if ($_SESSION['level'] == 'Admin' or $_SESSION['level'] == 'Dokter') { ?>
            <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Data Rekam Medis</a>
            <?php } ?>
        </div>
    </h4>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="rekam_medis">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Id Pasien</th>
                    <th>Nama Pasien</th>
                    <th>Tanggal Lahir</th>
                    <th><i class="glyphicon glyphicon-cog"></i></th>
                </tr>
            </thead> 
            <tbody>
                <?php
                $no =1;
                while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$data['id_pasien']?></td>
                        <td><?=$data['nama_pasien']?></td>
                        <td><?=$data['tanggal_lahir']?></td>
                        <td>
                            <a href="detail_data.php?id=<?= $data['id_pasien'] ?>" class="btn btn-info btn-xs">
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
</div>

<script>
$(document).ready(function() {
    $('#rekam_medis').DataTable({
        columnDefs: [
            {
                "searchable": false,
                "orderable": false,
                "targets": 4,
            }
        ]
    });
})
</script>

<?php include_once('../_footer.php'); ?>