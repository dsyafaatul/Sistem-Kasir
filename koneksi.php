<?php
	session_start();
	$koneksi = mysql_connect("localhost","root","");
	$database = mysql_select_db("db_kasir");
	if($koneksi AND $database){
		// echo "Koneksi berhasil";
	}else{
		echo "Koneksi gagal, ";
		echo mysql_error();
	}
	error_reporting(E_NOTICE ^(E_NOTICE | E_WARNING));
?>