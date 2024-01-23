<?php
// koneksi database
include '../koneksi.php';
if (isset($_POST['input'])) {
    $kd_kunj = $_POST['kd_kunj'];
    $nik = $_POST['nik'];
    $kd_poli = $_POST['kd_poli'];
    $tgl_berobat = $_POST['tgl_berobat'];
    $kd_kpasien = $_POST['kd_kpasien'];
    $keluhan = $_POST['keluhan'];

    // $query = mysqli_query($conn, "SELECT * FROM tb_pasien WHERE nm_pasien = '$nm_pasien'");
    // $hasil = mysqli_fetch_assoc($query);
    // if ($hasil) {

    //     echo "
    // <script language=javascript>
    //   alert('Nama tersebut sudah ada, silakan gunakan yang lain');
    //   document.location.href='?hal=input_pasien';
    // </script>";
    //     return false;
    // }

    // menginput data ke database
    $query = mysqli_query($conn, "INSERT INTO tb_daftar VALUES('$kd_kunj','$nik','$tgl_berobat','$kd_poli','$kd_kpasien','0','$keluhan')");

    if ($query) {
        echo "
        <script language=javascript>
          alert('Data berhasil disimpan');
          document.location.href='?hal=data_daftar';
        </script>";
    } else {
        echo "
          <script language=javascript>
            alert('Data Gagal  Ditambah');
            document.location.href='?hal=input_daftar'; 
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
                <h2>Form<small>Input Data Pendaftaran Layanan</small></h2>
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
                    <?php

                    include '../koneksi.php';

                    $query = mysqli_query($conn, "SELECT max(kd_kunj) as kodeTerbesar FROM tb_daftar");
                    $data = mysqli_fetch_array($query);
                    $kdDaftar = $data['kodeTerbesar'];
                    $urutan = (int) substr($kdDaftar, 8, 4);
                    $urutan++;
                    $huruf = date('Ymd');
                    $kdDaftar = $huruf . sprintf("%04s", $urutan);
                    ?>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kd_kunj">No Pendaftaran Kunjungan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input name="kd_kunj" type="text" id="kd_kunj" required="required" class="form-control" value="<?php echo $kdDaftar ?>" readonly>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nik">NIK-Nama Pasien <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select id="nik" name="nik" required="required" class="form-control">
                                <option value="" selected>Pilih Pasien</option>
                                <?php
                                include '../koneksi.php';
                                $data = mysqli_query($conn, "SELECT * from tb_pasien ORDER BY nik");
                                while ($hs = mysqli_fetch_assoc($data)) {
                                    echo "<option value=" . $hs['nik'] . ">" .  $hs['nik'] . '-' .  $hs['nm_pasien'] . "</option>";
                                } ?>
                            </select>
                        </div>
                    </div>


                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="tgl_berobat">Tanggal Pendaftaran <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input name="tgl_berobat" type="date" id="tgl_berobat" required="required" class="form-control" value="<?= date('Y-m-d'); ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="keluhan">Keluhan Awal <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea name="keluhan" type="text" id="keluhan" required="required" class="form-control" value=""></textarea>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kd_poli">Tujuan Pelayanan Poli <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select id="kd_poli" name="kd_poli" required="required" class="form-control">
                                <option value="" selected>Pilih Poli</option>
                                <?php
                                include '../koneksi.php';
                                $data = mysqli_query($conn, "SELECT * from tb_poli");
                                while ($hs = mysqli_fetch_assoc($data)) {
                                    echo "<option value=" . $hs['kd_poli'] . ">" . $hs['kd_poli'] . "-" . $hs['nm_poli'] . "</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kd_kpasien">Kategori Pasien <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select id="kd_kpasien" name="kd_kpasien" required="required" class="form-control">
                                <option value="" selected>Pilih Kategori</option>
                                <?php
                                include '../koneksi.php';
                                $data = mysqli_query($conn, "SELECT * from tb_kpasien");
                                while ($hs = mysqli_fetch_assoc($data)) {
                                    echo "<option value=" . $hs['kd_kpasien'] . ">" . $hs['kd_kpasien'] . "-" . $hs['kategori'] . "</option>";
                                } ?>
                            </select>
                        </div>
                    </div>


                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button name="input" type="submit" class="btn btn-success btn-sm">Simpan</button>
                            <button class="btn btn-primary btn-sm" type="reset">Reset</button>
                            <a href="?hal=data_pasien" class="btn btn-secondary btn-sm" type="button">Kembali</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- end form -->