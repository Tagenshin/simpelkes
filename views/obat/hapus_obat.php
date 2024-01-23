<?php
include '../koneksi.php';
$kd_obat = $_GET['kd_obat'];
$data = mysqli_query($conn, "DELETE FROM tb_obat WHERE kd_obat='$kd_obat' ");

if ($data) {
  echo "
                      <script language=javascript>
                        alert('Data berhasil dihapus');
                        document.location.href='?hal=data_obat';
                      </script>";
} else {
  echo "
                        <script language=javascript>
                          alert('Data gagal dihapus');
                          document.location.href='?hal=data_obat'; 
                        </script>";
}
