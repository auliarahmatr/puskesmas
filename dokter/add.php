<?php include_once('../_header.php'); ?>

    <div class="box">
        <h1>DOKTER</h1>
        <h4>
            <small>Tambah Data Dokter</small>
            <div class="pull-right">
            <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <?php
                        $nom = mysqli_query($con, "SELECT id_dokter FROM tb_dokter ORDER BY id_dokter DESC");
                        $kd_dokter = mysqli_fetch_array($nom);
                        $kode = $kd_dokter['id_dokter'];

                        $urut = substr($kode, 2, 2);
                        $tambah = (int) $urut + 1;

                        if(strlen($tambah) == 1){
                            $format = "01"."0".$tambah;
                        } else {
                            $format = "01".$tambah;
                        }
                        ?> 
                        <label for="id_dokter">ID Dokter</label>
                        <input type="text" name="id_dokter" id="id_dokter" class="form-control" value="<?php echo $format;?>" readonly required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Dokter</label>
                        <input type="text" name="nama" id="nama" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="jenkel">Jenis Kelamin</label>
                        <div>
                            <label class="radio-inline">
                            <input type="radio" name="jenkel" id="jenkel" value="L" required> Laki - Laki
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="jenkel" value="P" required> Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="spesialis">Spesialis</label>
                        <input type="text" name="spesialis" id="spesialis" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telepon</label>
                        <input type="number" name="no_telp" id="no_telp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="user">Username</label>
                        <input type="text" name="user" id="user" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="text" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="add" value="Simpan" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include_once('../_footer.php'); ?>