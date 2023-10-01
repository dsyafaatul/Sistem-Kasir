		<?php
		if(!empty($_GET['alert'])){
			if($_GET['alert'] == "gagal"){
				echo "<div class=\"alert alert-danger\" style=\"display: none;\" id=\"messages\">
					<span class='glyphicon glyphicon-info-sign'></span>
					Gagal
					<span class=\"close\" data-dismiss=\"alert\" >&times;</span>
				</div>";
			}
			if($_GET['alert'] == "berhasil"){
				echo "<div class=\"alert alert-success\" style=\"display: none;\" id=\"messages\">
					<span class='glyphicon glyphicon-info-sign'></span>
					Berhasil
					<span class=\"close\" data-dismiss=\"alert\" >&times;</span>
				</div>";
			}
		}
		?>
<div class="row">
	<div class="col-md-6 col-md-offset-3 col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Setting
			</div>
			<div class="panel-body">
				<img src="assets/img/<?php echo $foto; ?>" alt="" class="img-rounded center-block" style="width: 100px;height: 100px;margin-bottom: 15px;">
				<table class="table table-bordered table-hover table-responsive">
					<tr>
						<td>No Pegawai</td>
						<td><?php echo $no_pegawai ?></td>
					</tr>
					<tr>
						<td>Username</td>
						<td><?php echo $username ?></td>
					</tr>
					<tr>
						<td>Level</td>
						<td><?php echo $level; ?></td>
					</tr>
				</table>
				<a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal_ganti_foto">Ganti foto</a>
				<a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal_ganti_password">Ganti Password</a>
			</div>
			<div class="panel-footer"></div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_ganti_foto">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<span class="close" data-dismiss="modal">&times;</span>
				<h4 class="modal-title">Ganti foto</h4>
			</div>
			<form enctype="multipart/form-data" action="change_foto_action.php" method="POST">
			<input type="hidden" name="no_pegawai" value="<?php echo $no_pegawai; ?>">
			<div class="modal-body">
				<div class="form-group">
					<input type="file" name="foto" class="form-control">
				</div>
			</div>
			<div class="modal-footer">
				<input type="button" value="Batal" class="btn btn-default" data-dismiss="modal" />
				<input type="Reset" value="Reset" class="btn btn-success" />
				<input type="submit" name="action" value="Simpan" class="btn btn-primary" />
			</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_ganti_password">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<span class="close" data-dismiss="modal">&times;</span>
				<h4 class="modal-title">Ganti Password</h4>
			</div>
			<form action="change_password_action.php" method="POST">
			<input type="hidden" name="no_pegawai" value="<?php echo $no_pegawai; ?>">
			<input type="hidden" name="level" value="<?php echo $level; ?>">
			<div class="modal-body">
				<div class="form-group">
					<input type="password" name="password_lama" placeholder="Password Lama" class="form-control">
				</div>
				<div class="form-group">
					<input type="password" name="password_baru" placeholder="Password Baru" class="form-control">
				</div>
				<div class="form-group">
					<input type="password" name="password_baru_ulang" placeholder="Ulangi Password Baru" class="form-control">
				</div>
			</div>
			<div class="modal-footer">
				<input type="button" value="Batal" class="btn btn-default" data-dismiss="modal" />
				<input type="Reset" value="Reset" class="btn btn-success" />
				<input type="submit" name="action" value="Simpan" class="btn btn-primary" />
			</div>
			</form>
		</div>
	</div>
</div>