<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data <small>Obat Keluar</small></h2>
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
                            <a href="?hal=cetak_obat_keluar" target="_blank" class="btn btn-success btn-sm">Cetak</a>
                        </p>
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
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

                                    <!-- <th>Act.</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../koneksi.php';
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

                                        <!-- <td>
                                            <a href="?hal=edit_obat&kd_obat=<?= $hs['kd_obat']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="?hal=hapus_obat&kd_obat=<?= $hs['kd_obat']; ?>" class="btn btn-danger btn-sm" onClick="return confirm('Yakin Ingin Menghapus Data ?')">Hapus</a>
                                        </td> -->
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