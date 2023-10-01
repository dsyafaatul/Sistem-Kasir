<?php
include("koneksi.php");
$kode_barang_in = $_GET['kode_barang_in'];
$kode_barang_out = $_GET['kode_barang_out'];
$nama_barang = $_GET['nama_barang'];
$merk_barang = $_GET['merk_barang'];
$harga_barang = $_GET['harga_barang'];
$q = $_GET['q'];
$page = $_GET['page'];
$action = $_GET['action'];
	if(!empty($action)){
		if(empty($kode_barang_in) OR empty($nama_barang) OR empty($merk_barang) OR empty($harga_barang)){
			header("location: index.php?link=list_barang&alert=gagal");
		}else{
		$edit_barang_query = mysql_query("UPDATE tabel_barang SET kode_barang='$kode_barang_in',nama_barang='$nama_barang',merk_barang='$merk_barang',harga_barang='$harga_barang' WHERE kode_barang='$kode_barang_out'");
			if($edit_barang_query){
				header("location: index.php?link=list_barang&q=$q&page=$page&alert=berhasil");
			}else{
				header("location: index.php?link=list_barang&alert=gagal");
			}
		}
	}else{
		header("location: index.php?link=list_barang&alert=gagal");
	}
?>