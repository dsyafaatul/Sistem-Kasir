<?php
include("koneksi.php");
		$action = $_POST['action'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		if(!empty($action)){
			if(!empty($username) OR !empty($username)){
					$query_login = mysql_query("SELECT * from tabel_user WHERE username='$username' AND password='$password'");
					$row = mysql_num_rows($query_login);
					$result = mysql_fetch_array($query_login);
					if($row>=1){
						$_SESSION['level'] = $result['level'];
						$_SESSION['username'] = $username;
						$_SESSION['password'] = $password;
						$_SESSION['no_pegawai'] = $result['no_pegawai'];
						header("location: index.php");
					}else{
						header("location: login.php?alert=gagal");
					}
			}else{
				header("location: login.php?alert=gagal");
			}
		}else{
			header("location: login.php");
		}
?>