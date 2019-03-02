<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title" style="padding-top:0; margin-top:0; color:#f00;">Input Data Barang</h3>
			</div>
			<hr/>
			<div class="box-body">	
				<?php 
					if (isset($_POST['save'])) {
						$barang->simpan_barang($_POST['kdbarang'],$_POST['nama'],$_POST['tipe'],$_POST['merk']
							,$_POST['lokasi'],0);
						echo "<div class='alert alert-info alert-dismissable' id='divAlert'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                Data Tersimpan
                                </div>";
					}
				?>	
				<form method="POST" id="forminput" enctype="multipart/form-data">
					<div class="form-group">
						<label>Kode Barang</label>
						<input type="text" style="text-transform:uppercase" class="form-control" name="kdbarang" id="kdbarang" placeholder="Masukan Kode Barang, Ex: BRG00001" maxlength="8">
						<div id="showresult" style="padding-top:4px; padding-bottom:0;"></div>
					</div>
					<div class="form-group">
						<label>Nama Barang</label>
						<input type="text" style="text-transform:uppercase" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Barang">
					</div>
					
					<div class="form-group">
						<label>Tipe</label>
						<input type="text" style="text-transform:uppercase" class="form-control" name="tipe" id="tipe" placeholder="Masukan Tipe">
					</div>
					<div class="form-group">
						<label>Merk</label>
						<input type="text" style="text-transform:uppercase" class="form-control" name="merk" id="merk" placeholder="Masukan Merk">
					</div>
					<div class="form-group">
						<label>Lokasi</label>
						<input type="text" style="text-transform:uppercase" class="form-control" name="lokasi" id="lokasi" placeholder="Masukan Lokasi">
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
		$('#kdbarang').focusout(function() {
        	// Uppercase-ize contents
        	this.value = this.value.toLocaleUpperCase();
    	});
    	$('#nama').focusout(function() {
        	// Uppercase-ize contents
        	this.value = this.value.toLocaleUpperCase();
    	});
		$('#tipe').focusout(function() {
        	// Uppercase-ize contents
        	this.value = this.value.toLocaleUpperCase();
    	});
		$('#merk').focusout(function() {
        	// Uppercase-ize contents
        	this.value = this.value.toLocaleUpperCase();
    	});
		$('#lokasi').focusout(function() {
        	// Uppercase-ize contents
        	this.value = this.value.toLocaleUpperCase();
    	});
	});
	//fungsi hide div
	$(function(){
		setTimeout(function(){$("#divAlert").fadeOut(900)}, 500);
	});
	//ajax
	$(document).ready(function(){
		$('#kdbarang').blur(function(){
			var kdbarang = $(this).val();
			if (kdbarang == "") {
				$('#showresult').html("");
			}
			else{
				$.ajax({
					url: "validasi/cek-kdbarang.php?kdbarang="+kdbarang
				}).done(function(data){
					$('#showresult').html(data);
				});
			}
		});
	});
	//validasi form
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
	        var input = kdbarang.value;
			if (!validateText('kdbarang')) {
				$('#kdbarang').focus();
				return false;
			}
			else if (!(/^\S{0,}$/.test(input))) {
	           	$('#kdbarang').focus();
	           	bootbox.alert('Tidak Boleh Menggunakan Spasi');
	            return false;
	        }

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

			return true;
		});
	});
</script>
