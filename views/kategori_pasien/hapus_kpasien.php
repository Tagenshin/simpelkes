<?php
include '../koneksi.php';
$kd_kpasien = $_GET['kd_kpasien'];
$data = mysqli_query($conn, "DELETE FROM tb_kpasien WHERE kd_kpasien='$kd_kpasien' ");

if ($data) {
  echo "
                      <script language=javascript>
                        alert('Data berhasil dihapus');
                        document.location.href='?hal=data_kpasien';
                      </script>";
} else {
  echo "
                        <script language=javascript>
                          alert('Data gagal dihapus');
                          document.location.href='?hal=data_kpasien'; 
                        </script>";
}
