<?php
include("koneksi.php");
$no_pegawai = $_GET['no_pegawai'];
$level = $_GET['level'];
$username = $_GET['username'];
$password = md5($_GET['password']);
$action = $_GET['action'];
	if(!empty($action)){
		if(empty($no_pegawai) OR empty($username) OR empty($password) oR empty($level)){
			header("location: index.php?link=list_user&alert=gagal");
		}else{
		$tambah_barang_query = mysql_query("INSERT INTO tabel_user(no_pegawai,username,password,level)VALUES('$no_pegawai','$username','$password','$level')");
			if($tambah_barang_query){
				header("location: index.php?link=list_user&alert=berhasil");
			}else{
				header("location: index.php?link=list_user&alert=gagal");
			}
		}
	}else{
		header("location: index.php?link=list_user&alert=gagal");
	}
?>