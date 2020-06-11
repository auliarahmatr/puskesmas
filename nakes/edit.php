<?php include_once('../_header.php'); ?>

    <div class="box">
        <h1>TENAGA KESEHATAN</h1>
        <h4>
            <small>Edit Tenaga Kesehatan</small>
            <div class="pull-right">
            <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $sql_nakes = mysqli_query($con, "SELECT * FROM tb_nakes WHERE id_nakes = '$id'") or die (mysqli_error($con));
                $data = mysqli_fetch_array($sql_nakes);
                ?>
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="nama">Nama Tenaga Kesehatan</label>
                        <input type="hidden" name="id" value="<?=$data['id_nakes']?>">
                        <input type="text" name="nama" id="nama" value="<?=$data['nama_nakes']?>" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <input type="text" name="jenis_kelamin" id="jenis_kelamin" value="<?=$data['jenis_kelamin']?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" value="<?=$data['jabatan']?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" required><?=$data['alamat']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telepon</label>
                        <input type="number" name="no_telp" id="no_telp" value="<?=$data['no_telp']?>" class="form-control" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value="<?=$data['username']?>" class="form-control" required>
                    </div> -->
                    <div class="form-group pull-right">
                        <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include_once('../_footer.php'); ?>