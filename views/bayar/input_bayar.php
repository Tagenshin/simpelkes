<?php
// koneksi database
include '../koneksi.php';
if (isset($_POST['input'])) {
  $kd_resep = $_POST['kd_resep'];
  // $tot_biaya = $_POST['tot_biaya'] + $_POST['biaya_penanganan'];
  $tot_biaya = $_POST['tot_biaya'];
  $tgl_trans = $_POST['tgl_trans'];


  // $query = mysqli_query($conn, "SELECT * FROM tb_pasien WHERE nm_pasien = '$nm_pasien'");
  // $hasil = mysqli_fetch_assoc($query);
  // if ($hasil) {

  //     echo "
  // <script language=javascript>
  //   alert('Nama tersebut sudah ada, silakan gunakan yang lain');
  //   document.location.href='?hal=input_pasien';
  // </script>";
  //     return false;
  // }

  // menginput data ke database
  $query = mysqli_query($conn, "INSERT INTO tb_bayar VALUES('', '$kd_resep','$tot_biaya','$tgl_trans','0')");

  if ($query) {

    mysqli_query($conn, "UPDATE tb_resep SET sts_resep='1' WHERE kd_resep='$kd_resep'");

    echo "
        <script language=javascript>
          alert('Data berhasil disimpan');
          document.location.href='?hal=data_bayar';
        </script>";
  } else {
    echo "
          <script language=javascript>
            alert('Data Gagal Ditambah');
            document.location.href='?hal=data_bayar'; 
          </script>";
  }
}
