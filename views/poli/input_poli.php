<?php
// koneksi database
include '../koneksi.php';
if (isset($_POST['input'])) {
    $kd_poli = $_POST['kd_poli'];
    $nm_poli = $_POST['nm_poli'];

    $query = mysqli_query($conn, "SELECT * FROM tb_poli WHERE nm_poli = '$nm_poli'");
    $hasil = mysqli_fetch_assoc($query);
    if ($hasil) {

        echo "
    <script language=javascript>
      alert('Nama tersebut sudah ada, silakan gunakan yang lain');
      document.location.href='?hal=input_poli';
    </script>";
        return false;
    }

    // menginput data ke database
    $query = mysqli_query($conn, "INSERT INTO tb_poli VALUES('$kd_poli','$nm_poli')");

    if ($query) {
        echo "
        <script language=javascript>
          alert('Data berhasil disimpan');
          document.location.href='?hal=data_poli';
        </script>";
    } else {
        echo "
          <script language=javascript>
            alert('Data Gagal  Ditambah');
            document.location.href='?hal=input_poli'; 
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
                <h2>Form<small>Input Data Poli</small></h2>
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

                    $query = mysqli_query($conn, "SELECT max(kd_poli) as kodeTerbesar FROM tb_poli");
                    $data = mysqli_fetch_array($query);
                    $kodePoli = $data['kodeTerbesar'];
                    $urutan = (int) substr($kodePoli, 4, 3);
                    $urutan++;
                    $huruf = "POLI";
                    $kodePoli = $huruf . sprintf("%03s", $urutan);
                    ?>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kdpoli">Kode Poli <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input name="kd_poli" type="text" id="kdpoli" required="required" class="form-control" value="<?php echo $kodePoli ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nm_poli">Nama Poli <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input name="nm_poli" type="text" id="nm_poli" required="required" class="form-control ">
                        </div>
                    </div>



                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button name="input" type="submit" class="btn btn-success btn-sm">Simpan</button>
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