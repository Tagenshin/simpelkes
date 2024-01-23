<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data <small>Pasien</small></h2>
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
                            <a href="?hal=input_pasien" class="btn btn-success btn-sm">Tambah Data Pasien</a>
                        </p>
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
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
                                    <th>Act.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../koneksi.php';
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
                                        <td>
                                            <a href="?hal=edit_pasien&nik=<?= $hs['nik']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="?hal=hapus_pasien&nik=<?= $hs['nik']; ?>" class="btn btn-danger btn-sm" onClick="return confirm('Yakin Ingin Menghapus Data ?')">Hapus</a>
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