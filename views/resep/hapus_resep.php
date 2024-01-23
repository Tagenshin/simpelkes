<?php
include '../koneksi.php';
$kd_periksa = $_GET['kd_periksa'];
$data = mysqli_query($conn, "DELETE FROM tb_periksa WHERE kd_periksa='$kd_periksa' ");

if ($data) {
  echo "
                      <script language=javascript>
                        alert('Data berhasil dihapus');
                        document.location.href='?hal=data_periksa';
                      </script>";
} else {
  echo "
                        <script language=javascript>
                          alert('Data gagal dihapus');
                          document.location.href='?hal=data_periksa'; 
                        </script>";
}
