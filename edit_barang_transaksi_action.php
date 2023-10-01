<?php
include("koneksi.php");
$kode_transaksi = $_GET['kode_transaksi'];
$jumlah_barang = $_GET['jumlah_barang'];
$kode_barang = $_GET['kode_barang'];
$id_detail = $_GET['id_detail'];
$page = $_GET['page'];
$q = $_GET['q'];
$action = $_GET['action'];
	if(!empty($action)){
		if(empty($kode_transaksi) OR empty($jumlah_barang) OR empty($id_detail)){
			header("location: index.php?link=list_transaksi&action=edit&kode_transaksi=$kode_transaksi&page=$page&q=$q&alert=gagal");
		}else{
		$harga_barang = mysql_result(mysql_query("SELECT harga_barang FROM tabel_barang WHERE kode_barang='$kode_barang'"),0);
		$total_harga = ($jumlah_barang*$harga_barang);
		$edit_barang_transaksi_query = mysql_query("UPDATE tabel_detail_transaksi SET jumlah_barang='$jumlah_barang',total_harga='$total_harga' WHERE id_detail='$id_detail'");
			if($edit_barang_transaksi_query){
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