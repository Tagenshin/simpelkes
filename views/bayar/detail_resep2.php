<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data <small>Detail Resep Obat</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <p class="text-muted font-13 m-b-30">
                            <a href="?hal=data_bayar" class="btn btn-success btn-sm">Kembali</a>
                            <a href="bayar/cetak_kwitansi.php?kd_bayar=<?= $_GET['kd_bayar']; ?>&kd_resep=<?= $_GET['kd_resep']; ?>&nm_pasien=<?= $_GET['nm_pasien']; ?>&tgl_trans=<?= $_GET['tgl_trans']; ?>&nm_poli=<?= $_GET['nm_poli']; ?>" class="btn btn-success btn-sm" target="_blank">Cetak Kwitansi</a>
                        </p>
                        <table id="" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Obat</th>
                                    <th>Nama Obat</th>
                                    <th>Jlh. </th>
                                    <th>Hrg. Satuan (Rp)</th>
                                    <th>Jumlah (Rp)</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../koneksi.php';
                                $no = 1;
                                $bayar = $_GET['tot_biaya'];
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
                                        <td align="center"><?= $hs['ket_detail']; ?></td>

                                    </tr>
                                <?php $total += ($hs['jlh'] * $hs['hrg_satuan']);
                                    $penanganan += ($hs['jlh'] * $hs['hrg_satuan']) - ($biaya);
                                } ?>
                                <tr>
                                    <td colspan="5">Total : </td>
                                    <td align="right"> <?= "Rp " . number_format($total, 2, ',', '.') . ",-"; ?>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="5">Biaya Penanganan : </td>
                                    <td align="right"> <?= "Rp " . number_format($penanganan, 2, ',', '.') . ",-"; ?>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="5">Total Bayar: </td>
                                    <td align="right"> <?= "Rp " . number_format($total, 2, ',', '.') . ",-"; ?>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>