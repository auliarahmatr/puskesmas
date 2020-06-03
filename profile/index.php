<?php include_once('../_header.php'); ?>

<?php
if ($_SESSION['level'] == 'Admin') {
    $user   = $_SESSION['user'];
    $admin  = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$user'");
    $row    = mysqli_fetch_assoc($admin);
} elseif ($_SESSION['level'] == 'Dokter') {
    $user   = $_SESSION['user'];
    $dokter = mysqli_query($con, "SELECT * FROM tb_dokter WHERE username = '$user'");
    $row    = mysqli_fetch_assoc($dokter);
} elseif ($_SESSION['level'] == 'Nakes') {
}
?>

<div class="row">
    <div class="col-sm-10">
        <h1>My Profile</h1>
    </div>
</div>
<div class="row">
    <div class="col-sm-10"></div>
    <div class="col-sm-2">
        <a href="gantipassword.php">
            <button class="btn btn-lg btn-primary">Ganti Password</button>
        </a>
    </div>
</div>
<br>

<?php if ($_SESSION['level'] == 'Admin') { ?>
    <div class="row">
        <!-- <div class="col-sm-3">
        <div class="text-center">
            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
        </div>
        </hr><br>
    </div> -->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Profile</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <form class="form" action="#" method="post" id="registrationForm">
                        <div class="form-group">
                            <div class="col-xs-8">
                                <label for="first_name">
                                    <h4>Nama Admin</h4>
                                </label>
                                <input type="text" class="form-control" name="nama_dokter" id="nama_dokter" value="<?= $row['nama_user'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-8">
                                <label for="last_name">
                                    <h4>Username</h4>
                                </label>
                                <input type="text" class="form-control" name="spesialis" id="spesialis" value="<?= $row['username'] ?>">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<?php if ($_SESSION['level'] == 'Dokter') { ?>
    <div class="row">
        <!-- <div class="col-sm-3">
        <div class="text-center">
            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
        </div>
        </hr><br>
    </div> -->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Profile</a></li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <form class="form" action="#    " method="post" id="registrationForm">
                        <div class="form-group">
                            <div class="col-xs-8">
                                <label for="first_name">
                                    <h4>Nama Dokter</h4>
                                </label>
                                <input type="text" class="form-control" name="nama_dokter" id="nama_dokter" value="<?= $row['nama_dokter'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-8">
                                <label for="last_name">
                                    <h4>Spesialis</h4>
                                </label>
                                <input type="text" class="form-control" name="spesialis" id="spesialis" value="<?= $row['spesialis'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-8">
                                <label for="last_name">
                                    <h4>Alamat</h4>
                                </label>
                                <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $row['alamat'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-8">
                                <label for="last_name">
                                    <h4>No Telp</h4>
                                </label>
                                <input type="text" class="form-control" name="no_telp" id="no_telp" value="<?= $row['no_telp'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-8">
                                <label for="last_name">
                                    <h4>Username</h4>
                                </label>
                                <input type="text" class="form-control" name="username" id="username" value="<?= $row['username'] ?>">
                            </div>
                        </div>
                    </form>

                    <hr>

                </div>
                <!--/tab-pane-->

            </div>
            <!--/tab-pane-->
        </div>
        <!--/tab-content-->

    </div>
    <!--/col-9-->
<?php } ?>

<?php include_once('../_footer.php'); ?>