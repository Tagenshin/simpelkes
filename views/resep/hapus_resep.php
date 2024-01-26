<?php
include '../koneksi.php';
$kd_resep = $_GET['kd_resep'];
$data = mysqli_query($conn, "DELETE FROM tb_resep WHERE kd_resep='$kd_resep' ");

if ($data) {
  echo "
                      <script language=javascript>
                        alert('Data berhasil dihapus');
                        document.location.href='?hal=data_resep';
                      </script>";
} else {
  echo "
                        <script language=javascript>
                          alert('Data gagal dihapus');
                          document.location.href='?hal=data_resep'; 
                        </script>";
}
