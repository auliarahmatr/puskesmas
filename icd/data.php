<?php include_once('../_header.php'); ?>

<div class="box">
    <h1>ICD (International Classificational of Diseases)</h1>
    <h4>
        <small>Data ICD</small>
        <div class="pull-right">
            <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="generate.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Data ICD</a>
        </div>
    </h4>
    <form method="post" name="proses">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="icd">
            <thead>
                <tr>
                    <th>
                    <center>
                        <input type="checkbox" name="select_all" id="select_all" value="">
                    </center>
                    </th>
                    <th>No.</th>
                    <th>Kode ICD</th>
                    <th>Nama ICD</th>
                    <th><i class="glyphicon glyphicon-cog"></i></th>
                </tr>
            </thead> 
            <tbody>
            <?php
            $no =1;
            $sql_icd = mysqli_query($con, "SELECT * FROM tb_icd ORDER BY kode_icd") or die (mysqli_error($con));
                while($data = mysqli_fetch_array($sql_icd)) { ?>
                    <tr>
                        <td align="center">
                        <input type="checkbox" name="checked[]" class="check" value="<?=$data['kode_icd']?>">
                        </td>
                        <td><?=$no++?>.</td>
                        <td><?=$data['kode_icd']?></td>
                        <td><?=$data['nama_icd']?></td>
                        <td align="center">
                            <a href="edit.php?id=<?=$data['id_dokter']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                        </td>
                    </tr>
            <?php
                }

            ?>
            </tbody>
        </table>    
    </div>
    </form>

    <div class="box pull-right">
            <button class="btn btn-danger btn-sm" onclick="hapus()"><i class="glyphicon glyphicon-trash"></i>Hapus</button>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#icd').DataTable({
        columnDefs: [
            {
                "searchable": false,
                "orderable": false,
                "targets": [0, 4]
            }
        ],
        "order":[1, "asc"]
    });

    $('#select_all').on('click', function() {
        if(this.checked) {
            $('.check').each(function() {
                this.checked = true;
            })
         } else {
            $('.check').each(function() {
                this.checked = false;
            }) 
         }
    });

    $('.check').on('click', function() {
        if($('.check:checked').length == $('.check').length) {
            $('#select_all').prop('checked', true)
        } else {
            $('#select_all').prop('checked', false)
        }
    })
})
function hapus() {
    var conf = confirm('Hapus data?');
    if(conf) {
        document.proses.action = 'del.php';
        document.proses.submit();
    }
}
</script>
<?php include_once('../_footer.php'); ?>