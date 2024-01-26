<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">
    <div class="x_title">
      <h2>Data <small>Detail Resep Obat</small></h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li> -->
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class="row">
        <div class="col-sm-12">
          <div class="card-box table-responsive">
            <p class="text-muted font-13 m-b-30">
              <a href="?hal=apoteker_resep" class="btn btn-success btn-sm">Kembali</a>
              <a href="resep/cetak_resep.php?kd_resep=<?= $_GET['kd_resep']; ?>&nm_pasien=<?= $_GET['nm_pasien']; ?>&nm_poli=<?= $_GET['nm_poli']; ?>&tgl_resep=<?= $_GET['tgl_resep']; ?>" class="btn btn-success btn-sm" target="_blank">Cetak Resep</a>
            </p>
            <p>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="kd_periksa">Kode Resep <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 ">
                <input name="kd_periksa" type="text" id="kd_periksa" required="required" class="form-control" readonly value="<?= $_GET['kd_resep']; ?>">
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="kd_periksa">Nama Pasien <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 ">
                <input name="kd_periksa" type="text" id="kd_periksa" required="required" class="form-control" readonly value="<?= $_GET['nm_pasien']; ?>">
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="katogori">Kategori Pasien <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 ">
                <input name="katogori" type="text" id="katogori" required="required" class="form-control" readonly value="<?= $_GET['kategori']; ?>">
              </div>
            </div>
            </p>
            <table id="" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Obat</th>
                  <th>Nama Obat</th>
                  <th>Jlh.</th>
                  <th>Hrg. Satuan</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include '../koneksi.php';
                $no = 1;
                $data = mysqli_query($conn, "SELECT * FROM tb_resep,tb_resep_detail,tb_obat WHERE tb_obat.kd_obat=tb_resep_detail.kd_obat and tb_resep.kd_resep=tb_resep_detail.kd_resep and tb_resep.kd_resep='$_GET[kd_resep]'");
                while ($hs = mysqli_fetch_array($data)) {
                ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $hs['kd_obat']; ?></td>
                    <td><?= $hs['nm_obat']; ?></td>
                    <td><?= $hs['jlh']; ?> <?= $hs['satuan']; ?></td>
                    <td align="right"><?= number_format($hs['hrg_satuan'], 2, ',', '.') . ",-"; ?></td>
                    <td align="right"><?= number_format($hs['hrg_satuan'] * $hs['jlh'], 2, ',', '.') . ",-"; ?></td>

                  </tr>
                <?php $total += ($hs['jlh'] * $hs['hrg_satuan']);
                } ?>
                <tr>
                  <?php
                  if ($_GET['kategori'] == "ASKES") {
                    $total = 'GRATIS';
                  } else {
                    $total = "Rp " . number_format($total, 2, ',', '.') . ",-";
                  }
                  ?>
                  <td colspan="5">Total : </td>
                  <td align="right"> <?= $total; ?>
                  </td>
                </tr>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>