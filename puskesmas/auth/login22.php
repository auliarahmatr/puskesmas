<?php 
require_once "../_config/config.php";
if(isset($_SESSION['user'])) {
    echo "<script>window.location='".base_url()."';</script>";
} else {
?><!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="description" content="Puskesmas Majasari">
        <meta name="author" content="auliarahmatr">
        <title>Login - Puskesmas Majasari</title>
        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="icon" href="<?=base_url()?>/_assets/hospital.png">
        <!-- END Icons -->
        <!-- Stylesheets -->
        <!-- Fonts and Codebase framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
        <link rel="stylesheet" id="css-main" href="<?=base_url()?>/_assets/csscodebase/codebase.min.css">
        <!-- END Stylesheets -->
    </head>
    <body>
        <div id="page-container" class="main-content-boxed">
            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="bg-body-dark bg-pattern" style="background-image: url('<?=base_url()?>/_assets/media/various/bg-pattern-inverse.png');">
                    <div class="row mx-0 justify-content-center">
                        <div class="hero-static col-lg-6 col-xl-4">
                            <div class="content content-full overflow-hidden">
                                <!-- Header -->
                                <?php
                                    if(isset($_POST['login'])) {
                                        $user = trim(mysqli_real_escape_String($con, $_POST['user']));
                                        $pass = sha1(trim(mysqli_real_escape_String($con, $_POST['pass'])));
                                        $sql_login = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$user' AND password = '$pass'") or die (mysqli_error($con));
                                        if(mysqli_num_rows($sql_login) > 0) {
                                            $_SESSION['user'] = $user;
                                            echo "<script>window.location='".base_url()."';</script>";   
                                        } else { ?>
                                            <div class="row">
                                                <div class="col-lg-6 col-lg-offset-3">
                                                    <div class="alert alert-danger alert-dismissable" role="alert">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                                        <strong>LOGIN GAGAL!</strong> username / password salah
                                                    </div>
                                                </div>
                                            </div> 
                                        <?php
                                        }    
                                    }
                                    ?>
                                <div class="py-30 text-center">
                                    <h1 class="h4 font-w700 mt-30 mb-10">Selamat Datang!</h1>
                                    <h2 class="h5 font-w400 text-muted mb-0">Silahkan Login terlebih dahulu!</h2>
                                </div>
                                <!-- END Header -->
                                <!-- Sign In Form -->
                                <form class="navbar-form" action="" method="post">
                                    <div class="block block-themed block-rounded block-shadow">
                                        <div class="block-header bg-gd-dusk" align="center">
                                            <h3 class="block-title">Login</h3>
                                        </div>
                                        <div class="block-content">
                                            <div class="input-group row">
                                                <div class="col-12">
                                                    <label for="user">Username</label>
                                                    <input type="text" class="form-control" name="user" required autofocus>
                                                </div>
                                            </div>
                                            <div class="input-group row">
                                                <div class="col-12">
                                                    <label for="pass">Password</label>
                                                    <input type="password" class="form-control" name="pass" required>
                                                </div>
                                            </div>
                                            <div class="input-group row mb-0">
                                                <div class="col-sm-12 text-sm-right push">
                                                    <button type="submit" name="login "class="btn btn-alt-primary" value="login">
                                                        <i class="si si-login mr-10"></i> Login
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-content bg-body-light">
                                            <div class="form-group text-center">
                                                <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="">
                                                    <i class="fa fa-plus mr-5"></i> Buat Akun
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- END Sign In Form -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <script src="<?=base_url('_assets/jscodebase/codebase.core.min.js')?>"></script>
        <script src="<?=base_url('_assets/js/jquery.js')?>"></script>
        <script src="<?=base_url('_assets/js/bootstrap.min.js')?>"></script>
    </body>
</html>
<?php
}
?> 