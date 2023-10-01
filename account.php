		<?php
		$action = $_GET['action'];
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
		if($action=="edit"){
		?>
		<div class="row">
			<?php
				$data_kasir_query = mysql_fetch_array(mysql_query("SELECT * FROM tabel_kasir WHERE no_pegawai='$no_pegawai'"));
			?>
			<div class="col-md-12">
				<table class="table table-bordered table-responsive table-hover">
					<form action="edit_akun_action.php">
						<input type="hidden" name="link" value="account" class="form-control">
						<input type="hidden" name="no_pegawai_out" value="<?php echo $data_kasir_query[0]; ?>" class="form-control">
					<tr>
						<td>No Pegawai</td>
						<td>
							<input type="text" name="no_pegawai_in" value="<?php echo $data_kasir_query[0]; ?>" class="form-control" maxlength="10">
						</td>
					</tr>
					<tr>
						<td>Nama Kasir</td>
						<td>
							<input type="text" name="nama_kasir" value="<?php echo $data_kasir_query[1]; ?>" class="form-control">
						</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>
							<?php
								if($data_kasir_query[2]=="L"){
									$L = "checked";
								}else{
									$P = "checked";
								}
							?>
							<input type="radio" name="jenis_kelamin" value="L" <?php echo $L ?>> Laki-Laki
							<input type="radio" name="jenis_kelamin" value="P" <?php echo $P ?>> Perempuan
						</td>
					</tr>
					<tr>
						<td>Tempat Tanggal Lahir</td>
						<td>
							<div class="input-group" style="margin-bottom: 10px">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-map-marker"></span>
								</span>
								<input type="text" name="tempat_lahir" value="<?php echo $data_kasir_query[3]; ?>" class="form-control" >
							</div>
							<div class="input-group">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
								<input type="date" name="tanggal_lahir" value="<?php echo $data_kasir_query[4]; ?>" class="form-control">
							</div>
						</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>
							<textarea name="alamat" id="" class="form-control"><?php echo $data_kasir_query[5]; ?></textarea>
						</td>
					</tr>
					<tr>
						<td>No Telepon</td>
						<td>
							<input type="text" name="no_telepon" value="<?php echo $data_kasir_query[6]; ?>" class="form-control">
						</td>
					</tr>
					<tr>
						<td colspan="1"></td>
						<td>
							<a href="?link=account" class="btn btn-default">Batal</a>
							<input type="submit" name="action" value="Simpan" class="btn btn-primary" >
						</td>
					</tr>
					</form>
				</table>
			</div>
		</div>
		<?php
		}else{
		?>
		<div class="row">
			<?php
				$data_kasir_query = mysql_fetch_array(mysql_query("SELECT * FROM tabel_kasir WHERE no_pegawai='$no_pegawai'"));
			?>
			<div class="col-md-12">
				<table class="table table-bordered table-responsive table-hover">
						<input type="hidden" name="no_pegawai_out" value="<?php echo $data_kasir_query[0]; ?>" class="form-control" disabled>
					<tr>
						<td>No Pegawai</td>
						<td>
							<input type="text" name="no_pegawai_in" value="<?php echo $data_kasir_query[0]; ?>" class="form-control" maxlength="10" disabled>
						</td>
					</tr>
					<tr>
						<td>Nama Kasir</td>
						<td>
							<input type="text" name="nama_kasir" value="<?php echo $data_kasir_query[1]; ?>" class="form-control" disabled>
						</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>
							<?php
								if($data_kasir_query[2]=="L"){
									$L = "checked";
								}else{
									$P = "checked";
								}
							?>
							<input type="radio" name="jenis_kelamin" value="L" <?php echo $L ?> disabled> Laki-Laki
							<input type="radio" name="jenis_kelamin" value="P" <?php echo $P ?> disabled> Perempuan
						</td>
					</tr>
					<tr>
						<td>Tempat Tanggal Lahir</td>
						<td>
							<div class="input-group" style="margin-bottom: 10px">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-map-marker"></span>
								</span>
								<input type="text" name="tempat_lahir" value="<?php echo $data_kasir_query[3]; ?>" class="form-control" disabled>
							</div>
							<div class="input-group">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
								<input type="date" name="tanggal_lahir" value="<?php echo $data_kasir_query[4]; ?>" class="form-control" disabled>
							</div>
						</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>
							<fieldset disabled>
								<textarea name="alamat" id="" class="form-control"><?php echo $data_kasir_query[5]; ?></textarea >
							</fieldset>
						</td>
					</tr>
					<tr>
						<td>No Telepon</td>
						<td>
							<input type="text" name="no_telepon" value="<?php echo $data_kasir_query[6]; ?>" class="form-control" disabled>
						</td>
					</tr>
					<tr>
						<td colspan="1"></td>
						<td>
							<a href="index.php?link=account&action=edit" class="btn btn-warning">Edit</a>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<?php
		}
		?>