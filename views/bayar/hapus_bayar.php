<?php
include '../koneksi.php';
$kd_bayar = $_GET['kd_bayar'];
$data = mysqli_query($conn, "DELETE FROM tb_bayar WHERE kd_bayar='$kd_bayar' ");

if ($data) {
  echo "
                      <script language=javascript>
                        alert('Data berhasil dihapus');
                        document.location.href='?hal=data_bayar';
                      </script>";
} else {
  echo "
                        <script language=javascript>
                          alert('Data gagal dihapus');
                          document.location.href='?hal=data_bayar'; 
                        </script>";
}
