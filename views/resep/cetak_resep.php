<?php ini_set('display_errors', 0); ?>
<script>
    window.print();
</script>
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Resep Obat</h2>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="kd_periksa">Kode Resep : <?= $_GET['kd_resep']; ?>
            </label>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="kd_periksa">Nama Pasien : <?= $_GET['nm_pasien']; ?>
            </label>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="kd_periksa">Asal Poli : <?= $_GET['nm_poli']; ?>
            </label>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="kd_periksa">Tgl. Transaksi : <?= $_GET['tgl_resep']; ?>
            </label>
        </div>
        <hr>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">

                        <table border="1" id="" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Obat</th>
                                    <th>Nama Obat</th>
                                    <th>Jlh.</th>
                                    <!-- <th>Hrg. Satuan</th>
                                    <th>Jumlah</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../../koneksi.php';
                                $no = 1;
                                $data = mysqli_query($conn, "SELECT * FROM tb_resep,tb_resep_detail,tb_obat WHERE tb_obat.kd_obat=tb_resep_detail.kd_obat and tb_resep.kd_resep=tb_resep_detail.kd_resep and tb_resep.kd_resep='$_GET[kd_resep]'");
                                while ($hs = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $hs['kd_obat']; ?></td>
                                        <td><?= $hs['nm_obat']; ?></td>
                                        <td><?= $hs['jlh']; ?> <?= $hs['satuan']; ?></td>
                                        <!-- <td><?= $hs['hrg_satuan']; ?></td>
                                        <td><?= $hs['hrg_satuan'] * $hs['jlh']; ?></td> -->

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