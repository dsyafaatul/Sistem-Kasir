<?php
$jumlah_user = mysql_result(mysql_query("SELECT count(*) FROM tabel_user"),0);
$jumlah_barang = mysql_result(mysql_query("SELECT count(*) FROM tabel_barang"),0);
$jumlah_transaksi = mysql_result(mysql_query("SELECT count(*) FROM tabel_transaksi WHERE status='yes'"),0);
?>
<div class="row">
<div class="col-xs-12 col-md-4">
	<div class="well bg-red" >
		<h4>Jumlah Kasir</h4>
		<h1><?php echo $jumlah_user ?></h1>
	</div>
</div>
<div class="col-xs-12 col-md-4">
	<div class="well bg-orange" >
		<h4>Jumlah Barang</h4>
		<h1><?php echo $jumlah_barang ?></h1>
	</div>
</div>
<div class="col-xs-12 col-md-4">
	<div class="well bg-blue" >
		<h4>Jumlah Transaksi</h4>
		<h1><?php echo $jumlah_transaksi ?></h1>
	</div>
</div>
</div>
		<div class="row">
			<?php
				$data_kasir_query = mysql_fetch_array(mysql_query("SELECT * FROM tabel_kasir WHERE no_pegawai='$no_pegawai'"));
			?>
			<div class="col-md-12">
				<table class="table table-bordered table-responsive table-hover">
					<tr>
						<td>No Pegawai</td>
						<td><?php echo $data_kasir_query[0]; ?></td>
					</tr>
					<tr>
						<td>Nama Pegawai</td>
						<td><?php echo $data_kasir_query[1]; ?></td>
					</tr>
					<tr>
						<td>Level</td>
						<td><?php echo $level; ?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>
							<?php
								if($data_kasir_query[2]=="L"){
									echo "Laki-Laki";
								}else{
									echo "Perempuan";
								}
							?>	
						</td>
					</tr>
					<tr>
						<td>Tempat Tanggal Lahir</td>
						<td>
							<?php
								echo $data_kasir_query[3].", ".$data_kasir_query[4];
							?>
						</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td><?php echo $data_kasir_query[5]; ?></td>
					</tr>
					<tr>
						<td>No Telepon</td>
						<td>
							<?php echo $data_kasir_query[6]; ?>
						</td>
					</tr>
				</table>
			</div>
		</div>