<?php
include("koneksi.php");
$kode_transaksi = $_GET['kode_transaksi'];
$id_detail = $_GET['id_detail'];
$page = $_GET['page'];
$q = $_GET['q'];
$action = $_GET['action'];
	if(!empty($action)){
		$delete_barang_query = mysql_query("DELETE FROM tabel_detail_transaksi WHERE id_detail='$id_detail'");
		if($delete_barang_query){
		$data_transaksi = mysql_fetch_array(mysql_query("SELECT sum(jumlah_barang) as jumlah_barang,sum(total_harga) as total_bayar FROM tabel_detail_transaksi WHERE kode_transaksi='$kode_transaksi'"));
		$edit_transaksi_query = mysql_query("UPDATE tabel_transaksi SET jumlah_barang='$data_transaksi[0]',total_bayar='$data_transaksi[1]' WHERE kode_transaksi='$kode_transaksi'");
			header("location: index.php?link=list_transaksi&action=edit&kode_transaksi=$kode_transaksi&page=$page&q=$q&alert=berhasil");
		}else{
			header("location: index.php?link=list_transaksi&action=edit&kode_transaksi=$kode_transaksi&page=$page&q=$q&alert=gagal");
		}
	}else{
		header("location: index.php?link=list_transaksi&action=edit&kode_transaksi=$kode_transaksi&page=$page&q=$q&alert=gagal");
	}
?>