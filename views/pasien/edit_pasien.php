<?php
include '../koneksi.php';
if (isset($_POST['edit'])) {
    $nik = $_POST['nik'];
    $nm_pasien = $_POST['nm_pasien'];
    $jk = $_POST['jk'];
    $agama = $_POST['agama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $no_tlp = $_POST['no_tlp'];
    $alamat = $_POST['alamat'];

    $data = mysqli_query($conn, "UPDATE tb_pasien SET nik='$nik',nm_pasien='$nm_pasien',jk='$jk',agama='$agama',tgl_lahir='$tgl_lahir',no_tlp='$no_tlp',alamat='$alamat' WHERE nik='$nik'");
    if ($data) {
        echo "
        <script language=javascript>
          alert('Data Berhasil diedit');
          document.location.href='?hal=data_pasien';
        </script>";
    } else {
        echo "
          <script language=javascript>
            alert('Data Gagal Diedit');
            document.location.href='?hal=edit_pasien'; 
          </script>";
    }
}
?>

<?php
include '../koneksi.php';
$nik = $_GET['nik'];
$data = mysqli_query($conn, "SELECT * FROM tb_pasien WHERE nik='$nik'");
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
                                <input name="nik" type="text" id="nik" required="required" class="form-control" readonly value="<?= $hs['nik']; ?>">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nm_pasien">Nama Pasien <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input name="nm_pasien" type="text" id="nm_pasien" required="required" class="form-control" value="<?= $hs['nm_pasien']; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="jk">Jenis Kelamin<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select id="jk" name="jk" required="required" class="form-control">
                                    <option></option>
                                    <option <?php if ($hs['jk'] == 'Laki-Laki') {
                                                echo "selected";
                                            } ?> value='Laki-Laki'>Laki-Laki</option>
                                    <option <?php if ($hs['jk'] == 'Perempuan') {
                                                echo "selected";
                                            } ?> value='Perempuan'>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="agama">Agama<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select id="agama" name="agama" required="required" class="form-control">
                                    <option></option>

                                    <option <?php if ($hs['agama'] == 'Islam') {
                                                echo "selected";
                                            } ?> value='Islam'>Islam</option>
                                    <option <?php if ($hs['agama'] == 'Kristen Katolik') {
                                                echo "selected";
                                            } ?> value='Kristen Katolik'>Kristen Katolik</option>
                                    <option <?php if ($hs['agama'] == 'Kristen Protestan') {
                                                echo "selected";
                                            } ?> value='Kristen Protestan'>Kristen Protestan</option>
                                    <option <?php if ($hs['agama'] == 'Budha') {
                                                echo "selected";
                                            } ?> value='Budha'>Budha</option>
                                    <option <?php if ($hs['agama'] == 'Hindu') {
                                                echo "selected";
                                            } ?> value='Hindu'>Hindu</option>
                                    <option <?php if ($hs['agama'] == 'Lainnya') {
                                                echo "selected";
                                            } ?> value='Lainnya'>Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="tgl_lahir">Tanggal Lahir <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input name="tgl_lahir" type="date" id="tgl_lahir" required="required" class="form-control" value="<?= $hs['tgl_lahir']; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_tlp">Nomor Telp <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input name="no_tlp" type="text" id="no_tlp" required="required" class="form-control" value="<?= $hs['no_tlp']; ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat">Alamat <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea name="alamat" id="alamat" required="required" class="form-control"><?= $hs['alamat']; ?></textarea>
                            </div>
                        </div>



                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button name="edit" type="submit" class="btn btn-success btn-sm">Simpan</button>
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
<?php } ?>