<?php
// koneksi database
include '../koneksi.php';
if (isset($_POST['input'])) {
    $kd_kpasien = $_POST['kd_kpasien'];
    $kategori = $_POST['kategori'];
    $ket = $_POST['ket'];
    $biaya = $_POST['biaya'];

    $query = mysqli_query($conn, "SELECT * FROM tb_kpasien WHERE kategori = '$kategori'");
    $hasil = mysqli_fetch_assoc($query);
    if ($hasil) {

        echo "
    <script language=javascript>
      alert('Nama tersebut sudah ada, silakan gunakan yang lain');
      document.location.href='?hal=input_kpasien';
    </script>";
        return false;
    }

    // menginput data ke database
    $query = mysqli_query($conn, "INSERT INTO tb_kpasien VALUES('$kd_kpasien','$kategori','$ket','$biaya')");

    if ($query) {
        echo "
        <script language=javascript>
          alert('Data berhasil disimpan');
          document.location.href='?hal=data_kpasien';
        </script>";
    } else {
        echo "
          <script language=javascript>
            alert('Data Gagal  Ditambah');
            document.location.href='?hal=input_kpasien'; 
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
                <h2>Form<small>Input Data Kategori Pasien</small></h2>
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
                    $query = mysqli_query($conn, "SELECT max(kd_kpasien) as kodeTerbesar FROM tb_kpasien");
                    $data = mysqli_fetch_array($query);
                    $kodeKpasien = $data['kodeTerbesar'];
                    $urutan = (int) substr($kodeKpasien, 2, 3);
                    $urutan++;
                    $huruf = "KP";
                    $kodeKpasien = $huruf . sprintf("%03s", $urutan);
                    ?>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kpasien">Kode Kategori Pasien <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input name="kd_kpasien" type="text" id="kpasien" required="required" class="form-control" value="<?= $kodeKpasien; ?>" readonly>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kategori">Kategori <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input name="kategori" type="text" id="kategori" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="ket">Keterangan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input name="ket" type="text" id="ket" required="required" class="form-control" value="">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="biaya">Biaya <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input name="biaya" type="text" id="biaya" required="required" class="form-control ">
                        </div>
                    </div>



                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button name="input" type="submit" class="btn btn-success btn-sm">Simpan</button>
                            <button class="btn btn-primary btn-sm" type="reset">Reset</button>
                            <a href="?hal=data_kpasien" class="btn btn-secondary btn-sm" type="button">Kembali</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- end form -->