<?php
// koneksi database
include '../koneksi.php';
if (isset($_POST['input'])) {
    $nik = $_POST['nik'];
    $nm_pasien = $_POST['nm_pasien'];
    $jk = $_POST['jk'];
    $agama = $_POST['agama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $no_tlp = $_POST['no_tlp'];
    $alamat = $_POST['alamat'];

    $query = mysqli_query($conn, "SELECT * FROM tb_pasien WHERE nm_pasien = '$nm_pasien'");
    $hasil = mysqli_fetch_assoc($query);
    if ($hasil) {

        echo "
    <script language=javascript>
      alert('Nama tersebut sudah ada, silakan gunakan yang lain');
      document.location.href='?hal=input_pasien';
    </script>";
        return false;
    }

    // menginput data ke database
    $query = mysqli_query($conn, "INSERT INTO tb_pasien VALUES('$nik','$nm_pasien','$jk','$agama','$tgl_lahir','$no_tlp','$alamat')");

    if ($query) {
        echo "
        <script language=javascript>
          alert('Data berhasil disimpan');
          document.location.href='?hal=data_pasien';
        </script>";
    } else {
        echo "
          <script language=javascript>
            alert('Data Gagal  Ditambah');
            document.location.href='?hal=input_pasien'; 
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
                <h2>Form<small>Input Data Pasien</small></h2>
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nik">NIK KTP <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input name="nik" type="text" id="nik" required="required" class="form-control" autofocus value="">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nm_pasien">Nama Pasien <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input name="nm_pasien" type="text" id="nm_pasien" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="jk">Jenis Kelamin<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select id="jk" name="jk" required="required" class="form-control">
                                <option></option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="agama">Agama<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select id="agama" name="agama" required="required" class="form-control">
                                <option></option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen Katolik">Kristen Katolik</option>
                                <option value="Kristen Protestan">Kristen Protestan</option>
                                <option value="Budha">Budha</option>
                                <option value="Hindu">Hindu</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="tgl_lahir">Tanggal Lahir <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input name="tgl_lahir" type="date" id="tgl_lahir" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_tlp">Nomor Telp <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input name="no_tlp" type="text" id="no_tlp" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea name="alamat" id="alamat" required="required" class="form-control"></textarea>
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