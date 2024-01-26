<?php


include '../koneksi.php';
if (isset($_POST['edit'])) {
  $kd_periksa = $_POST['kd_periksa'];
  $kd_kunj = $_POST['kd_kunj'];
  $nik = $_POST['nik'];
  $keluhan = $_POST['keluhan'];
  $diagnosa = $_POST['diagnosa'];
  $tindakan = $_POST['tindakan'];
  $pemeriksaan = $_POST['pemeriksaan'];
  $ket = $_POST['ket'];

  $data = mysqli_query($conn, "UPDATE tb_periksa SET kd_periksa='$kd_periksa',kd_kunj='$kd_kunj', nik='$nik',keluhan='$keluhan',diagnosa='$diagnosa',tindakan='$tindakan',pemeriksaan='$pemeriksaan',ket='$ket' WHERE kd_periksa='$kd_periksa'");
  if ($data) {
    echo "
        <script language=javascript>
          alert('Data Berhasil diedit');
          document.location.href='?hal=data_resep';
        </script>";
  } else {
    echo "
          <script language=javascript>
            alert('Data Gagal Diedit');
            document.location.href='?hal=edit_resep'; 
          </script>";
  }
}
?>

<?php
include '../koneksi.php';
$kd_resep = $_GET['kd_resep'];

$data = mysqli_query($conn, "SELECT * FROM tb_pasien,tb_daftar,tb_periksa,tb_resep WHERE tb_pasien.nik=tb_daftar.nik && tb_daftar.kd_kunj=tb_periksa.kd_kunj && tb_resep.kd_resep='$kd_resep'");
$hs = mysqli_fetch_array($data);
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
        <h2>Form<small>Edit Data Resep</small></h2>
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
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="kd_resep">Kode Resep <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input name="kd_resep" type="text" id="kd_resep" required="required" class="form-control" readonly value="<?= $_GET['kd_resep']; ?>">

                <!-- <input name="kd_kunj" type="text" id="kd_kunj" required="required" class="form-control" readonly value="<?= $hs['kd_kunj']; ?>"> -->
              </div>
            </div>
            <!-- <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="nik">NIK KTP <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 ">
                <input name="nik" type="text" id="nik" required="required" class="form-control" readonly value="<?= $hs['nik']; ?>">
              </div>
            </div> -->
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nm_pasien">Nama Pasien <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input name="nm_pasien" type="text" id="nm_pasien" required="required" class="form-control" readonly value="<?= $hs['nm_pasien']; ?>">
            </div>
          </div>



          <!-- <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="tgl_berobat">Tanggal Berobat <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 ">
                <input name="tgl_berobat" type="date" id="tgl_berobat" required="required" class="form-control" value="<?= $hs['tgl_berobat']; ?>" readonly>
              </div>
            </div>

            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="keluhan">Keluhan <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 ">
                <textarea name="keluhan" id="keluhan" required="required" class="form-control"><?= $hs['keluhan']; ?></textarea>
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="diagnosa">Diagnosa <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 ">
                <textarea name="diagnosa" id="diagnosa" required="required" class="form-control"><?= $hs['diagnosa']; ?></textarea>
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="tindakan">Tindakan <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 ">
                <textarea name="tindakan" id="tindakan" required="required" class="form-control"><?= $hs['tindakan']; ?></textarea>
              </div>
            </div> -->
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="katogori">Kategori Pasien <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <input name="katogori" type="text" id="katogori" required="required" class="form-control" readonly value="<?= $_GET['kategori']; ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="ket">Keterangan <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
              <textarea name="ket" id="ket" required="required" class="form-control"><?= $hs['ket']; ?></textarea>
            </div>
          </div>


          <div class="ln_solid"></div>
          <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
              <button name="edit" type="submit" class="btn btn-success btn-sm">Simpan</button>
              <!-- <button class="btn btn-primary btn-sm" type="reset">Reset</button> -->
              <a href="?hal=data_resep" class="btn btn-secondary btn-sm" type="button">Kembali</a>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>