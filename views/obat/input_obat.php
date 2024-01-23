<?php
// koneksi database
include '../koneksi.php';
if (isset($_POST['input'])) {
    $kd_obat = $_POST['kd_obat'];
    $nm_obat = $_POST['nm_obat'];
    $satuan = $_POST['satuan'];
    $harga = $_POST['harga'];
    $ketersediaan = $_POST['ketersediaan'];

    $query = mysqli_query($conn, "SELECT * FROM tb_obat WHERE nm_obat = '$nm_obat'");
    $hasil = mysqli_fetch_assoc($query);
    if ($hasil) {

        echo "
    <script language=javascript>
      alert('Nama tersebut sudah ada, silakan gunakan yang lain');
      document.location.href='?hal=input_obat';
    </script>";
        return false;
    }

    // menginput data ke database
    $query = mysqli_query($conn, "INSERT INTO tb_obat VALUES('$kd_obat','$nm_obat','$satuan','$harga','$ketersediaan')");

    if ($query) {
        echo "
        <script language=javascript>
          alert('Data berhasil disimpan');
          document.location.href='?hal=data_obat';
        </script>";
    } else {
        echo "
          <script language=javascript>
            alert('Data Gagal  Ditambah');
            document.location.href='?hal=input_obat'; 
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
                <h2>Form<small>Input Data Obat</small></h2>
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kd_obat">Kode Obat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input name="kd_obat" type="text" id="kd_obat" required="required" class="form-control" value="">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nm_obat">Nama Obat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input name="nm_obat" type="text" id="nm_obat" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="satuan">Satuan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select id="satuan" name="satuan" required="required" class="form-control">
                                <option></option>
                                <option value="Botol">Botol</option>
                                <option value="Tablet">Tablet</option>
                                <option value="Kaplet">Kaplet</option>
                                <option value="Kapsul">Kapsul</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="harga">Harga <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input name="harga" type="text" id="harga" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="ketersediaan">Jumlah <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input name="ketersediaan" type="text" id="ketersediaan" required="required" class="form-control ">
                        </div>
                    </div>



                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button name="input" type="submit" class="btn btn-success btn-sm">Simpan</button>
                            <button class="btn btn-primary btn-sm" type="reset">Reset</button>
                            <a href="?hal=data_obat" class="btn btn-secondary btn-sm" type="button">Kembali</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- end form -->