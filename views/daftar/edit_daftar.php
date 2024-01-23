<?php
include '../koneksi.php';
if (isset($_POST['edit'])) {
    $kd_kunj = $_POST['kd_kunj'];
    $nik = $_POST['nik'];
    $tgl_berobat = $_POST['tgl_berobat'];
    $kd_poli = $_POST['kd_poli'];
    $kd_kpasien = $_POST['kd_kpasien'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $no_tlp = $_POST['no_tlp'];
    $alamat = $_POST['alamat'];
    $keluhan = $_POST['keluhan'];

    $data = mysqli_query($conn, "UPDATE tb_daftar SET kd_kunj='$kd_kunj',nik='$nik',tgl_berobat='$tgl_berobat',kd_poli='$kd_poli',kd_kpasien='$kd_kpasien',keluhan='$keluhan' WHERE kd_kunj='$kd_kunj'");
    if ($data) {
        echo "
        <script language=javascript>
          alert('Data Berhasil diedit');
          document.location.href='?hal=data_daftar';
        </script>";
    } else {
        echo "
          <script language=javascript>
            alert('Data Gagal Diedit');
            document.location.href='?hal=edit_daftar'; 
          </script>";
    }
}
?>

<?php
include '../koneksi.php';
$kd_kunj = $_GET['kd_kunj'];
$data = mysqli_query($conn, "SELECT * FROM tb_pasien,tb_daftar WHERE tb_pasien.nik=tb_daftar.nik && tb_daftar.kd_kunj='$kd_kunj'");
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
                    <h2>Form<small>Edit Data Kategori Pasien</small></h2>
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
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="kd_kunj">No. Kunjungan <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input name="kd_kunj" type="text" id="kd_kunj" required="required" class="form-control" readonly value="<?= $hs['kd_kunj']; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nik">NIK KTP <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input name="nik" type="text" id="nik" required="required" class="form-control" readonly value="<?= $hs['nik']; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nm_pasien">Nama Pasien <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input name="nm_pasien" type="text" id="nm_pasien" required="required" class="form-control" readonly value="<?= $hs['nm_pasien']; ?>">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="keluhan">Keluhan Awal <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea name="keluhan" type="text" id="keluhan" required="required" class="form-control"><?= $hs['keluhan']; ?></textarea>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="tgl_berobat">Tanggal Berobat <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input name="tgl_berobat" type="date" id="tgl_berobat" required="required" class="form-control" value="<?= $hs['tgl_berobat']; ?>">
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
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="kd_kpasien">Kategori Pasien <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select id="kd_kpasien" name="kd_kpasien" required="required" class="form-control">
                                    <option value="" selected>Pilih Kategori</option>

                                    <?php
                                    include '../koneksi.php';
                                    $data = mysqli_query($conn, "SELECT * from tb_kpasien");
                                    while ($hs1 = mysqli_fetch_assoc($data)) {
                                        if ($hs['kd_kpasien'] == $hs1['kd_kpasien']) {
                                            $sel = "selected";
                                        } else {
                                            $sel = "";
                                        }
                                        echo "<option value='$hs1[kd_kpasien]' $sel>$hs1[kategori]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>




                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button name="edit" type="submit" class="btn btn-success btn-sm">Simpan</button>
                                <!-- <button class="btn btn-primary btn-sm" type="reset">Reset</button> -->
                                <a href="?hal=data_daftar" class="btn btn-secondary btn-sm" type="button">Kembali</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end form -->
<?php } ?>