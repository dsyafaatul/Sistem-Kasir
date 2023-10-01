<?php
include("koneksi.php");
$bayar = $_GET['bayar'];
$kode_transaksi = $_GET['kode_transaksi'];
$page = $_GET['page'];
$q = $_GET['q'];
$action = $_GET['action'];
	if(!empty($action)){
		if(empty($bayar) OR empty($kode_transaksi)){
			header("location: index.php?link=list_transaksi&action=edit&kode_transaksi=$kode_transaksi&page=$page&q=$q&alert=gagal");
		}else{
			$total_bayar = mysql_result(mysql_query("SELECT total_bayar FROM tabel_transaksi WHERE kode_transaksi='$kode_transaksi'"),0);
			$kembalian = $_GET['bayar']-$total_bayar;
			$edit_transaksi_query = mysql_query("UPDATE tabel_transaksi SET bayar='$bayar',kembalian='$kembalian',status='yes' WHERE kode_transaksi='$kode_transaksi'");
			if($edit_transaksi_query){
				header("location: index.php?link=list_transaksi&kode_transaksi=$kode_transaksi&page=$page&q=$q&alert=berhasil");
			}else{
				header("location: index.php?link=list_transaksi&action=edit&kode_transaksi=$kode_transaksi&page=$page&q=$q&alert=gagal");
			}
		}
	}else{
		header("location: index.php?link=list_transaksi&action=edit&kode_transaksi=$kode_transaksi&page=$page&q=$q&alert=gagal");
	}
?>