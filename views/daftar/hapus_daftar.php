<?php
include '../koneksi.php';
$kd_kunj = $_GET['kd_kunj'];
$data = mysqli_query($conn, "DELETE FROM tb_daftar WHERE kd_kunj='$kd_kunj' ");

if ($data) {
  echo "
                      <script language=javascript>
                        alert('Data berhasil dihapus');
                        document.location.href='?hal=data_daftar';
                      </script>";
} else {
  echo "
                        <script language=javascript>
                          alert('Data gagal dihapus');
                          document.location.href='?hal=data_daftar'; 
                        </script>";
}
