<?php
include("koneksi.php");
$kode_transaksi = $_GET['kode_transaksi'];
$tanggal_transaksi = $_GET['tanggal_transaksi'];
$no_pegawai = $_GET['no_pegawai'];
$action = $_GET['action'];
	if(!empty($action)){
		if(empty($kode_transaksi) OR empty($tanggal_transaksi) OR empty($no_pegawai)){
			header("location: index.php?link=list_transaksi&alert=gagal");
		}else{
		$tambah_barang_query = mysql_query("INSERT INTO tabel_transaksi(kode_transaksi,tanggal_transaksi,no_pegawai,status)VALUES('$kode_transaksi','$tanggal_transaksi','$no_pegawai','no')");
			if($tambah_barang_query){
				header("location: index.php?link=list_transaksi&action=edit&kode_transaksi=$kode_transaksi&alert=berhasil");
			}else{
				header("location: index.php?link=list_transaksi&alert=gagal");
			}
		}
	}else{
		header("location: index.php?link=list_transaksi&alert=gagal");
	}
?>