<?php
include("koneksi.php");
$nama_foto = $_FILES['foto']['name'];
$type_foto = $_FILES['foto']['type'];
$size_foto = $_FILES['foto']['size'];
$max_size= 1000000;
$type = array("image/jpg","image/jpeg","image/png");
$no_pegawai = $_POST['no_pegawai'];
$action = $_POST['action'];
	if(!empty($action)){
		if(!empty($nama_foto)){
			$foto_kasir = mysql_result(mysql_query("SELECT foto_kasir FROM tabel_kasir WHERE no_pegawai=$no_pegawai"),0);
			if($size_foto<=$max_size){
				if(in_array($type_foto, $type)){
				if(file_exists("assets/img/".$foto_kasir)){
					move_uploaded_file($_FILES['foto']['tmp_name'], "assets/img/".$nama_foto);
					$change_foto_query = mysql_query("UPDATE tabel_kasir SET foto_kasir='$nama_foto' WHERE no_pegawai='$no_pegawai'");
				}else{
					move_uploaded_file($_FILES['foto']['tmp_name'], "assets/img/".$nama_foto);
					$change_foto_query = mysql_query("UPDATE tabel_kasir SET foto_kasir='$nama_foto' WHERE no_pegawai='$no_pegawai'");
				}
					if($change_foto_query){
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
			header("location: index.php?link=setting&alert=gagal");
		}
	}else{
		header("location: index.php?link=setting&alert=gagal");
	}
?>