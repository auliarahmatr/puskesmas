<?php include_once('../_header.php'); ?>

<div class="box">
    <h1>OBAT <i class="fas fa-pills"></i></h1>
    <h4>
        <small>Data Obat</small>
        <div class="pull-right">
        <?php if ($_SESSION['level'] == 'Admin') { ?>
            <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Data Obat</a>
        <?php } ?>
        </div>
    </h4>
    <form method="post" name="proses">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="obat">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Obat</th>
                    <th>Keterangan</th>
                    <th><?php if ($_SESSION['level'] == 'Admin') { ?><center><i class="glyphicon glyphicon-cog"></i></center><?php } ?></th>
                </tr>
            </thead> 
            <tbody>
            <?php
            $no =1;
            $sql_obat = mysqli_query($con, "SELECT * FROM tb_obat ORDER BY nama_obat ASC") or die (mysqli_error($con));
                while($data = mysqli_fetch_array($sql_obat)) { ?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$data['nama_obat']?></td>
                        <td><?=$data['ket_obat']?></td>
                        <td align="center">
                        <?php if ($_SESSION['level'] == 'Admin') { ?>
                            <a href="edit.php?id=<?=$data['id_obat']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="del.php?id=<?=$data['id_obat']?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                        <?php } ?>
                        </td>
                    </tr>
            <?php
                }

            ?>
            </tbody>
        </table>    
    </div>
    </form>

    <!-- <div class="box pull-right">
            <button class="btn btn-danger btn-sm" onclick="hapus()"><i class="glyphicon glyphicon-trash"></i>Hapus</button>
    </div> -->
</div>

<script>
$(document).ready(function() {
    $('#obat').DataTable({
        "processing": true,
        dom : 'Bfrtip',
        buttons : [
                {
                    extend : 'pdf',
                    oriented : 'Landscape',
                    pageSize : 'A4',
                    title : 'Data Obat Puskesmas Majasari',
                    download : 'open'
                },
                'csv', 'excel', 'print', 'copy'
            ],
        columnDefs: [
            {
                "searchable": false,
                "orderable": false,
                "targets": 3,
            }
        ]
    });
})
</script>
<?php include_once('../_footer.php'); ?>
