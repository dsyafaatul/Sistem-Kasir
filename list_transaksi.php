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
	$kode_transaksi = $_GET['kode_transaksi'];
?>
	<div class="row">
		<div class="col-md-7">
			<a href="?link=list_transaksi&q=<?php echo $_GET['q'] ?>&page=<?php echo $_GET['page'] ?>" class="btn">
				<span class="glyphicon glyphicon-arrow-left"></span>
				Kembali
			</a>
		</div>
		<div class="col-md-5"></div>
	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3 col-sm-12">
			<form action="">
			<input type="hidden" name="link" value="list_transaksi" class="form-control">
			<input type="hidden" name="action" value="edit" class="form-control">
			<input type="hidden" name="page" value="<?php echo $_GET['page'] ?>" class="form-control">
			<input type="hidden" name="kode_transaksi" value="<?php echo $_GET['kode_transaksi'] ?>" class="form-control">
			<input type="hidden" name="q" value="<?php echo $_GET['q'] ?>" class="form-control">
			<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-barcode"></span>
				</span>
				<input type="text" name="cari" placeholder="Cari berdasarkan nama barang" class="form-control">
			</div>
			</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-hover table-repnsive">
			<?php
			$no = 1;
			$cari = $_GET['cari'];
			if(!empty($cari)){
			?>
			<tr>
				<th>No</th>
				<th>Kode Barang</th>
				<th>Nama Barang</th>
				<th>Merk Barang</th>
				<th>Harga</th>
				<th>action</th>
			</tr>
			<?php
				$list_barang_query = mysql_query("SELECT * FROM tabel_barang WHERE nama_barang LIKE '%$cari%' ORDER BY nama_barang");
				while($data_barang_transaksi = mysql_fetch_array($list_barang_query)){
					?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $data_barang_transaksi[0]; ?></td>
						<td><?php echo $data_barang_transaksi[1]; ?></td>
						<td><?php echo $data_barang_transaksi[2]; ?></td>
						<td>Rp.<?php echo number_format($data_barang_transaksi[3]); ?>,-</td>
						<td>
							<a href="add_barang_transaksi_barang_action.php?link=list_transaksi&action=edit&page=<?php echo $_GET['page']; ?>&q=<?php echo $_GET['q']; ?>&kode_transaksi=<?php echo $_GET['kode_transaksi']; ?>&kode_barang=<?php echo $data_barang_transaksi[0]; ?>" class="btn btn-primary">Pilih</a>
						</td>
					</tr>
					<?php
					$no++;
				}
				}else{
					?>
					<?php
				}
			?>
		</table>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-hover table-reponsive">
			<tr>
				<th colspan="2">Kode Transaksi</th>
				<th colspan="5" >
					<input type="text" name="kode_transaksi" value="<?php echo $_GET['kode_transaksi']; ?>" class="form-control" disabled>
				</th>
			</tr>
			<tr>
				<?php
				$tanggal = mysql_result(mysql_query("SELECT tanggal_transaksi FROM tabel_transaksi WHERE kode_transaksi='$_GET[kode_transaksi]'"), 0);
				?>
				<th colspan="2">Tanggal Transaksi</th>
				<th colspan="5" >
					<input type="text" name="kode_transaksi" value="<?php echo $tanggal; ?>" class="form-control" disabled>
				</th>
			</tr>
			</table>
			<table class="table table-bordered table-hover table-reponsive">
			<tr>
				<th>No</th>
				<th>Nama Barang</th>
				<th>Merk Barang</th>
				<th>Jumlah Barang</th>
				<th>Harga Barang</th>
				<th>Action</th>
			</tr>
			<?php
				$no = 1;
				$list_barang_query = mysql_query("SELECT tabel_barang.nama_barang,tabel_barang.merk_barang,tabel_detail_transaksi.jumlah_barang,tabel_detail_transaksi.total_harga,tabel_detail_transaksi.id_detail,tabel_barang.kode_barang FROM tabel_detail_transaksi,tabel_barang WHERE tabel_detail_transaksi.kode_transaksi='$kode_transaksi' AND tabel_detail_transaksi.kode_barang=tabel_barang.kode_barang  ORDER BY nama_barang");
				while($data_barang_transaksi = mysql_fetch_array($list_barang_query)){
					?>
					<form action="edit_barang_transaksi_action.php">
					<input type="hidden" name="kode_transaksi" value="<?php echo $_GET['kode_transaksi'] ?>" class="form-control">
					<input type="hidden" name="id_detail" value="<?php echo $data_barang_transaksi['id_detail']; ?>" class="form-control">
					<input type="hidden" name="kode_barang" value="<?php echo $data_barang_transaksi['kode_barang']; ?>" class="form-control">
					<input type="hidden" name="page" value="<?php echo $_GET['page'] ?>" class="form-control">
					<input type="hidden" name="q" value="<?php echo $_GET['q'] ?>" class="form-control">
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $data_barang_transaksi['nama_barang']; ?></td>
						<td><?php echo $data_barang_transaksi['merk_barang']; ?></td>
						<td><input type="text" name="jumlah_barang" value="<?php echo $data_barang_transaksi['jumlah_barang']; ?>" class="form-control"></td>
						<td>Rp.<?php echo number_format($data_barang_transaksi['total_harga']); ?>,-</td>
						<td>
							<input type="submit" class="btn btn-success" name="action" value="Update">
							<a href="delete_barang_transaksi_action.php?action=delete_barang_transaksi&page=<?php echo $_GET['page']; ?>&q=<?php echo $_GET['q']; ?>&kode_transaksi=<?php echo $_GET['kode_transaksi']; ?>&id_detail=<?php echo $data_barang_transaksi['id_detail']; ?>" class="btn btn-danger" onclick="return window.confirm('Apakah anda yakin ingin menghapus')"><span class="glyphicon glyphicon-trash" ></span></a>
						</td>
					</tr>
					</form>
					<?php
					$no++;
				}
				$data_transaksi = mysql_fetch_array(mysql_query("SELECT jumlah_barang,total_bayar,bayar FROM tabel_transaksi WHERE kode_transaksi='$_GET[kode_transaksi]'"));
			?>
			<form action="edit_transaksi_action.php">
				<input type="hidden" name="kode_transaksi" value="<?php echo $_GET['kode_transaksi'] ?>" class="form-control">
				<input type="hidden" name="page" value="<?php echo $_GET['page'] ?>" class="form-control">
				<input type="hidden" name="q" value="<?php echo $_GET['q'] ?>" class="form-control">
			<tr>
				<th colspan="3">JUMLAH TOTAL : </th>
				<td><input type="text" value="<?php echo $data_transaksi[0]; ?>" class="form-control" disabled></td>
				<td><input type="text" value="Rp.<?php echo number_format($data_transaksi[1]).",-"; ?>" class="form-control" disabled></td>
				<td></td>
			</tr>
			<tr>
				<th colspan="3" >BAYAR : </th>
				<td>
					<td><input type="text" name="bayar" value="<?php echo $data_transaksi[2]; ?>" class="form-control"></td>
				</td>
				<td></td>
			</tr>
			<tr>
				<td colspan="6" align="right">
					<a href="?link=list_transaksi&q=<?php echo $_GET['q'] ?>&page=<?php echo $_GET['page'] ?>" class="btn btn-default">Kembali</a>
					<input type="submit" name="action" value="Simpan" class="btn btn-primary">
				</td>
			</tr>
		</table>
			</form>
		</div>
	</div>
<?php
}else{
?>
<div class="row">
	<div class="col-md-7">
		<div class="form-group">
			<button class="btn btn-success" data-toggle="modal" data-target="#modal_tambah_transaksi">
				<span class="glyphicon glyphicon-plus"></span>
				Tambah Transaksi
			</button>
		</div>
	</div>
	<div class="col-md-5">
		<form action="">
			<input type="hidden" name="link" value="list_transaksi" class="form-control">
			<div class="input-group">
				<input type="text" name="q" placeholder="Cari berdasarkan kode transaksi" class="form-control">
				<span class="input-group-btn">
					<button type="submit" name="action" class="btn btn-default">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
		</form>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered table-hover table-repnsive">
			<tr>
				<th>No</th>
				<th>Kode Transaksi</th>
				<th>Nama Kasir</th>
				<th>Tanggal Transaksi</th>
				<th>Jumlah Barang</th>
				<th>Total</th>
				<th>Bayar</th>
				<th>Kembalian</th>
				<th>Action</th>
			</tr>
			<?php
				$perhal = 5;
				$page = (!empty($_GET['page'])?(int)$_GET['page']==0?1:$_GET['page']:1);
				$start = ($page - 1) * $perhal;
				if(!empty($_GET['q'])){
					$q = $_GET['q'];
					$list_transaksi_query = mysql_query("SELECT tabel_transaksi.kode_transaksi,tabel_kasir.nama_kasir,tabel_transaksi.tanggal_transaksi,tabel_transaksi.jumlah_barang,tabel_transaksi.total_bayar,tabel_transaksi.bayar,tabel_transaksi.kembalian FROM tabel_transaksi,tabel_kasir WHERE tabel_transaksi.no_pegawai=tabel_kasir.no_pegawai AND tabel_transaksi.status='yes' AND tabel_transaksi.kode_transaksi LIKE '%$q%'  ORDER BY tanggal_transaksi LIMIT $start, $perhal");
				}else{
					$list_transaksi_query = mysql_query("SELECT tabel_transaksi.kode_transaksi,tabel_kasir.nama_kasir,tabel_transaksi.tanggal_transaksi,tabel_transaksi.jumlah_barang,tabel_transaksi.total_bayar,tabel_transaksi.bayar,tabel_transaksi.kembalian FROM tabel_transaksi,tabel_kasir WHERE tabel_transaksi.no_pegawai=tabel_kasir.no_pegawai AND tabel_transaksi.status='yes' ORDER BY tanggal_transaksi LIMIT $start, $perhal");
				}
				$jumlah_transaksi = mysql_result(mysql_query("SELECT COUNT(*) FROM tabel_transaksi WHERE kode_transaksi LIKE '%$q%'"),0);
				$halaman = ceil($jumlah_transaksi / $perhal);
				$no = ($page - 1) * $perhal + 1;
				while($data_transaksi = mysql_fetch_array($list_transaksi_query)){
					?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $data_transaksi[0]; ?></td>
						<td><?php echo $data_transaksi[1]; ?></td>
						<td><?php echo $data_transaksi[2]; ?></td>
						<td><?php echo $data_transaksi[3]; ?></td>
						<td>Rp.<?php echo number_format($data_transaksi[4]); ?>,-</td>
						<td>Rp.<?php echo number_format($data_transaksi[5]); ?>,-</td>
						<td>Rp.<?php echo number_format($data_transaksi[6]); ?>,-</td>
						<td>
						<?php
							if($level=="Admin"){
						?>
							<a href="delete_transaksi_action.php?action=delete&kode_transaksi=<?php echo $data_transaksi[0]; ?>" class="btn btn-danger" onclick="return window.confirm('Apakah anda yakin ingin menghapus')"><span class="glyphicon glyphicon-trash" ></span></a>
						<?php } ?>
							<a href="?link=list_transaksi&action=edit&page=<?php echo $page ?>&kode_transaksi=<?php echo $data_transaksi[0] ?>&q=<?php echo $_GET['q'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" ></span></a>
						</td>
					</tr>
					<?php
					$no++;
				}
			?>
		</table>
		<ul class="pagination">
			<?php
				for ($i=1; $i <= $halaman; $i++) { 
					$active_page = ($i==$page?"class=\"active\"":"");
					?>
					<li <?php echo $active_page ?> ><a href="?link=list_transaksi&page=<?php echo $i ?>&q=<?php echo $_GET['q'] ?>"><?php echo $i ?></a></li>
					<?php
				}
			?>
		</ul>
	</div>
</div>
<?php
}
?>

<div class="modal fade" id="modal_tambah_transaksi">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="add_transaksi_action.php">
			<div class="modal-header">
				<span class="close" data-dismiss="modal">&times;</span>
				<h4 class="modal-title">Tambah Transaksi</h4>
			</div>
			<div class="modal-body">
				<table class="table table-bordered table-hover table-responsive">
					<tr>
						<td>Kode Transaksi</td>
						<td>
							<input type="hidden" name="kode_transaksi" placeholder="Kode Transaksi" value="<?php echo "TR".rand(0,9999); ?>" class="form-control">
							<input type="text" name="kode_transaksi" placeholder="Kode Transaksi" value="<?php echo "TR".rand(0,9999); ?>" class="form-control" disabled>
						</td>
					</tr>
					<tr>
						<td>No Pegawai</td>
						<td>
							<input type="hidden" name="no_pegawai" placeholder="No Pegawai" value="<?php echo $no_pegawai; ?>" class="form-control">
							<input type="text" name="no_pegawai" placeholder="No Pegawai" value="<?php echo $no_pegawai; ?>" class="form-control" disabled>
						</td>
					</tr>
					<tr>
						<td>Tanggal Transaksi</td>
						<td>
							<input type="hidden" name="tanggal_transaksi" placeholder="Tanggal Transaksi" value="<?php echo date("Y-m-d"); ?>" class="form-control">
							<input type="date" name="tanggal_transaksi" placeholder="Tanggal Transaksi" value="<?php echo date("Y-m-d"); ?>" class="form-control" disabled>
						</td>
					</tr>
				</table>
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
