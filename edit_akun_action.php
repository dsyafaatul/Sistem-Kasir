<?php
include("koneksi.php");
$no_pegawai_in = $_GET['no_pegawai_in'];
$no_pegawai_out = $_GET['no_pegawai_out'];
$nama_kasir = $_GET['nama_kasir'];
$jenis_kelamin = $_GET['jenis_kelamin'];
$tempat_lahir = $_GET['tempat_lahir'];
$tanggal_lahir = $_GET['tanggal_lahir'];
$alamat = $_GET['alamat'];
$no_telepon = $_GET['no_telepon'];
$link = $_GET['link'];
$action = $_GET['action'];
	if(!empty($action)){
		if(empty($no_pegawai_in) OR empty($nama_kasir) OR empty($jenis_kelamin) OR empty($tempat_lahir) OR empty($tanggal_lahir) OR empty($alamat) OR empty($no_telepon)){
			header("location: index.php?link=$link&alert=gagal");
		}else{
		$edit_akun__query = mysql_query("UPDATE tabel_kasir SET no_pegawai='$no_pegawai_in',nama_kasir='$nama_kasir',jenis_kelamin='$jenis_kelamin',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',alamat='$alamat',no_telepon='$no_telepon' WHERE no_pegawai='$no_pegawai_out'");
			if($edit_akun__query){
				if($_SESSION['no_pegawai']==$no_pegawai_out){
					$_SESSION['no_pegawai'] = $no_pegawai_in;
				}
				header("location: index.php?link=$link&action=&alert=berhasil");
			}else{
				header("location: index.php?link=$link&alert=gagal");
			}
		}
	}else{
		header("location: index.php?link=$link&alert=gagal");
	}
?>