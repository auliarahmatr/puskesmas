<?php include_once('../_header.php'); ?>

<div class="row">
    <div class="col-sm-12">
        <h1>My Profile</h1>
    </div>
</div>
<div class="pull-right">
            <a href="index.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
            </div><br><br>
<div class="row">
    <div class="col-sm-8">

        <?php if (isset($_SESSION['flash'])) { ?>
            <div class="alert alert-<?= $_SESSION['flash']['tipe']; ?>" role="alert">
                <b><?= $_SESSION['flash']['isi']; ?></b>
            </div>
            <?php unset($_SESSION['flash']); ?>
        <?php } ?>

        <form action="ganti.php" method="POST">
            <div class="form-group row">
                <label for="passwordlama" class="col-sm-4 col-form-label">Password Lama</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="passwordlama" name="passwordlama">
                </div>
            </div>
            <div class="form-group row">
                <label for="passwordbaru1" class="col-sm-4 col-form-label">Password Baru</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="passwordbaru1" name="passwordbaru1">
                </div>
            </div>
            <div class="form-group row">
                <label for="passwordbaru2" class="col-sm-4 col-form-label">Ulangi Password Baru</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="passwordbaru2" name="passwordbaru2">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4"></div>
                <div class="col-sm-8">
                    <button class="btn btn-md btn-primary" type="submit" name="submit">Ganti</button>
                </div>
            </div>
        </form>
    </div>
</div>


<?php include_once('../_footer.php'); ?>