<?php include_once('../_header.php'); ?>

    <div class="box">
        <h1>PASIEN</h1>
        <h4>
            <small>Edit Data Pasien</small>
            <div class="pull-right">
            <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $sql_pasien = mysqli_query($con, "SELECT * FROM tb_pasien WHERE id_pasien = '$id'") or die (mysqli_error($con));
                $data = mysqli_fetch_array($sql_pasien);
                ?>
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="identitas">Nomor Identitas</label>
                        <input type="hidden" name="id" value="<?=$data['id_pasien']?>">
                        <input type="number" name="identitas" id="identitas" class="form-control" value="<?=$data['nomor_identitas']?>" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Pasien</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?=$data['nama_pasien']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="jenkel">Jenis Kelamin</label>
                        <div>
                            <label class="radio-inline">
                            <input type="radio" name="jenkel" id="jenkel" value="L" required <?=$data['jenis_kelamin'] == "L" ? "Checked" : null ?>> Laki - Laki
                            </label>
                            <label class="radio-inline">
                            <input type="radio" name="jenkel" value="P" <?=$data['jenis_kelamin'] == "P" ? "Checked" : null ?>> Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?=$data['tanggal_lahir']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="gol_darah">Gol Darah</label>
                        <div>
                        <select name="gol_darah" id="gol_darah" class="form-control" value="<?=$data['gol_darah']?>" required>
                            <option value="">- Pilih -</option>
                            <option value="A">A</option>
                            <option value="AB">AB</option>
                            <option value="B">B</option>
                            <option value="O">O</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <input type="text" name="agama" id="agama" class="form-control" value="<?=$data['agama']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" required><?=$data['alamat']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nama_kk">Nama Kepala Keluarga</label>
                        <textarea name="nama_kk" id="nama_kk" class="form-control" required><?=$data['nama_kk']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telepon</label>
                        <input type="number" name="no_telp" id="no_telp" class="form-control" value="<?=$data['no_telp']?>" required>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include_once('../_footer.php'); ?>