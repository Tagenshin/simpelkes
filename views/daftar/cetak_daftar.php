<script>
    window.print();
</script>
<?php ini_set('display_errors', 1); ?>

<?php
require_once __DIR__ . '../../mpdf_v8.0.3/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$mpdf->AddPage("P", "", "", "", "", "15", "15", "15", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
ob_start();
?>
<?php $tgl_a = $_POST['tgl_a']; ?>
<?php $tgl_b = $_POST['tgl_b']; ?>
<p align='center'><b>LAPORAN DATA PENDAFTARAN BEROBAT<br>
    </b></p>
<hr width="80%">
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h4>Periode Tgl : <small><?= $tgl_a; ?> - <?= $tgl_b; ?></small></h4>

            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">

                        <table id="datatable" border="1" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Daftar</th>
                                    <th>No. KTP</th>
                                    <th>Nama</th>
                                    <th>Jenis Layanan</th>
                                    <th>Tujuan Poli</th>
                                    <th>Tgl. Daftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../../koneksi.php';
                                $no = 1;
                                $data = mysqli_query($conn, "SELECT * FROM tb_poli,tb_pasien,tb_kpasien,tb_daftar WHERE tb_kpasien.kd_kpasien=tb_daftar.kd_kpasien and tb_pasien.nik=tb_daftar.nik and tb_poli.kd_poli=tb_daftar.kd_poli AND tb_daftar.tgl_berobat BETWEEN '$tgl_a' AND '$tgl_b'");
                                while ($hs = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $hs['kd_kunj']; ?></td>
                                        <td><?= $hs['nik']; ?></td>
                                        <td><?= $hs['nm_pasien']; ?></td>
                                        <td><?= $hs['kategori']; ?></td>
                                        <td><?= $hs['nm_poli']; ?></td>
                                        <td><?= $hs['tgl_berobat']; ?></td>

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