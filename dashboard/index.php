<?php include_once('../_header.php'); ?>

<div class="row">
    <div class="col-lg-12">
        <h1>Dashboard</h1>
        <p>Selamat datang <mark><?= $_SESSION['level']; ?></mark> di website Puskesmas Majasari</p>
        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Sembunyikan Menu</a>
    </div>
</div>

<?php include_once('../_footer.php'); ?>