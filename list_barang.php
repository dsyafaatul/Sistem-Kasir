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
?>
<?php
if($action=="edit"){
	$kode_barang = $_GET['kode_barang'];
	?>
	<div class="row">
		<div class="col-md-7">
			<a href="?link=list_barang&q=<?php echo $_GET['q'] ?>&page=<?php echo $_GET['page'] ?>" class="btn">
				<span class="glyphicon glyphicon-arrow-left"></span>
				Kembali
			</a>
		</div>
		<div class="col-md-5"></div>
	</div>
	<table class="table table-bordered table-responsive table-hover">
	<tr>
		<th>Kode Barang</th>
		<th>Nama Barang</th>
		<th>Merk Barang</th>
		<th>Harga Barang</th>
		<th>Action</th>
	</tr>
	<?php
	$list_barang_query = mysql_query("SELECT * FROM tabel_barang WHERE kode_barang='$kode_barang'");
	while ($data_barang = mysql_fetch_array($list_barang_query)) {
		?>
		<form action="edit_barang_action.php">
			<input type="hidden" name="kode_barang_out" value="<?php echo $data_barang[0]; ?>" class="form-control" maxlength="13">
			<input type="hidden" name="q" value="<?php echo $_GET['q'] ?>" class="form-control" maxlength="13">
			<input type="hidden" name="page" value="<?php echo $_GET['page'] ?>" class="form-control" maxlength="13">
		<tr>
			<td>
				<div class="input-group">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-barcode"></span>
						</span>
						<input type="text" name="kode_barang_in" value="<?php echo $data_barang[0]; ?>" class="form-control" maxlength="13">
				</div>
			</td>
			<td><input type="text" name="nama_barang" value="<?php echo $data_barang[1]; ?>" class="form-control"></td>
			<td><input type="text" name="merk_barang" value="<?php echo $data_barang[2]; ?>" class="form-control"></td>
			<td><input type="text" name="harga_barang" value="<?php echo $data_barang[3]; ?>" class="form-control"></td>
			<td>
				<input type="submit" class="btn btn-primary" name="action" value="Simpan">
			</td>
		</tr>
		</form>
		<?php
	$no++;
	}
	?>
</table>


<?php
}else{
?>
				<div class="row">
					<div class="col-md-7">
						<div class="form-group">
						<?php
						if($level=='Admin'){
						?>
							<button class="btn btn-success" data-toggle="modal" data-target="#modal_tambah_barang">
								<span class="glyphicon glyphicon-plus"></span>
								Tambah Barang
							</button>
						<?php } ?>
						</div>
					</div>
					<div class="col-md-5">
					<form action="">
					<div class="form-group">
					<input type="hidden" name="link" value="list_barang" class="form-control">
					<div class="input-group">
						<input type="text" name="q" placeholder="Cari berdasarkan nama barang" class="form-control">
						<span class="input-group-btn">
							<button type="submit" name="action" class="btn btn-default">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
					</div>
					</div>
					</form>
					</div>
				</div>
<table class="table table-bordered table-responsive table-hover">
	<tr>
		<th>No</th>
		<th>Kode Barang</th>
		<th>Nama Barang</th>
		<th>Merk Barang</th>
		<th>Harga Barang</th>
		<?php
		if($level=="Admin"){
		?>
		<th>Action</th>
		<?php } ?>
	</tr>
	<?php
		$perhal = 5;
		$page = (!empty($_GET['page'])?(int)$_GET['page']==0?1:$_GET['page']:1);
		$start = ($page - 1) * $perhal;
		if(!empty($_GET['q'])){
			$q = $_GET['q'];
			$list_barang_query = mysql_query("SELECT * FROM tabel_barang WHERE nama_barang LIKE '%$q%' ORDER BY nama_barang ASC LIMIT $start, $perhal");
		}else{
			$list_barang_query = mysql_query("SELECT * FROM tabel_barang ORDER BY nama_barang ASC LIMIT $start, $perhal");
		}
			$jumlah_barang_query = mysql_result(mysql_query("SELECT COUNT(*) FROM tabel_barang WHERE nama_barang LIKE '%$q%'"), 0);
			$halaman = ceil($jumlah_barang_query / $perhal);

	$no = ($page - 1) * $perhal + 1;
	while ($data_barang = mysql_fetch_array($list_barang_query)) {
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $data_barang[0]; ?></td>
			<td><?php echo $data_barang[1]; ?></td>
			<td><?php echo $data_barang[2]; ?></td>
			<td>Rp.<?php echo number_format($data_barang[3]); ?>,-</td>
				<?php
				if($level=="Admin"){
				?>
			<td>
				<a href="delete_barang_action.php?action=delete_barang&kode_barang=<?php echo $data_barang[0]; ?>" class="btn btn-danger" onclick="return window.confirm('Apakah anda yakin ingin menghapus')">
					<span class="glyphicon glyphicon-trash" ></span>
				</a>
					<a href="index.php?link=list_barang&action=edit&page=<?php echo $page ?>&kode_barang=<?php echo $data_barang[0] ?>&q=<?php echo $_GET['q'] ?>" class="btn btn-warning">
					<span class="glyphicon glyphicon-pencil" ></span>
				</a>
			</td>
				<?php } ?>
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
			<li <?php echo $active_page ?> ><a href="?link=list_barang&page=<?php echo $i ?>&q=<?php echo $_GET['q'] ?>"><?php echo $i ?></a></li>
			<?php
		}
	?>
</ul>
<?php
}
?>
<div class="modal fade" id="modal_tambah_barang">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="add_barang_action.php">
			<div class="modal-header">
				<span class="close" data-dismiss="modal">&times;</span>
				<h4 class="modal-title">Tambah Barang</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-barcode"></span>
						</span>
						<input type="text" id="kode_barang" name="kode_barang" placeholder="Kode Barang" class="form-control" maxlength="13">
						<script type="text/javascript">
							$('#kode_barang').keydown(function(event){
								if(event.keyCode==13){
									event.preventDefault();
									$('#nama_barang').focus();
								}
							})
						</script>
					</div>
				</div>
				<div class="form-group">
					<input type="text" id="nama_barang" name="nama_barang" placeholder="Nama Barang" class="form-control">
				</div>
				<div class="form-group">
					<input type="text" name="merk_barang" placeholder="Merk Barang" class="form-control">
				</div>
				<div class="form-group">
					<input type="text" name="harga_barang" placeholder="Harga Barang" class="form-control">
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
