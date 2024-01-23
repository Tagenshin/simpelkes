<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../simpelkes/views/images/logo-puskesmas-32976.png" type="image/ico" />

    <title>Login | Simpelkes</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <img src="../simpelkes/views/images/logo-puskesmas-33006.png" width="50%" alt="">
                    <form action="validasi_login.php" method="POST">
                        <h1>Form Login</h1>
                        <p><?php
                            if (isset($_GET['pesan'])) {
                                if ($_GET['pesan'] == "gagal") {
                                    echo "Username dan Password Salah !";
                                }
                                if ($_GET['pesan'] == "gagal1") {
                                    echo "Akun Anda Tidak Terdaftar !";
                                }
                                if ($_GET['pesan'] == "belum_login") {
                                    echo "Anda Harus Login Terlebih Dahulu !";
                                }
                                if ($_GET['pesan'] == "akun") {
                                    echo "Akun anda belum aktif, silakan hubungi Admin!";
                                }
                            } else {
                                echo "Enter your username and password";
                            }
                            ?></p>
                        <div>
                            <input name="user" type="text" class="form-control" placeholder="Username" autofocus required="" />
                        </div>
                        <div>
                            <input name="pass" type="password" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                            <button type="submit" name="login" class="btn btn-default submit">Log in</button>
                            <a class="reset_pass" href="#">Lost your password?</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <!-- <p class="change_link">New to site?
                                <a href="#signup" class="to_register"> Create Account </a>
                            </p> -->

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <!-- <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1> -->
                                <p>©2023 All Rights Reserved. <br>
                                    Sistem Informasi Pelayanan Kesehatan Masyarakat</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>

            <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <form>
                        <h1>Create Account</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" required="" />
                        </div>
                        <div>
                            <input type="email" class="form-control" placeholder="Email" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                            <a class="btn btn-default submit" href="index.html">Submit</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Already a member ?
                                <a href="#signin" class="to_register"> Log in </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <!-- <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1> -->
                                <p>©2016 All Rights Reserved. Sistem Informasi Pelayanan</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>