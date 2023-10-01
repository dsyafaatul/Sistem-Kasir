<?php
include("koneksi.php");
$kode_transaksi = $_GET['kode_transaksi'];
$kode_barang = $_GET['kode_barang'];
$page = $_GET['page'];
$q = $_GET['q'];
$action = $_GET['action'];
	if(!empty($action)){
		if(empty($kode_transaksi) OR empty($kode_barang)){
			header("location: index.php?link=list_transaksi&action=edit&kode_transaksi=$kode_transaksi&page=$page&q=$q&alert=gagal");
		}else{
		$harga_barang = mysql_result(mysql_query("SELECT harga_barang FROM tabel_barang WHERE kode_barang='$kode_barang'"),0);
		$jumlah_barang = 1;
		$total_harga = ($jumlah_barang*$harga_barang);
		$tambah_barang_transaksi_query = mysql_query("INSERT INTO tabel_detail_transaksi(kode_transaksi,kode_barang,jumlah_barang,total_harga)VALUES('$kode_transaksi','$kode_barang',$jumlah_barang,$total_harga)");
			if($tambah_barang_transaksi_query){
		$data_transaksi = mysql_fetch_array(mysql_query("SELECT sum(jumlah_barang) as jumlah_barang,sum(total_harga) as total_bayar FROM tabel_detail_transaksi WHERE kode_transaksi='$kode_transaksi'"));
		$edit_transaksi_query = mysql_query("UPDATE tabel_transaksi SET jumlah_barang='$data_transaksi[0]',total_bayar='$data_transaksi[1]' WHERE kode_transaksi='$kode_transaksi'");
				header("location: index.php?link=list_transaksi&action=edit&kode_transaksi=$kode_transaksi&page=$page&q=$q&alert=berhasil");
			}else{
				header("location: index.php?link=list_transaksi&action=edit&kode_transaksi=$kode_transaksi&page=$page&q=$q&alert=gagal");
			}
		}
	}else{
		header("location: index.php?link=list_transaksi&action=edit&kode_transaksi=$kode_transaksi&page=$page&q=$q&alert=gagal");
	}
?>