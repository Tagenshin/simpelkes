<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data <small>Pendaftaran Pelayanan Berobat</small></h2>
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
                        <form action="daftar/cetak_daftar.php" target="_blank" method="post">
                            <div class="col-md-6 col-sm-12 col-lg-2 ">
                                <input name="tgl_a" type="date" id="tgl_a" required="required" class="form-control" value="" placeholder="Tgl. Periode">
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-2 ">
                                <input name="tgl_b" type="date" id="tgl_b" required="required" class="form-control" value="" placeholder="Tgl. Periode">
                            </div>

                            <button type="submit" class="btn btn-success btn-sm">Cetak Data Pendaftaran</button>
                        </form>
                        </p>
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Daftar</th>
                                    <th>No. KTP</th>
                                    <th>Nama</th>
                                    <th>Jenis Layanan</th>
                                    <th>Tujuan Poli</th>
                                    <th>Tgl. Daftar</th>
                                    <th colspan="2">Act</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../koneksi.php';
                                $no = 1;
                                $data = mysqli_query($conn, "SELECT * FROM tb_poli,tb_pasien,tb_kpasien,tb_daftar WHERE tb_kpasien.kd_kpasien=tb_daftar.kd_kpasien and tb_pasien.nik=tb_daftar.nik and tb_poli.kd_poli=tb_daftar.kd_poli");
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