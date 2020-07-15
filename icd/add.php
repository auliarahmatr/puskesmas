<?php include_once('../_header.php'); ?>

<div class="box">
    <h1>ICD (International Classificationl of Diseases)</h1>
    <h4>
        <small>Tambah Data ICD</small>
        <div class="pull-right">
            <a href="data.php" class="btn btn-info btn-xs">Data</a>
            <a href="generate.php" class="btn btn-primary btn-xs">Tambah Data Lagi</a>
        </div>
    </h4>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <form action="proses.php" method="post">
                <input type="hidden" name="total" value="<?=@$_POST['count_add']?>">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Kode ICD</th>
                        <th>Nama ICD</th>
                    </tr>
                    <?php
                    for ($i=1; $i<=$_POST['count_add']; $i++) { ?>
                        <tr>
                            <td><?=$i?></td>
                            <td>
                                <input type="text" name="kode_icd-<?=$i?>" class="form-control" required >
                            </td>
                            <td>
                                <input type="text" name="nama_icd-<?=$i?>" class="form-control" required >
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                <div class="form-group pull-right">
                    <input type="submit" name="add" value="Simpan Semua" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once('../_footer.php'); ?>