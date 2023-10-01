<?php
include("koneksi.php");
$kode_transaksi = $_GET['kode_transaksi'];
$action = $_GET['action'];
	if(!empty($action)){
		$delete_transaksi_query = mysql_query("DELETE FROM tabel_transaksi WHERE kode_transaksi='$kode_transaksi'");
		if($delete_transaksi_query){
			header("location: index.php?link=list_transaksi&alert=berhasil");
		}else{
			header("location: index.php?link=list_transaksi&alert=gagal");
		}
	}else{
		header("location: index.php?link=list_transaksi&alert=gagal");
	}
?>