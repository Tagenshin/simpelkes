<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Data User <small>

                </small></h2>
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
                            <a href="?hal=input_user" class="btn btn-success btn-sm">Tambah Data User</a>
                        </p>
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Jenis User</th>
                                    <th>Jenis Poli</th>
                                    <th>Act.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../koneksi.php';
                                $no = 1;
                                $data = mysqli_query($conn, "SELECT * FROM tb_user,tb_pegawai WHERE tb_pegawai.nip=tb_user.nip ");
                                // $data = mysqli_query($conn, "SELECT * FROM tb_user,tb_poli WHERE tb_poli.kd_poli=tb_user.kd_poli");
                                // $data = mysqli_query($conn, "SELECT * FROM tb_user,tb_pegawai,tb_poli WHERE tb_pegawai.nip=tb_user.nip and tb_poli.kd_poli=tb_user.kd_poli");
                                // $data = mysqli_query($conn, "SELECT * FROM tb_user,tb_pegawai WHERE tb_pegawai.nip=tb_user.nip");
                                while ($hs = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $hs['nip']; ?></td>
                                        <td><?= $hs['nm_pegawai']; ?></td>
                                        <td><?= $hs['username']; ?></td>
                                        <td><?= $hs['email']; ?></td>
                                        <td><?= $hs['level']; ?></td>
                                        <td><?= $hs['nm_poli']; ?></td>
                                        <td>
                                            <a href="?hal=edit_user&nip=<?= $hs['nip']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="?hal=hapus_user&nip=<?= $hs['nip']; ?>" class="btn btn-danger btn-sm" onClick="return confirm('Yakin Ingin Menghapus Data ?')">Hapus</a>
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