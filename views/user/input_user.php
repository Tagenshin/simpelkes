<?php
// koneksi database
include '../koneksi.php';
if (isset($_POST['input'])) {
    $nip = $_POST['nip'];
    $kd_poli = $_POST['kd_poli'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $level = $_POST['level'];
    $password = $_POST['password'];


    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
    $hasil = mysqli_fetch_assoc($query);
    if ($hasil) {

        echo "
    <script language=javascript>
      alert('Nama tersebut sudah ada, silakan gunakan yang lain');
      document.location.href='?hal=input_user';
    </script>";
        return false;
    }

    $password_baru = password_hash($password, PASSWORD_DEFAULT);

    // menginput data ke database
    $query = mysqli_query($conn, "INSERT INTO tb_user VALUES('$nip','$kd_poli','$username','$email','$level','$password_baru')");

    if ($query) {
        echo "
        <script language=javascript>
          alert('Data berhasil disimpan');
          document.location.href='?hal=data_user';
        </script>";
    } else {
        echo "
          <script language=javascript>
            alert('Data Gagal  Ditambah');
            document.location.href='?hal=input_user'; 
          </script>";
    }
}
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
                                    echo "<option value=" . $hs1['nip'] . ">" .  $hs1['nm_pegawai'] . "</option>";
                                } ?>
                            </select>
                            <span>Jika data kosong silakan tambahkan Data Pegawai terlebih dahulu</span>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="username" name="username" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="email" id="email" name="email" required="required" class="form-control">
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
                                while ($hs2 = mysqli_fetch_assoc($data)) {
                                    echo "<option value=" . $hs2['kd_poli'] . ">" .  $hs2['nm_poli'] . "</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="password" id="password" name="password" required="required" class="form-control">
                        </div>
                    </div>


                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button type="submit" name="input" class="btn btn-success btn-sm">Simpan</button>
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