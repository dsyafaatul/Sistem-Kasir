<?php
include("koneksi.php");
$username = $_GET['username'];
$password = md5($_GET['password']);
$no_pegawai = $_GET['no_pegawai'];
$action = $_GET['action'];
	if(!empty($action)){
		if(empty($username) OR empty($password) OR empty($no_pegawai)){
			header("location: index.php?link=list_user&alert=gagal");
		}else{
				$edit_user_query = mysql_query("UPDATE tabel_user SET username='$username',password='$password' WHERE no_pegawai='$no_pegawai'");
				if($edit_user_query){
					header("location: index.php?link=list_user&alert=berhasil");
				}else{
					header("location: index.php?link=list_user&alert=gagal");
				}
			}
	}else{
		header("location: index.php?link=list_user&alert=gagal");
	}
?>