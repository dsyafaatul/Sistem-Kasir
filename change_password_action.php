<?php
include("koneksi.php");
$level = $_POST['level'];
$password_lama = md5($_POST['password_lama']);
$password_baru = md5($_POST['password_baru']);
$password_baru_ulang = md5($_POST['password_baru_ulang']);
$no_pegawai = $_POST['no_pegawai'];
$action = $_POST['action'];
	if(!empty($action)){
		if(empty($password_lama) OR empty($password_baru) OR empty($password_baru_ulang)){
			header("location: index.php?link=setting&alert=gagal");
		}else{
			if($level=="Admin"){
			$validasi = mysql_num_rows(mysql_query("SELECT * FROM admin WHERE password='$password_lama' AND no_pegawai='$no_pegawai'"));
			if($validasi>=1){
				if($password_baru == $password_baru_ulang){
					$ganti_password_query = mysql_query("UPDATE admin SET password='$password_baru' WHERE no_pegawai='$no_pegawai'");
						if($ganti_password_query){
						header("location: index.php?link=setting&alert=berhasil");
						}else{
							header("location: index.php?link=setting&alert=gagal");
						}
				}else{
					header("location: index.php?link=setting&alert=gagal");
				}
			}else{
				header("location: index.php?link=setting&alert=gagal");
			}
			}else{
			$validasi = mysql_num_rows(mysql_query("SELECT * FROM tabel_user WHERE password='$password_lama' AND no_pegawai='$no_pegawai'"));
			if($validasi>=1){
				if($password_baru == $password_baru_ulang){
					$ganti_password_query = mysql_query("UPDATE tabel_user SET password='$password_baru' WHERE no_pegawai='$no_pegawai'");
						if($ganti_password_query){
						header("location: index.php?link=setting&alert=berhasil");
						}else{
						header("location: index.php?link=setting&alert=gagal");
						}
				}else{
					header("location: index.php?link=setting&alert=gagal");
				}
			}else{
				header("location: index.php?link=setting&alert=gagal");
			}
			}
		}
	}else{
		header("location: index.php?link=setting&alert=gagal");
	}
?>