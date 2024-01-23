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
<?php $tgl_a = $_POST['tgl_a']; ?>
<?php $tgl_b = $_POST['tgl_b']; ?>
<p align='center'><b>LAPORAN DATA TRANSAKSI PEMBAYARAN<br>
    </b></p>
<hr width="80%">
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h4>Periode Tgl : <small><?= $tgl_a; ?> s/d <?= $tgl_b; ?></small></h4>
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
                                    <th>Kode Resep</th>
                                    <th>Nama</th>
                                    <th>Keterangan</th>
                                    <th>Total Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../../koneksi.php';
                                $no = 1;
                                $data = mysqli_query($conn, "SELECT * FROM tb_pasien,tb_daftar,tb_periksa, tb_bayar,tb_resep WHERE tb_pasien.nik=tb_daftar.nik AND tb_daftar.kd_kunj=tb_periksa.kd_kunj AND tb_periksa.kd_periksa=tb_resep.kd_periksa AND tb_resep.kd_resep=tb_bayar.kd_resep AND tb_bayar.tgl_trans BETWEEN '$tgl_a' AND '$tgl_b'");
                                // $data = mysqli_query($conn, "SELECT * FROM tb_poli,tb_pasien,tb_kpasien,tb_daftar,tb_periksa,tb_resep,tb_resep_detail,tb_bayar WHERE tb_kpasien.kd_kpasien=tb_daftar.kd_kpasien and tb_pasien.nik=tb_daftar.nik and tb_periksa.kd_periksa=tb_resep.kd_periksa and tb_poli.kd_poli=tb_daftar.kd_poli && tb_resep.kd_resep=tb_bayar.kd_resep && tb_resep.kd_resep=tb_resep_detail.kd_resep AND tb_bayar.tgl_trans BETWEEN '$tgl_a' AND '$tgl_b' GROUP BY tb_bayar.kd_bayar");
                                while ($hs = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $hs['kd_resep']; ?></td>
                                        <td><?= $hs['nm_pasien']; ?></td>
                                        <td><?= $hs['ket_resep']; ?></td>
                                        <td align="right"><?= "Rp " . number_format($hs['tot_biaya'], 2, ',', '.') . ",-"; ?></td>

                                    </tr>
                                <?php $total += ($hs['tot_biaya']);
                                } ?>
                                <tr>
                                    <td colspan="4">Total Bayar : </td>
                                    <td align="right"> <?= "Rp " . number_format($total, 2, ',', '.') . ",-"; ?>
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
<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
?>