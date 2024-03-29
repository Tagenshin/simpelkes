<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data <small>Resep Obat</small></h2>
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
                            <a href="?hal=data_bayar" class="btn btn-success btn-sm">Kembali</a>
                        </p>
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Resep</th>
                                    <th>Nama</th>
                                    <th>Keterangan</th>
                                    <th colspan="">Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../koneksi.php';
                                $no = 1;
                                // $data = mysqli_query($conn, "SELECT * FROM tb_poli,tb_pasien,tb_kpasien,tb_daftar,tb_periksa,tb_resep WHERE tb_kpasien.kd_kpasien=tb_daftar.kd_kpasien and tb_pasien.nik=tb_daftar.nik and tb_periksa.kd_periksa=tb_resep.kd_periksa and tb_poli.kd_poli=tb_daftar.kd_poli && tb_resep.sts_resep=0 ");
                                $data = mysqli_query($conn, "SELECT * FROM tb_pasien, tb_daftar, tb_periksa, tb_resep WHERE tb_pasien.nik=tb_daftar.nik and tb_daftar.kd_kunj=tb_periksa.kd_kunj and tb_periksa.kd_periksa=tb_resep.kd_periksa and tb_resep.sts_resep=0 ");
                                while ($hs = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $hs['kd_resep']; ?></td>
                                        <td><?= $hs['nm_pasien']; ?></td>
                                        <td><?= $hs['ket_resep']; ?></td>
                                        <td>

                                            <a href="?hal=detail_resep1&kd_resep=<?= $hs['kd_resep']; ?>&nm_pasien=<?= $hs['nm_pasien']; ?>" class="btn btn-success btn-sm">Detail Resep</a>
                                            <a href="?hal=edit_resep&kd_resep=<?= $hs['kd_resep']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="?hal=hapus_resep&kd_resep=<?= $hs['kd_resep']; ?>" class="btn btn-danger btn-sm" onClick="return confirm('Yakin Ingin Menghapus Data ?')">Hapus</a>
                                        </td>
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