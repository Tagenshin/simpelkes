<?php
include '../koneksi.php';
$nik = $_GET['nik'];
$data = mysqli_query($conn, "DELETE FROM tb_pasien WHERE nik='$nik' ");

if ($data) {
  echo "
                      <script language=javascript>
                        alert('Data berhasil dihapus');
                        document.location.href='?hal=data_pasien';
                      </script>";
} else {
  echo "
                        <script language=javascript>
                          alert('Data gagal dihapus');
                          document.location.href='?hal=data_pasien'; 
                        </script>";
}
