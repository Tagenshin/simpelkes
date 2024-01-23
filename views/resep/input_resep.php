<?php
// koneksi database
include '../koneksi.php';
if (isset($_POST['input'])) {
    $kd_periksa = $_POST['kd_periksa'];
    $tgl_resep = $_POST['tgl_resep'];
    $ket_resep = $_POST['ket_resep'];


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
    $query = mysqli_query($conn, "INSERT INTO tb_resep VALUES('', '$kd_periksa','$tgl_resep','$ket_resep','0')");

    if ($query) {

        mysqli_query($conn, "UPDATE tb_periksa SET sts_periksa='1' WHERE kd_periksa='$kd_periksa'");

        echo "
        <script language=javascript>
          alert('Data berhasil disimpan');
          document.location.href='?hal=data_resep';
        </script>";
    } else {
        echo "
          <script language=javascript>
            alert('Data Gagal  Ditambah');
            document.location.href='?hal=data_resep1'; 
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
                <h2>Form<small>Input Data Resep</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="dropdown-item" href="#">Settings 1</a>
                            </li>
                            <li><a class="dropdown-item" href="#">Settings 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form action="" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kd_periksa">Kode Periksa <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input name="kd_periksa" type="text" id="kd_periksa" required="required" class="form-control" readonly value="<?= $_GET['kd_periksa']; ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="tgl_resep">Tanggal Resep <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input name="tgl_resep" type="date" id="tgl_resep" required="required" class="form-control" value="<?= date('Y-m-d'); ?>">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="ket_resep">Keterangan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea name="ket_resep" id="ket_resep" required="required" class="form-control"><?= $hs['ket_resep']; ?></textarea>
                        </div>
                    </div>


                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button name="input" type="submit" class="btn btn-success btn-sm">Buat Resep</button>
                            <button class="btn btn-primary btn-sm" type="reset">Reset</button>
                            <a href="?hal=data_resep1" class="btn btn-secondary btn-sm" type="button">Kembali</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- end form -->