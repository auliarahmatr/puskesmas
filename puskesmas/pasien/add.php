<?php include_once('../_header.php'); ?>

    <div class="box">
        <h1>PASIEN</h1>
        <h4>
            <small>Tambah Data Pasien</small>
            <div class="pull-right">
            <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="identitas">Nomor Identitas</label>
                        <input type="number" name="identitas" id="identitas" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Pasien</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
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
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="<?=date('Y-m-d')?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <input type="text" name="agama" id="agama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nama_kk">Nama Kepala Keluarga</label>
                        <input type="text" name="nama_kk" id="nama_kk" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telepon</label>
                        <input type="number" name="no_telp" id="no_telp" class="form-control" required>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="add" value="Simpan" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include_once('../_footer.php'); ?>