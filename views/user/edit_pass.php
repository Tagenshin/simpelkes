<?php
include '../koneksi.php';
if (isset($_POST['edit'])) {
    $nip = $_POST['nip'];
    $password = $_POST['password'];

    $password_baru = password_hash($password, PASSWORD_DEFAULT);

    $data = mysqli_query($conn, "UPDATE tb_user SET password='$password_baru' WHERE nip='$nip'");
    if ($data) {
        echo "
        <script language=javascript>
          alert('Password Berhasil Diupdate');
          document.location.href='?hal=beranda';
        </script>";
    } else {
        echo "
          <script language=javascript>
            alert('Data Gagal Diedit');
            document.location.href='?hal=beranda'; 
          </script>";
    }
}
?>

<?php
include '../koneksi.php';
$nip = $_GET['nip'];
$data = mysqli_query($conn, "SELECT * FROM tb_user WHERE nip='$nip'");
while ($hs = mysqli_fetch_array($data)) {
?>
    <!-- form -->
    <!-- <div class="title_left">
    <h3>Form User</h3>
</div> -->
    <!-- <div class="clearfix"></div> -->
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form<small>Update Password</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="dropdown-item" href="#">Settings 1</a>
                            </li>
                            <li><a class="dropdown-item" href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li> -->
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form action="" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <input type="hidden" id="nip" name="nip" required="required" class="form-control" value="<?= $hs['nip']; ?>">

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password Baru<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="password" id="password" name="password" required="required" class="form-control" value="">
                            </div>
                        </div>


                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <!-- <a href="?hal=data_user" class="btn btn-secondary btn-sm" type="button">Kembali</a> -->
                                <!-- <button class="btn btn-primary btn-sm" type="reset">Reset</button> -->
                                <button name="edit" type="submit" class="btn btn-success btn-sm">Update Password</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end form -->
<?php } ?>