<?php
include '../koneksi.php';
$nip = $_GET['nip'];
$data = mysqli_query($conn, "DELETE FROM tb_pegawai WHERE nip='$nip' ");

if ($data) {
  echo "
                      <script language=javascript>
                        alert('Data berhasil dihapus');
                        document.location.href='?hal=data_pegawai';
                      </script>";
} else {
  echo "
                        <script language=javascript>
                          alert('Data gagal dihapus');
                          document.location.href='?hal=data_pegawai'; 
                        </script>";
}
