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
<p align='center'><b>LAPORAN DATA RESEP OBAT<br>
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


                        <table id="" border="1" class="table table-striped table-bordered" style="width:100%">
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
                                ini_set('display_errors', 0);
                                include '../../koneksi.php';
                                $no = 1;
                                $data = mysqli_query($conn, "SELECT * FROM tb_resep,tb_resep_detail,tb_obat WHERE tb_obat.kd_obat=tb_resep_detail.kd_obat and tb_resep.kd_resep=tb_resep_detail.kd_resep AND tb_resep.tgl_resep BETWEEN '$tgl_a' AND '$tgl_b'");
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
                                <?php
                                    $total += ($hs['jlh'] * $hs['hrg_satuan']);
                                } ?>
                                <tr>
                                    <td colspan="5">Total : </td>
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