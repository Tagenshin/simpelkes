<?php
include '../koneksi.php';
if (isset($_POST['edit'])) {
    $nip = $_POST['nip'];
    $kd_poli = $_POST['kd_poli'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $level = $_POST['level'];
    // $password = $_POST['password'];

    $data = mysqli_query($conn, "UPDATE tb_user SET nip='$nip',kd_poli='$kd_poli',username='$username',email='$email',level='$level' WHERE nip='$nip'");
    if ($data) {
        echo "
        <script language=javascript>
          alert('Data Berhasil diedit');
          document.location.href='?hal=data_user';
        </script>";
    } else {
        echo "
          <script language=javascript>
            alert('Data Gagal Diedit');
            document.location.href='?hal=edit_user'; 
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
                    <h2>Form<small>Input Data User</small></h2>
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
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nip">Nama Pegawai <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select id="nip" name="nip" required="required" class="form-control">
                                    <option value=""></option>
                                    <?php
                                    include '../koneksi.php';
                                    $data = mysqli_query($conn, "SELECT * from tb_pegawai");
                                    while ($hs1 = mysqli_fetch_assoc($data)) {
                                        if ($hs['nip'] == $hs1['nip']) {
                                            $sel = "selected";
                                        } else {
                                            $sel = "";
                                        }
                                        echo "<option value='$hs1[nip]' $sel>$hs1[nm_pegawai]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Username <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="username" name="username" required="required" class="form-control" value="<?= $hs['username']; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="email" id="email" name="email" required="required" class="form-control" value="<?= $hs['email']; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="level">Jenis User <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select id="level" name="level" required="required" class="form-control">
                                    <option></option>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Pimpinan">Pimpinan</option>
                                    <option value="Pendaftaran">Pendaftaran</option>
                                    <option value="Pemeriksaan">Pemeriksaan</option>
                                    <option value="Rekam Medis">Rekam Medis</option>
                                    <option value="Apotik">Apoteker</option>
                                    <option value="Poli">Poli</option>
                                    <option value="Kasir">Pembayaran</option>

                                    <option <?php if ($hs['level'] == 'Administrator') {
                                                echo "selected";
                                            } ?> value='Administrator'>Administrator</option>
                                    <option <?php if ($hs['level'] == 'Pimpinan') {
                                                echo "selected";
                                            } ?> value='Pimpinan'>Pimpinan</option>
                                    <option <?php if ($hs['level'] == 'Pendaftaran') {
                                                echo "selected";
                                            } ?> value='Pendaftaran'>Pendaftaran</option>

                                    <option <?php if ($hs['level'] == 'Pemeriksaan') {
                                                echo "selected";
                                            } ?> value='Pemeriksaan'>Pemeriksaan</option>
                                    <option <?php if ($hs['level'] == 'Rekam Medis') {
                                                echo "selected";
                                            } ?> value='Rekam Medis'>Rekam Medis</option>
                                    <option <?php if ($hs['level'] == 'Apotik') {
                                                echo "selected";
                                            } ?> value='Apotik'>Apotik</option>

                                    <option <?php if ($hs['level'] == 'Poli') {
                                                echo "selected";
                                            } ?> value='Poli'>Poli</option>
                                    <option <?php if ($hs['level'] == 'Kasir') {
                                                echo "selected";
                                            } ?> value='Kasir'>Kasir</option>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="kd_poli">Jenis Poli <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select id="kd_poli" name="kd_poli" required="required" class="form-control">
                                    <option value="0">-</option>
                                    <?php
                                    include '../koneksi.php';
                                    $data = mysqli_query($conn, "SELECT * from tb_poli");
                                    while ($hs1 = mysqli_fetch_assoc($data)) {
                                        if ($hs['kd_poli'] == $hs1['kd_poli']) {
                                            $sel = "selected";
                                        } else {
                                            $sel = "";
                                        }
                                        echo "<option value='$hs1[kd_poli]' $sel>$hs1[nm_poli]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="password" id="password" name="password" required="required" class="form-control" value="<?= $hs['password']; ?>">
                            </div>
                        </div> -->


                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button name="edit" type="submit" class="btn btn-success btn-sm">Simpan</button>
                                <button class="btn btn-primary btn-sm" type="reset">Reset</button>
                                <a href="?hal=data_user" class="btn btn-secondary btn-sm" type="button">Kembali</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end form -->
<?php } ?>