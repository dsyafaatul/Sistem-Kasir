<?php
	include("koneksi.php");
	if(!empty($_SESSION['username']) AND !empty($_SESSION['password'])){
		header("location: index.php");
	}else{
		?>
<!-- 
	Created by dsyafaatul
-->
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
		
	</style>
</head>
<body>
	<?php
		if(!empty($_GET['alert'])){
			if($_GET['alert'] == "gagal"){
				echo "<div class=\"alert alert-success\" style=\"background-color: rgba(0,0,0,0.2);color: #2A363B;border: 0;margin-bottom: 5px;border-radius: 0px;\">
					<span class='glyphicon glyphicon-info-sign'></span>
					Login gagal, username atau password salah
					<span class=\"close\" data-dismiss=\"alert\" >&times;</span>
				</div>";
			}else{
				if($_GET['alert'] == "berhasil"){
				echo "<div class=\"alert alert-success\" style=\"background-color: rgba(0,0,0,0.2);color: #2A363B;border: 0;margin-bottom: 5px;border-radius: 0px;\">
					<span class='glyphicon glyphicon-info-sign'></span>
					Logout berhasil, Terimakasih telah login
					<span class=\"close\" data-dismiss=\"alert\" >&times;</span>
				</div>";
			}
			}
		}else{
				echo "<div class=\"alert alert-success\" style=\"background-color: rgba(0,0,0,0.2);color: #2A363B;border: 0;margin-bottom: 5px;border-radius: 0px;\">
					<span class='glyphicon glyphicon-info-sign'></span>
					Silahkan login terlebih dahulu
					<span class=\"close\" data-dismiss=\"alert\" >&times;</span>
				</div>";
		}
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-12 col-md-offset-4" style="margin-top: 90px;">
				<div class="panel panel-primary" style="background-color: rgba(0,0,0,0.2);border: 0;">
					<div class="panel-heading" style="background-color: #2A363B;border-color: #2A363B;text-align: center;padding: 25px">
						<span class="glyphicon glyphicon-lock"></span>
						Login
					</div>
					<div class="panel-body" style="border-color: #2A363B;">
						<form action="login_action.php" method="POST" >
							<div class="form-group">
								<input type="text" name="username" placeholder="USERNAME" class="form-control"  style="background-color: rgba(255,255,255,0.50);"/>
							</div>
							<div class="form-group">
								<input type="password" name="password" placeholder="PASSWORD" class="form-control" style="background-color: rgba(255,255,255,0.50);"/>
							</div>
							<div class="form-group">
							<input type="submit" name="action" class="btn btn-success btn-block" value="LOGIN" style="margin-bottom: 15px;border: 0;padding: 15px;">
							</div>
						</form>
					</div>
					<div class="panel-footer" style="background-color: #2A363B;border-color: #2A363B;color: #fff;text-align: center">
						Copyright &copy; 2017
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php
	}
?>