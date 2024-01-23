<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';
if (isset($_POST['login'])) {
    // menangkap data yang dikirim dari form login
    $username = htmlspecialchars($_POST['user']);
    $password = htmlspecialchars($_POST['pass']);
    // query
    $login = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='" .$username. "'");
    $data = mysqli_fetch_assoc($login);
    $cek = mysqli_num_rows($login);

    if ($data['username'] == 0 and $data['password'] == 0) {
        header("location:index.php?&pesan=gagal");
        return false;
    }

    if ($cek > 0) {
        if (password_verify($password, $data['password'])) {
            if ($data['level'] == 'Administrator') {
                $_SESSION['username'] = $username;
                $_SESSION['nip'] = $data['nip'];
                header("location:views/index.php?hal=beranda");
                die();
            }

            if ($data['level'] == 'Pimpinan') {
                $_SESSION['username'] = $username;
                $_SESSION['id_user'] = $data['id_user'];
                $_SESSION['name'] = $data['name'];
                $_SESSION['level'] = $data['level'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['nip'] = $data['nip'];
                $_SESSION['kd_poli'] = $data['kd_poli'];
                header("location:views/hal_pimpinan.php?hal=beranda");
                die();
            }

            if ($data['level'] == 'Poli') {
                $_SESSION['username'] = $username;
                $_SESSION['id_user'] = $data['id_user'];
                $_SESSION['name'] = $data['name'];
                $_SESSION['level'] = $data['level'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['nip'] = $data['nip'];
                $_SESSION['kd_poli'] = $data['kd_poli'];
                header("location:views/hal_poli.php?hal=beranda");
                die();
            }
            if ($data['level'] == 'Rekam Medis') {
                $_SESSION['username'] = $username;
                $_SESSION['id_user'] = $data['id_user'];
                $_SESSION['name'] = $data['name'];
                $_SESSION['level'] = $data['level'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['nip'] = $data['nip'];
                $_SESSION['kd_poli'] = $data['kd_poli'];
                header("location:views/hal_rm.php?hal=beranda");
                die();
            }
            if ($data['level'] == 'Apotik') {
                $_SESSION['username'] = $username;
                $_SESSION['id_user'] = $data['id_user'];
                $_SESSION['name'] = $data['name'];
                $_SESSION['level'] = $data['level'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['nip'] = $data['nip'];
                $_SESSION['kd_poli'] = $data['kd_poli'];
                header("location:views/hal_apoteker.php?hal=beranda");
                die();
            }

            if ($data['level'] == 'Pendaftaran') {
                $_SESSION['username'] = $username;
                $_SESSION['id_user'] = $data['id_user'];
                $_SESSION['name'] = $data['name'];
                $_SESSION['level'] = $data['level'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['nip'] = $data['nip'];
                $_SESSION['kd_poli'] = $data['kd_poli'];
                header("location:views/hal_daftar.php?hal=beranda");
                die();
            }

            if ($data['level'] == 'Pemeriksaan') {
                $_SESSION['username'] = $username;
                $_SESSION['id_user'] = $data['id_user'];
                $_SESSION['name'] = $data['name'];
                $_SESSION['level'] = $data['level'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['nip'] = $data['nip'];
                $_SESSION['kd_poli'] = $data['kd_poli'];
                header("location:views/hal_pemeriksaan.php?hal=beranda");
                die();
            }

            if ($data['level'] == 'Kasir') {
                $_SESSION['username'] = $username;
                $_SESSION['id_user'] = $data['id_user'];
                $_SESSION['name'] = $data['name'];
                $_SESSION['level'] = $data['level'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['nip'] = $data['nip'];
                $_SESSION['kd_poli'] = $data['kd_poli'];
                header("location:views/hal_kasir.php?hal=beranda");
                die();
            } else {
                header("location:index.php?&pesan=gagal");
            }
        } else {
            header("location:index.php?&pesan=gagal");
        }
    }
}
