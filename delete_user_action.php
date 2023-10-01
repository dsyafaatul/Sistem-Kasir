<?php
include("koneksi.php");
$no_pegawai = $_GET['no_pegawai'];
$action = $_GET['action'];
	if(!empty($action)){
		$delete_user_query = mysql_query("DELETE FROM tabel_user WHERE no_pegawai='$no_pegawai'");
		if($delete_user_query){
			header("location: index.php?link=list_user&alert=berhasil");
		}else{
			header("location: index.php?link=list_user&alert=gagal");
		}
	}else{
		header("location: index.php?link=list_user&alert=gagal");
	}
?>