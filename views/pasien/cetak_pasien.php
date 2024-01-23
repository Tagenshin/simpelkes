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
<p align='center'><b>LAPORAN DATA PASIEN<br>
    </b></p>
<hr width="80%">
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <!-- <div class="x_title">
            <h2>Data <small>Pasien</small></h2>

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
                                    <th>No. KTP</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <!-- <th>Kategori</th> -->
                                    <th>Tgl. Lahir</th>
                                    <th>No. Telp</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../../koneksi.php';
                                $no = 1;
                                $data = mysqli_query($conn, "SELECT * FROM tb_pasien ");
                                while ($hs = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $hs['nik']; ?></td>
                                        <td><?= $hs['nm_pasien']; ?></td>
                                        <td><?= $hs['jk']; ?></td>
                                        <td><?= $hs['agama']; ?></td>
                                        <!-- <td><?= $hs['kategori']; ?></td> -->
                                        <td><?= $hs['tgl_lahir']; ?></td>
                                        <td><?= $hs['no_tlp']; ?></td>
                                        <td><?= $hs['alamat']; ?></td>

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