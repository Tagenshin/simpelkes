<script>
  window.print();
</script>
<?php ini_set('display_errors', 0); ?>

<?php
require_once __DIR__ . '../../mpdf_v8.0.3/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$mpdf->AddPage("P", "", "", "", "", "15", "15", "15", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
ob_start();
?>
<p align='center'><b>LAPORAN DATA OBAT KELUAR<br>
  </b></p>
<hr width="80%">
<div class="col-md-12 col-sm-12 ">
  <div class="x_panel">
    <!-- <div class="x_title">
            <h2>Data <small>Obat</small></h2>

            <div class="clearfix"></div>
        </div> -->
    <div class="x_content">
      <div class="row">
        <div class="col-sm-12">
          <div class="card-box table-responsive">

            <table id="datatable" border="1" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>ID Obat</th>
                  <th>Tanggal Keluar</th>
                  <th>Deskripsi</th>
                  <th>Satuan</th>
                  <th>Harga</th>
                  <th>Obat Keluar</th>
                  <th>Sisa Obat</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include '../../koneksi.php';
                $no = 1;
                $data = mysqli_query($conn, "SELECT * FROM tb_obat, tb_resep_detail WHERE tb_obat.kd_obat = tb_resep_detail.kd_obat");
                while ($hs = mysqli_fetch_array($data)) {
                ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $hs['kd_obat']; ?></td>
                    <td><?= date_format(date_create($hs['tgl_dt_resep']), 'd M y H:i:s'); ?></td>
                    <td><?= $hs['nm_obat']; ?></td>
                    <td><?= $hs['satuan']; ?></td>
                    <td><?= $hs['harga']; ?></td>
                    <td><?= $hs['jlh']; ?></td>
                    <td><?= $hs['sisa_obat']; ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
?>