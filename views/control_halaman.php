<?php
$page = (isset($_GET['hal'])) ? $_GET['hal'] : '';

switch ($page) {
    case 'beranda':
        include "beranda.php";
        break;

    case 'kategori_data':
        include "mod_kategori/kategori_data.php";
        break;
    case 'kategori_create':
        include "mod_kategori/kategori_create.php";
        break;
    case 'kategori_edit':
        include "mod_kategori/kategori_edit.php";
        break;
    case 'kategori_delete':
        include "mod_kategori/kategori_delete.php";
        break;

    case 'data_user':
        include "user/data_user.php";
        break;
    case 'input_user':
        include "user/input_user.php";
        break;
    case 'edit_user':
        include "user/edit_user.php";
        break;
    case 'hapus_user':
        include "user/hapus_user.php";
        break;
    case 'edit_pass':
        include "user/edit_pass.php";
        break;


    case 'data_poli':
        include "poli/data_poli.php";
        break;
    case 'input_poli':
        include "poli/input_poli.php";
        break;
    case 'edit_poli':
        include "poli/edit_poli.php";
        break;
    case 'hapus_poli':
        include "poli/hapus_poli.php";
        break;
    case 'lap_poli':
        include "poli/lap_poli.php";
        break;

    case 'data_kpasien':
        include "kategori_pasien/data_kpasien.php";
        break;
    case 'input_kpasien':
        include "kategori_pasien/input_kpasien.php";
        break;
    case 'edit_kpasien':
        include "kategori_pasien/edit_kpasien.php";
        break;
    case 'hapus_kpasien':
        include "kategori_pasien/hapus_kpasien.php";
        break;
    case 'lap_kpasien':
        include "kategori_pasien/lap_kpasien.php";
        break;

    case 'data_obat':
        include "obat/data_obat.php";
        break;
    case 'input_obat':
        include "obat/input_obat.php";
        break;
    case 'edit_obat':
        include "obat/edit_obat.php";
        break;
    case 'hapus_obat':
        include "obat/hapus_obat.php";
        break;
    case 'lap_obat':
        include "obat/lap_obat.php";
        break;

    case 'data_pasien':
        include "pasien/data_pasien.php";
        break;
    case 'input_pasien':
        include "pasien/input_pasien.php";
        break;
    case 'edit_pasien':
        include "pasien/edit_pasien.php";
        break;
    case 'hapus_pasien':
        include "pasien/hapus_pasien.php";
        break;
    case 'lap_pasien':
        include "pasien/lap_pasien.php";
        break;

    case 'data_pegawai':
        include "pegawai/data_pegawai.php";
        break;
    case 'input_pegawai':
        include "pegawai/input_pegawai.php";
        break;
    case 'edit_pegawai':
        include "pegawai/edit_pegawai.php";
        break;
    case 'hapus_pegawai':
        include "pegawai/hapus_pegawai.php";
        break;
    case 'lap_pegawai':
        include "pegawai/lap_pegawai.php";
        break;

    case 'data_daftar':
        include "daftar/data_daftar.php";
        break;
    case 'input_daftar':
        include "daftar/input_daftar.php";
        break;
    case 'edit_daftar':
        include "daftar/edit_daftar.php";
        break;
    case 'hapus_daftar':
        include "daftar/hapus_daftar.php";
        break;
    case 'lap_daftar':
        include "daftar/lap_daftar.php";
        break;

    case 'data_periksa':
        include "periksa/data_periksa.php";
        break;
    case 'data_periksa1':
        include "periksa/data_periksa1.php";
        break;
    case 'input_periksa':
        include "periksa/input_periksa.php";
        break;
    case 'edit_periksa':
        include "periksa/edit_periksa.php";
        break;
    case 'hapus_periksa':
        include "periksa/hapus_periksa.php";
        break;
    case 'lap_periksa':
        include "periksa/lap_periksa.php";
        break;


    case 'data_resep':
        include "resep/data_resep.php";
        break;
    case 'data_resep1':
        include "resep/data_resep1.php";
        break;
    case 'data_resep_detail':
        include "resep/data_resep_detail.php";
        break;
    case 'input_resep_detail':
        include "resep/input_resep_detail.php";
        break;
    case 'input_resep':
        include "resep/input_resep.php";
        break;
    case 'edit_resep':
        include "resep/edit_resep.php";
        break;
    case 'hapus_resep':
        include "resep/hapus_resep.php";
        break;
    case 'lap_resep':
        include "resep/lap_resep.php";
        break;
    case 'data_pilih_obat':
        include "resep/data_pilih_obat.php";
        break;
    case 'detail_resep':
        include "resep/detail_resep.php";
        break;

    case 'apoteker_resep':
        include "resep/apoteker_resep.php";
        break;
    case 'detail_resep_apoteker':
        include "resep/detail_resep_apoteker.php";
        break;


    case 'data_bayar':
        include "bayar/data_bayar.php";
        break;
    case 'data_bayar1':
        include "bayar/data_bayar1.php";
        break;
    case 'data_bayar_detail':
        include "bayar/data_bayar_detail.php";
        break;
    case 'input_bayar_detail':
        include "bayar/input_bayar_detail.php";
        break;
    case 'input_bayar':
        include "bayar/input_bayar.php";
        break;
    case 'edit_bayar':
        include "bayar/edit_bayar.php";
        break;
    case 'hapus_bayar':
        include "bayar/hapus_bayar.php";
        break;
    case 'lap_bayar':
        include "bayar/lap_bayar.php";
        break;
    case 'data_pilih_obat':
        include "bayar/data_pilih_obat.php";
        break;
    case 'detail_bayar':
        include "bayar/detail_bayar.php";
        break;
    case 'detail_resep1':
        include "bayar/detail_resep1.php";
        break;
    case 'detail_resep2':
        include "bayar/detail_resep2.php";
        break;

    default:
        include "beranda.php";
}
