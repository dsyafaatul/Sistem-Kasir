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
?>
<div class="row">
					<div class="col-md-7">
						<div class="form-group">
							<button class="btn btn-success" data-toggle="modal" data-target="#modal_tambah_user">
								<span class="glyphicon glyphicon-plus"></span>
								Tambah data
							</button>
						</div>
					</div>
					<div class="col-md-5">
					<form action="">
					<input type="hidden" name="link" value="list_user" class="form-control">
					<div class="input-group">
						<input type="text" name="q" placeholder="Cari berdasarkan username" class="form-control">
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
		<th>Username</th>
		<th>Password</th>
		<th>Level</th>
		<th>Action</th>
	</tr>
	<?php
		$perhal = 5;
		$page = (!empty($_GET['page'])?(int)$_GET['page']==0?1:$_GET['page']:1);
		$start = ($page - 1) * $perhal;
		if(!empty($_GET['q'])){
			$q = $_GET['q'];
			$list_user_query = mysql_query("SELECT * FROM tabel_user WHERE username LIKE '%$q%' ORDER BY level ASC LIMIT $start, $perhal");
		}else{
			$list_user_query = mysql_query("SELECT * FROM tabel_user ORDER BY level ASC LIMIT $start, $perhal");
		}
			$jumlah_user_query = mysql_result(mysql_query("SELECT COUNT(*) FROM tabel_user WHERE username LIKE '%$q%'"), 0);
			$halaman = ceil($jumlah_user_query / $perhal);

	$no = ($page - 1) * $perhal + 1;
	while ($data_user = mysql_fetch_array($list_user_query)) {
		?>
		<form action="edit_user_action.php">
		<input type="hidden" name="no_pegawai" value="<?php echo $data_user[3]; ?>" class="form-control">
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data_user[3]; ?></td>
			<td><input type="text" name="username" value="<?php echo $data_user[1]; ?>" class="form-control"></td>
			<td><input type="password" name="password" placeholder="password" class="form-control"></td>
			<td><?php echo $data_user[4]; ?></td>
			<td>
				<input type="submit" class="btn btn-success" name="action" value="Update">
				<a href="delete_user_action.php?action=delete_user&no_pegawai=<?php echo $data_user[3]; ?>" class="btn btn-danger" onclick="return window.confirm('Apakah anda yakin ingin menghapus')">
					<span class="glyphicon glyphicon-trash" ></span>
				</a>
			</td>
		</tr>
		</form>
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
			<li <?php echo $active_page ?> ><a href="?link=list_user&page=<?php echo $i ?>&q=<?php echo $_GET['q'] ?>"><?php echo $i ?></a></li>
			<?php
		}
	?>
</ul>
<?php
}else{
}
?>
<div class="modal fade" id="modal_tambah_user">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="add_user_action.php">
			<div class="modal-header">
				<span class="close" data-dismiss="modal">&times;</span>
				<h4 class="modal-title">Tambah User</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<input type="text" name="no_pegawai" placeholder="No Pegawai" class="form-control" maxlength="10">
				</div>
				<div class="form-group">
					<input type="text" name="username" placeholder="Username" class="form-control">
				</div>
				<div class="form-group">
					<input type="password" name="password" placeholder="Password" class="form-control">
				</div>
				<div class="form-group">
						<select name="level" class="form-control">
							<option value="">--Pilih Level--</option>
							<option value="Admin">Admin</option>
							<option value="Kasir">Kasir</option>
						</select>
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
