<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data <small>Obat</small></h2>
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
                            <a href="obat/cetak_obat.php" target="_blank" class="btn btn-success btn-sm">Cetak Data </a>
                        </p>
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Obat</th>
                                    <th>Deskripsi</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Ketersediaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../koneksi.php';
                                $no = 1;
                                $data = mysqli_query($conn, "SELECT * FROM tb_obat");
                                while ($hs = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $hs['kd_obat']; ?></td>
                                        <td><?= $hs['nm_obat']; ?></td>
                                        <td><?= $hs['satuan']; ?></td>
                                        <td><?= $hs['harga']; ?></td>
                                        <td><?= $hs['ketersediaan']; ?></td>

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