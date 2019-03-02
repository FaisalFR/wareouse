<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title" style="padding-top:0; margin-top:0; color:#f00;">Ubah Barang</h3>
			</div>
			<hr/>
			<div class="box-body">	
				<?php 
					if (isset($_POST['save'])) {
						$barang->ubah_barang($_POST['nama'],$_POST['tipe'],$_POST['merk']
							,$_POST['lokasi'],$_POST['stok'],$_GET['id']);
						echo "<script>bootbox.alert('Data Terubah', function(){
							window.location = 'index.php?page=barang';
						});</script>";
					}
					$brg = $barang->ambil_barang($_GET['id']);
				?>	
				<form method="POST" id="forminput" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama Barang</label>
						<input type="text" class="form-control" name="nama" id="nama"  value="<?php echo $brg['nama_barang']; ?>" placeholder="Masukan Nama Barang">
					</div>
					<div class="form-group">
						<label>Tipe</label>
						<input type="text" style="text-transform:uppercase" class="form-control" name="tipe" id="tipe"  value="<?php echo $brg['tipe']; ?>" placeholder="Masukan Tipe">
					</div>
					<div class="form-group">
						<label>Merk</label>
						<input type="text" style="text-transform:uppercase" class="form-control" name="merk" id="merk"  value="<?php echo $brg['merk']; ?>" placeholder="Masukan Merk">
					</div>
					<div class="form-group">
						<label>Lokasi</label>
						<input type="text" style="text-transform:uppercase" class="form-control" name="lokasi" id="lokasi"  value="<?php echo $brg['lokasi']; ?>" placeholder="Masukan Lokasi">
					</div>
					<div class="form-group">
						<label>Stok</label>
						<input type="number" class="form-control" name="stok" id="stok" value="<?php echo $brg['stok']; ?>" min="0" max="10000">
					</div>
					<button id="formbtn" class="btn btn-primary" name="save"><i class="fa fa-save"></i> Simpan</button>
					<a href="index.php?page=barang" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back to barang</a>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	//upper
	$(function(){
		$('#tipe').focusout(function() {
        	// Uppercase-ize contents
        	this.value = this.value.toLocaleUpperCase();
    	});
	});
	//fungsi hide div
	$(function(){
		setTimeout(function(){$("#divAlert").fadeOut(900)}, 500);
	});
	function validateText(id){
		if ($('#'+id).val()== null || $('#'+id).val()== "") {
			var div = $('#'+id).closest('div');
			div.addClass("has-error has-feedback");
			return false;
		}
		else{
			var div = $('#'+id).closest('div');
			div.removeClass("has-error has-feedback");
			return true;	
		}
	}
	$(document).ready(function(){
		$("#formbtn").click(function(){
			if (!validateText('nama')) {
				$('#nama').focus();
				return false;
			}
			if (!validateText('tipe')) {
				$('#tipe').focus();
				return false;
			}
			if (!validateText('merk')) {
				$('#merk').focus();
				return false;
			}
			if (!validateText('lokasi')) {
				$('#lokasi').focus();
				return false;
			}
			if (!validateText('stok')) {
				$('#stok').focus();
				return false;
			}
			return true;
		});
	});
</script>
