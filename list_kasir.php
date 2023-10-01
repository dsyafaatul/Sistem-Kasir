<?php
if($level=="Admin"){
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
		<div class="col-md-7">
			<a href="?link=list_kasir&q=<?php echo $_GET['q'] ?>&page=<?php echo $_GET['page'] ?>" class="btn">
				<span class="glyphicon glyphicon-arrow-left"></span>
				Kembali
			</a>
		</div>
		<div class="col-md-5"></div>
	</div>
	<div class="row">
			<?php
			$no_pegawai_edit = $_GET['no_pegawai'];
				$data_kasir_query = mysql_fetch_array(mysql_query("SELECT * FROM tabel_kasir WHERE no_pegawai='$no_pegawai_edit'"));
			?>
			<div class="col-md-12">
				<table class="table table-bordered table-responsive table-hover">
					<form action="edit_akun_action.php">
						<input type="hidden" name="link" value="list_kasir" class="form-control">
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
					<div class="col-md-7">
						<div class="form-group">
							<button class="btn btn-success" data-toggle="modal" data-target="#modal_tambah_kasir">
								<span class="glyphicon glyphicon-plus"></span>
								Tambah data
							</button>
						</div>
					</div>
					<div class="col-md-5">
					<form action="">
					<input type="hidden" name="link" value="list_kasir" class="form-control">
					<div class="input-group">
						<input type="text" name="q" placeholder="Cari berdasarkan nama kasir" class="form-control">
						<span class="input-group-btn">
							<button type="submit" name="action" class="btn btn-default">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
					</div>
					</form>
					</div>
				</div>
<table class="table table-bordered table-responsive table-hover">
	<tr>
		<th>No</th>
		<th>No Pegawai</th>
		<th>Nama Kasir</th>
		<th>Jenis Kelamin</th>
		<th>Tempal Tanggal Lahir</th>
		<th>Alamat</th>
		<th>No Telepon</th>
		<th>Action</th>
	</tr>
	<?php
		$perhal = 5;
		$page = (!empty($_GET['page'])?(int)$_GET['page']==0?1:$_GET['page']:1);
		$start = ($page - 1) * $perhal;
		if(!empty($_GET['q'])){
			$q = $_GET['q'];
			$list_kasir_query = mysql_query("SELECT * FROM tabel_kasir WHERE nama_kasir LIKE '%$q%' ORDER BY nama_kasir ASC LIMIT $start, $perhal");
		}else{
			$list_kasir_query = mysql_query("SELECT * FROM tabel_kasir ORDER BY nama_kasir ASC LIMIT $start, $perhal");
		}
			$jumlah_kasir_query = mysql_result(mysql_query("SELECT COUNT(*) FROM tabel_user WHERE username LIKE '%$q%'"), 0);
			$halaman = ceil($jumlah_kasir_query / $perhal);

	$no = ($page - 1) * $perhal + 1;
	while ($data_kasir = mysql_fetch_array($list_kasir_query)) {
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data_kasir[0]; ?></td>
			<td><?php echo $data_kasir[1]; ?></td>
			<td>
				<?php
					if($data_kasir[2]=="L"){
						echo "Laki-Laki";
					}else{
						echo "Perempuan";
					}
				?>
			</td>
			<td><?php echo $data_kasir[3]; ?>, <?php echo $data_kasir[4]; ?></td>
			<td><?php echo $data_kasir[5]; ?></td>
			<td><?php echo $data_kasir[6]; ?></td>
			<td>
				<a href="delete_kasir_action.php?action=delete_kasir&no_pegawai=<?php echo $data_kasir[0]; ?>" class="btn btn-danger" onclick="return window.confirm('Apakah anda yakin ingin menghapus')">
					<span class="glyphicon glyphicon-trash" ></span>
				</a>
				<a href="index.php?link=list_kasir&action=edit&no_pegawai=<?php echo $data_kasir[0]; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" ></span></a>
			</td>
		</tr>
		<?php
	$no++;
	}
	?>
</table>
<ul class="pagination">
	<?php
		for ($i=1; $i <= $halaman ; $i++) {
			$active_page = ($i==$page?"class=\"active\"":"");
			?>
			<li <?php echo $active_page ?> ><a href="?link=list_kasir&page=<?php echo $i ?>&q=<?php echo $_GET['q'] ?>"><?php echo $i ?></a></li>
			<?php
		}
	?>
</ul>
<?php
}
}else{
}
?>
<div class="modal fade" id="modal_tambah_kasir">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="add_kasir_action.php">
			<div class="modal-header">
				<span class="close" data-dismiss="modal">&times;</span>
				<h4 class="modal-title">Tambah User</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<input type="text" name="no_pegawai" placeholder="No Pegawai" class="form-control" maxlength="10">
				</div>
				<div class="form-group">
					<input type="text" name="nama_kasir" placeholder="Nama Kasir" class="form-control">
				</div>
				<div class="form-group">
					<select name="jenis_kelamin" class="form-control">
						<option value="">--Pilih Jenis Kelamin--</option>
						<option value="L">Laki-Laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
				<div class="form-group">
					<input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control">
				</div>
				<div class="form-group">
					<input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" class="form-control">
				</div>
				<div class="form-group">
					<textarea name="alamat" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<input type="text" name="no_telepon" placeholder="No Telepon" class="form-control">
				</div>
			</div>
			<div class="modal-footer">
				<input type="button" value="Batal" class="btn btn-default" data-dismiss="modal" />
				<input type="Reset" value="Reset" class="btn btn-danger" />
				<input type="submit" name="action" value="Simpan" class="btn btn-primary" />
			</div>
			</form>
		</div>
	</div>
</div>
