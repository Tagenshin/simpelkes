<?php
// koneksi database
include '../koneksi.php';
if (isset($_POST['input'])) {
  $kd_resep = $_POST['kd_resep'];
  $kd_obat = $_POST['kd_obat'];
  $jlh = $_POST['jlh'];
  $ket_detail = $_POST['ket_detail'];


  $cek_harga = mysqli_query($conn, "SELECT * FROM tb_obat WHERE kd_obat='$kd_obat'");
  $hs_hrg = mysqli_fetch_array($cek_harga); {
    $hrg = $hs_hrg['harga'];
  }


  $sisa = $_POST['ketersediaan'] - $jlh;
  $tanggal = date("Y-m-d H:i:s");

  if ($jlh > $sisa) {
    echo "
              <script language=javascript>
                alert('Ketersediaan Obat Anda Tidak Mencukupi');
                document.location.href='?hal=data_pilih_obat&kd_resep=$kd_resep'; 
              </script>";
    return false;
  }
  // menginput data ke database
  $query = mysqli_query($conn, "INSERT INTO tb_resep_detail VALUES('', '$kd_resep','$kd_obat','$tanggal','$jlh','$hrg','$sisa','$ket_detail')");

  if ($query) {

    mysqli_query($conn, "UPDATE tb_obat SET ketersediaan='$sisa' WHERE kd_obat='$kd_obat'");

    echo "
        <script language=javascript>
          alert('Data berhasil disimpan');
          document.location.href='?hal=data_pilih_obat&kd_resep=$kd_resep';
        </script>";
  } else {
    echo "
          <script language=javascript>
            alert('Data Gagal  Ditambah');
            document.location.href='?hal=data_pilih_obat'; 
          </script>";
  }
}
?>
<?php
include '../koneksi.php';
$kd_resep = $_GET['kd_resep'];
// $data = mysqli_query($conn, "SELECT * FROM tb_periksa,tb_resep WHERE tb_periksa.kd_periksa=tb_resep.kd_periksa and tb_resep.kd_resep='$kd_resep'");
$data = mysqli_query($conn, "SELECT * FROM tb_periksa,tb_resep WHERE tb_periksa.kd_periksa=tb_resep.kd_periksa and tb_resep.kd_resep='$kd_resep'");
// $data = mysqli_query($conn, "SELECT * FROM tb_pasien,tb_daftar,tb_periksa,tb_resep WHERE tb_pasien.nik=tb_daftar.nik and tb_periksa.kd_periksa=tb_resep.kd_periksa and tb_resep.kd_resep='$kd_resep'");

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
          <h2>Form<small>Input Detail Resep Obat</small></h2>
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
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="kd_resep">No. Kunjungan <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 ">
                <input name="kd_resep" type="text" id="kd_resep" required="required" class="form-control" readonly value="<?= $hs['kd_resep']; ?>">
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="kd_obat">Kode Obat <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 ">
                <input name="kd_obat" type="text" id="kd_obat" required="required" class="form-control" readonly value="<?= $_GET['kd_obat']; ?>">
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="ketersediaan">Ketersediaan <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 ">
                <input name="ketersediaan" type="text" id="ketersediaan" required="required" class="form-control" readonly value="<?= $_GET['ketersediaan']; ?>">
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="jlh">Jumlah Obat <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 ">
                <input name="jlh" type="text" id="jlh" required="required" class="form-control" value="<?= $hs['jlh']; ?>">
              </div>
            </div>


            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="ket_detail">Keterangan <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 ">
                <textarea name="ket_detail" id="ket_detail" required="required" class="form-control"><?= $hs['ket_detail']; ?></textarea>
              </div>
            </div>


            <div class="ln_solid"></div>
            <div class="item form-group">
              <div class="col-md-6 col-sm-6 offset-md-3">
                <button name="input" type="submit" class="btn btn-success btn-sm">Simpan</button>
                <button class="btn btn-primary btn-sm" type="reset">Reset</button>
                <a href="?hal=data_pilih_obat&kd_resep=<?= $kd_resep; ?>" class="btn btn-secondary btn-sm" type="button">Kembali</a>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- end form -->
<?php } ?>