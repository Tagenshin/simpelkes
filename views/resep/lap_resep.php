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
                        <form action="resep/cetak_resep1.php" target="_blank" method="post">
                            <div class="col-md-6 col-sm-12 col-lg-2 ">
                                <input name="tgl_a" type="date" id="tgl_a" required="required" class="form-control" value="" placeholder="Tgl. Periode">
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-2 ">
                                <input name="tgl_b" type="date" id="tgl_b" required="required" class="form-control" value="" placeholder="Tgl. Periode">
                            </div>

                            <button type="submit" class="btn btn-success btn-sm">Cetak Data Resep</button>
                        </form>
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
                                $data = mysqli_query($conn, "SELECT * FROM tb_resep,tb_resep_detail,tb_obat WHERE tb_obat.kd_obat=tb_resep_detail.kd_obat and tb_resep.kd_resep=tb_resep_detail.kd_resep");
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