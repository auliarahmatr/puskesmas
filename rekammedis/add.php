<?php include_once('../_header.php'); ?>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <div class="box">
        <h1>REKAM MEDIS</h1>
        <h4>
            <small>Tambah Data Rekam Medis</small>
            <div class="pull-right">
            <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="addobat.php" method="post">
                    <div class="form-group">
                        <label for="pasien">Pasien</label>
                        <select name="pasien" id="pasien" class="form-control" type="text" placeholder="" required>
                            <option disabled selected>- Pilih -</option>
                            <?php
                            $sql_pasien = mysqli_query($con, "SELECT * FROM tb_pasien ORDER BY nama_pasien ASC") or die (mysqli_error($con));
                            while($data_pasien = mysqli_fetch_array($sql_pasien)) {
                                echo '<option value="'.$data_pasien['id_pasien'].'">'.$data_pasien['id_pasien'] . ' - ' .$data_pasien['nama_pasien'].'</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keluhan">Keluhan</label>
                        <textarea name="keluhan" id="keluhan" class="form-control "required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="dokter">Dokter</label>
                        <select name="dokter" id="dokter" class="form-control" required>
                            <option disabled selected>- Pilih -</option>
                            <?php
                            $sql_dokter = mysqli_query($con, "SELECT * FROM tb_dokter ORDER BY nama_dokter ASC") or die (mysqli_error($con));
                            while($data_dokter = mysqli_fetch_array($sql_dokter)) {
                                echo '<option value="'.$data_dokter['id_dokter'].'">'.$data_dokter['nama_dokter'].'</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="icd">Diagnosa (ICD)</label>
                        <select multiple name="icd[]" id="icd" class="form-control" size="6" required>
                            <option disabled value="">- Pilih -</option>
                            <?php
                            $sql_icd = mysqli_query($con, "SELECT * FROM tb_icd ORDER BY nama_icd ASC") or die (mysqli_error($con));
                            while($data_icd = mysqli_fetch_array($sql_icd)) {
                                echo '<option value="'.$data_icd['kode_icd'].'">'.$data_icd['kode_icd'] . ' - ' .$data_icd['nama_icd'].'</option>';
                            } ?>
                                </select>
                    </div>
                    <div class="form-group">
                        <label for="obat">Jumlah Obat</label>
                        <input type="number" name="jumlahobat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="poli">Poliklinik</label>
                        <select name="poli" id="poli" class="form-control" required>
                            <option disabled value="">- Pilih -</option>
                            <?php
                            $sql_poli = mysqli_query($con, "SELECT * FROM tb_poliklinik ORDER BY nama_poli ASC") or die (mysqli_error($con));
                            while($data_poli = mysqli_fetch_array($sql_poli)) {
                                echo '<option value="'.$data_poli['id_poli'].'">'.$data_poli['nama_poli'].'</option>';
                            } ?>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label for="obat">Obat</label>
                        <select multiple name="obat[]" id="obat" class="form-control" size="6" required>
                            <option value="">- Pilih -</option>
                            <?php
                            $sql_obat = mysqli_query($con, "SELECT * FROM tb_obat ORDER BY nama_obat ASC") or die (mysqli_error($con));
                            while($data_obat = mysqli_fetch_array($sql_obat)) {
                                echo '<option value="'.$data_obat['id_obat'].'">'.$data_obat['nama_obat'].'</option>';
                            } ?>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label for="tanggal">Tanggal Periksa</label>
                        <input type="date" name="tanggal" id="tanggal" value="<?=date('Y-m-d')?>" class="form-control" required>
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="add" value="Simpan" class="btn btn-success">
                        <input type="reset" name="reset" value="Reset" class="btn btn-default">
                    </div>
                </form>
                <script type="text/javascript">
                CKEDITOR.replace( 'keluhan' );

                $(document).ready(function() {
                $("#pasien").select2();
                 });
                $(document).ready(function() {
                $("#dokter").select2();
                 });
                $(document).ready(function() {
                $("#icd").select2();
                 });
                // $(document).ready(function() {
                // $("#obat").select2();
                //  });
                </script>
            </div>
        </div>
    </div>

<?php include_once('../_footer.php'); ?>