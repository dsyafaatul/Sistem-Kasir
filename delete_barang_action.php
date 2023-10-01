<?php
include("koneksi.php");
$kode_barang = $_GET['kode_barang'];
$action = $_GET['action'];
	if(!empty($action)){
		$delete_barang_query = mysql_query("DELETE FROM tabel_barang WHERE kode_barang='$kode_barang'");
		if($delete_barang_query){
			header("location: index.php?link=list_barang&alert=berhasil");
		}else{
			header("location: index.php?link=list_barang&alert=gagal");
		}
	}else{
		header("location: index.php?link=list_barang&alert=gagal");
	}
?>