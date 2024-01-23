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
                            <a href="?hal=data_bayar1" class="btn btn-success btn-sm">Kembali</a>
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
                                } ?>
                                <tr>
                                    <td colspan="5">Total Bayar : </td>
                                    <td align="right"> <?= "Rp " . number_format($total, 2, ',', '.') . ",-"; ?>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="ln_solid"></div>
                        <form action="?hal=input_bayar" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kd_resep">Kode Resep <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="kd_resep" type="text" id="kd_resep" required="required" class="form-control" readonly value="<?= $_GET['kd_resep']; ?>">
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tot_biaya">Total Bayar <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="tot_biaya" type="hidden" id="tot_biaya" required="required" class="form-control" readonly value="<?= $total; ?>">
                                    <input type="text" id="tot_biaya" required="required" class="form-control" readonly value="<?= "Rp " . number_format($total, 2, ',', '.') . ",-"; ?>">
                                </div>
                            </div>
                            <!-- <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="biaya_penanganan">Biaya Penanganan <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="biaya_penanganan" type="text" id="biaya_penanganan" required="required" class="form-control" value="0">
                                </div>
                            </div> -->
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tgl_trans">Tgl. Transaksi <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="tgl_trans" type="date" id="tgl_trans" required="required" class="form-control" value="<?= date('Y-m-d'); ?>">
                                </div>
                            </div>


                            <!-- <div class="ln_solid"></div> -->
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button name="input" type="submit" class="btn btn-success btn-sm">Simpan</button>
                                    <button class="btn btn-primary btn-sm" type="reset">Reset</button>
                                    <a href="?hal=data_pilih_obat&kd_resep=<?= $kd_resep; ?>" class="btn btn-secondary btn-sm" type="button">Kembali</a>
                                </div>
                            </div>

                        </form>

                        <div class="ln_solid"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>