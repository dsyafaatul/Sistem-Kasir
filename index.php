<?php
	include("koneksi.php");
	if(empty($_SESSION['username']) AND empty($_SESSION['password'])){
		header("location: login.php");
	}else{
		$level = $_SESSION['level'];
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
		$no_pegawai = $_SESSION['no_pegawai'];
	if($level=="Admin"){
		$list_user = "<li>
						<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" data-target=\"dropdown-menu\">
						<span class=\"glyphicon glyphicon-user\" ></span>
						User
						</a>
						<ul class=\"dropdown-menu\">
							<li><a href=\"index.php?link=list_user\" >Kasir</a></li>
							<li><a href=\"index.php?link=list_kasir\" >Pegawai</a></li>
						</ul>
					</li>";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Selamat datang di sistem kasir</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="assets/css/style.css" />
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="icon" type="icon/png" href="assets/img/favicon.png">
	<style type="text/css">
		.bg-blue{
			color: white;
			background-color: #337ab7;
			border-bottom: 10px solid rgba(0,0,0,0.2);
		}
		.bg-green{
			color: white;
			background-color: #5cb85c;
			border-bottom: 10px solid rgba(0,0,0,0.2);
		}
		.bg-light-blue{
			color: white;
			background-color: #5bc0de;
			border-bottom: 10px solid rgba(0,0,0,0.2);
		}
		.bg-orange{
			color: white;
			background-color: #f0ad4e;
			border-bottom: 10px solid rgba(0,0,0,0.2);
		}
		.bg-red{
			color: white;
			background-color: #d9534f;
			border-bottom: 10px solid rgba(0,0,0,0.2);
		}
		.active{
			background-color: rgba(0,0,0,0.2);
		}
	</style>
<!-- 
	Created by dsyafaatul
-->
<?php
	if(!empty($_GET['link'])){
		echo "<script>
				$(function(){
					$(\"[href='index.php?link=$_GET[link]']\").addClass(\"active\");
				});
			</script>";
	}else{
		echo "<script>
				$(function(){
					$(\"[href='index.php\").addClass(\"active\");
				});
			</script>";
	}
?>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<nav class="navbar navbar-inverse" style="background-color: #2A363B;border-radius: 0px;margin-bottom: 10px;box-sizing: border-box;">
				<div class="container-fluid">
					<div class="navbar-header">
						<button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="menu">
						<div class="navbar-left">
							<ul class="nav navbar-nav">
								<li>
									<a href="index.php">
										<span class="glyphicon glyphicon-home"></span>
										Dashboard
									</a>
								</li>
								<li>
									<a href="index.php?link=list_barang">
										<span class="glyphicon glyphicon-send"></span>
										Barang
									</a>
								</li>
								<li>
									<a href="index.php?link=list_transaksi">
										<span class="glyphicon glyphicon-shopping-cart"></span>
										Transaksi
									</a>
								</li>
								<?php
									echo $list_user;
								?>
							</ul>
						</div>
				    		<ul class="nav navbar-nav navbar-right">
				    			<li class="navbar-text" style="text-align: center;">
				    				<span class="glyphicon glyphicon-calendar"></span>
				    				<?php echo date("Y-m-d") ?>
				    				</li>
				    			<li class="dropdown center-block">
				    				<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding: 5px;background-color: transparent;">
				    					<?php
				    						$foto = mysql_result(mysql_query("SELECT foto_kasir FROM tabel_kasir WHERE no_pegawai='$no_pegawai'"), 0);
				    					?>
				    					<img src="assets/img/<?php echo $foto; ?>" alt="" class="img-circle center-block" style="width: 40px;height: 40px;"></a>
				    				<ul class="dropdown-menu">
				    					<li><a href="index.php?link=account" class="glyphicon glyphicon-user"> Account</a></li>
				    					<li><a href="index.php?link=setting" class="glyphicon glyphicon-cog"> Setting</a></li>
				    					<li><a href="logout_action.php" class="glyphicon glyphicon-log-out" onclick="return window.confirm('Apakah anda yakin ingin logout')"> Logout</a></li>
				    				</ul>
				    			</li>
				    		</ul>
					</div>
				  </div>
			</nav>
		</div>
		<div class="row">
		<div class="col-md-12">
			<div class="alert alert-success" style="background-color: rgba(0,0,0,0.2);color: #2A363B;border: 0;margin-bottom: 10px">
				<span class='glyphicon glyphicon-info-sign'></span>
				<span>Hi, <?php echo $username; ?>!</span>
				<span class="close" data-dismiss="">&times;</span>
			</div>
			<div class="well" style="height: 495px;overflow: scroll;">
				<?php include("link.php") ?>
			</div>
		</div>
		</div>
	</div>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#messages').fadeIn('slow').delay(1000).slideUp('slow');
		$('#edit_barang').fadeIn('slow');
	})
	</script>
</body>
</html>
<?php
	}
?>