<?php
include '../koneksi.php';
$kd_poli = $_GET['kd_poli'];
$data = mysqli_query($conn, "DELETE FROM tb_poli WHERE kd_poli='$kd_poli' ");

if ($data) {
    echo "
                      <script language=javascript>
                        alert('Data berhasil dihapus');
                        document.location.href='?hal=data_poli';
                      </script>";
} else {
    echo "
                        <script language=javascript>
                          alert('Data gagal dihapus');
                          document.location.href='?hal=data_poli'; 
                        </script>";
}
