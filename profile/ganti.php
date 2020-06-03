<?php
$koneksi = mysqli_connect("localhost", "root", "", "puskesmas");
session_start();
if (isset($_POST['submit'])) {

    $passlama   = htmlspecialchars($_POST['passwordlama']);
    $passbaru1  = htmlspecialchars($_POST['passwordbaru1']);
    $passbaru2  = htmlspecialchars($_POST['passwordbaru2']);

    if ($passbaru1 != $passbaru2) {
        $_SESSION['flash'] = [
            'tipe'  => 'danger',
            'isi'  => 'Password tidak sama! Ulangi password baru yang sama!'
        ];
        echo "
            <script>
                document.location.href = 'gantipassword.php';
            </script>
            ";
    } else {

        // Ganti Dokter
        if ($_SESSION['level'] == 'Dokter') {
            $user = $_SESSION['user'];
            $dokter = mysqli_query($koneksi, "SELECT * FROM tb_dokter WHERE username = '$user'");
            while ($row = mysqli_fetch_array($dokter)) {
                $password = $row['password'];
            }
            if (!password_verify($passlama, $password)) {
                $_SESSION['flash'] = [
                    'tipe'  => 'danger',
                    'isi'   => 'Password lama salah!'
                ];
                echo "
            <script>
                document.location.href = 'gantipassword.php';
            </script>
            ";
            } else {
                if ($passlama == $passbaru1) {
                    $_SESSION['flash'] = [
                        'tipe'  => 'danger',
                        'isi'   => 'Password baru dan lama sama!'
                    ];
                    echo "
                    <script>
                        document.location.href = 'gantipassword.php';
                    </script>
                    ";
                } else {
                    $password_hash = password_hash($passbaru1, PASSWORD_DEFAULT);

                    $query = "UPDATE tb_dokter SET 
                                password        = '$password_hash'
                            WHERE 
                                username        = '$user'
                                ";
                    $sql = mysqli_query($koneksi, $query);
                    if ($sql) {
                        $_SESSION['flash'] = [
                            'tipe'  => 'success',
                            'isi'   => 'Password berhasil diganti'
                        ];
                        echo "
                    <script>
                        document.location.href = 'gantipassword.php';
                    </script>
                    ";
                    }
                }
            }
        }

        // Ganti Dokter

        // Ganti Admin
        if ($_SESSION['level'] == 'Admin') {
            $user = $_SESSION['user'];
            $admin = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$user'");
            while ($row = mysqli_fetch_array($admin)) {
                $password = $row['password'];
            }
            if (!password_verify($passlama, $password)) {
                $_SESSION['flash'] = [
                    'tipe'  => 'danger',
                    'isi'   => 'Password lama salah!'
                ];
                echo "
                <script>
                    document.location.href = 'gantipassword.php';
                </script>
                ";
            } else {
                if ($passlama == $passbaru1) {
                    $_SESSION['flash'] = [
                        'tipe'  => 'danger',
                        'isi'   => 'Password baru dan lama sama!'
                    ];
                    echo "
                        <script>
                            document.location.href = 'gantipassword.php';
                        </script>
                        ";
                } else {
                    $password_hash = password_hash($passbaru1, PASSWORD_DEFAULT);

                    $query = "UPDATE tb_user SET 
                                    password        = '$password_hash'
                                WHERE 
                                    username        = '$user'
                                    ";
                    $sql = mysqli_query($koneksi, $query);
                    if ($sql) {
                        $_SESSION['flash'] = [
                            'tipe'  => 'success',
                            'isi'   => 'Password berhasil diganti'
                        ];
                        echo "
                        <script>
                            document.location.href = 'gantipassword.php';
                        </script>
                        ";
                    }
                }
            }
        }
        // Ganti Admin

    }
}
