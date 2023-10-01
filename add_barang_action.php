<?php
include("koneksi.php");
$kode_barang = $_GET['kode_barang'];
$nama_barang = $_GET['nama_barang'];
$merk_barang = $_GET['merk_barang'];
$harga_barang = $_GET['harga_barang'];
$action = $_GET['action'];
	if(!empty($action)){
		if(empty($kode_barang) OR empty($nama_barang) OR empty($merk_barang) OR empty($harga_barang)){
			header("location: index.php?link=list_barang&alert=gagal");
		}else{
		$tambah_barang_query = mysql_query("INSERT INTO tabel_barang(kode_barang,nama_barang,merk_barang,harga_barang)VALUES('$kode_barang','$nama_barang','$merk_barang','$harga_barang')");
			if($tambah_barang_query){
				header("location: index.php?link=list_barang&alert=berhasil");
			}else{
				header("location: index.php?link=list_barang&alert=gagal");
			}
		}
	}else{
		header("location: index.php?link=list_barang&alert=gagal");
	}
?>