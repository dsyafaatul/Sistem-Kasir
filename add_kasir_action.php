<?php
include("koneksi.php");
$no_pegawai = $_GET['no_pegawai'];
$nama_kasir = $_GET['nama_kasir'];
$jenis_kelamin = $_GET['jenis_kelamin'];
$tempat_lahir = $_GET['tempat_lahir'];
$tanggal_lahir = $_GET['tanggal_lahir'];
$alamat = $_GET['alamat'];
$no_telepon = $_GET['no_telepon'];
$action = $_GET['action'];
	if(!empty($action)){
		if(empty($no_pegawai) OR empty($nama_kasir) OR empty($jenis_kelamin) OR empty($tempat_lahir) OR empty($tanggal_lahir) OR empty($alamat) OR empty($no_telepon)){
			header("location: index.php?link=list_kasir&alert=gagal");
		}else{
		$tambah_kasir_query = mysql_query("INSERT INTO tabel_kasir(no_pegawai,nama_kasir,jenis_kelamin,tempat_lahir,tanggal_lahir,alamat,no_telepon)VALUES('$no_pegawai','$nama_kasir','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$alamat','$no_telepon')");
			if($tambah_kasir_query){
				header("location: index.php?link=list_kasir&alert=berhasil");
			}else{
				header("location: index.php?link=list_kasir&alert=gagal");
			}
		}
	}else{
		header("location: index.php?link=list_kasir&alert=gagal");
	}
?>