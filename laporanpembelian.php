<?php  
	
?>
<div class="row">
	<div class="col-md-12">
		<h2>Laporan Barang Masuk</h2>
	</div>
	<br/><br/>
	<hr/>
	<br/>
	<div class="col-md-12">
		<form method="POST" class="form-inline">
			<div class="form-group">
				<input type="date" id="tgl1" class="form-control" name="tgl1">
			</div>
			<div class="form-group">
				<label>  Sampai  </label>
				<input type="date" id="tgl2" class="form-control" name="tgl2">
			</div>
			<div class="form-group">
				<button id="formbtn" name="prosess" class="btn btn-primary"><i class="fa fa-play-circle-o"></i> Prosess</button>
				<button class="btn btn-success" name="semua"><i class="fa fa-play-circle-o"></i> Semua Data</button>
			</div>
		</form>
	</div>
</div>
<hr/>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">

			<div class="panel-body">
				<table class="table table-bordered table-hover">
					<thead>
						<tr class="active">
							<th>No</th>
							<th>Kode Penerimaan</th>
							<th>Tgl Penerimaan</th>
							<th>Kode Barang</th>
							<th>Nama Barang</th>
							<th>Tipe Barang</th>
							<th>Jumlah</th>
						</tr>
					</thead>
					<tbody>
					<?php  
						if (isset($_POST['prosess'])) {
							$cek = $laporan->cek_pembelian_bulan($_POST['tgl1'],$_POST['tgl2']);
							if ($cek === false) {
								echo "<tr><td colspan='8' align='center'>Data Kososng</td></tr>";
							}
							else{
							$lapbl = $laporan->tampil_pembelian_bulan($_POST['tgl1'],$_POST['tgl2']);
							foreach ($lapbl as $index => $data) {
					?>
						<tr>
							<td><?php echo $index + 1; ?></td>
							<td><?php echo $data['kd_input']; ?></td>
							<td><?php echo date_format(date_create($data['tgl']),'d-m-Y'); ?></td>
							<td><?php echo $data['kd_barang']; ?></td>
							<td><?php echo $data['nama_barang']; ?></td>
							<td><?php echo $data['tipe']; ?></td>
							<td><?php echo $data['jumlah']; ?></td>
						</tr>
					<?php
						}
					?>
					<?php
						}?>
						
					<?php
					}
						elseif (isset($_POST['semua'])) {
							$cek = $laporan->cek_pembelian();
							if ($cek === false) {
								echo "<tr><td colspan='8' align='center'>Data Kososng</td></tr>";
							}
							else{
							$lap = $laporan->tampil_pembelian();
							foreach ($lap as $index => $data) {
					?>
						<tr>
							<td><?php echo $index + 1; ?></td>
							<td><?php echo $data['kd_input']; ?></td>
							<td><?php echo date_format(date_create($data['tgl']),'d-m-Y'); ?></td>
							<td><?php echo $data['kd_barang']; ?></td>
							<td><?php echo $data['nama_barang']; ?></td>
							<td><?php echo $data['tipe']; ?></td>
							<td><?php echo $data['jumlah']; ?></td>
						</tr>
					<?php
						}
					?>
					<?php
						}?>
					<?php
						}
						else{
					?>
	
					<?php
						}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>