<?php include_once('../_header.php'); ?>

<div class="box">
    <h1>Rekam Medis</h1>
    <h4>
        <small>Tambah Data Obat</small>
    </h4>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <form action="proses.php" method="post">
                <input type="hidden" name="total" value="<?=@$_POST['jumlahobat']?>">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Obat</th>
                        <th>Kuantitas</th>
                        <th>Dosis</th>
                    </tr>
                    <?php
                    for ($i=1; $i<=$_POST['jumlahobat']; $i++) { ?>
                        <tr>
                            <td><?=$i?></td>
                            <td>
                                <input type="text" name="kode_icd-<?=$i?>" class="form-control" required >
                            </td>
                            <td>
                                <input type="text" name="nama_icd-<?=$i?>" class="form-control" required >
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