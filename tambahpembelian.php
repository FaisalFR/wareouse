<div class="row">
  <div class="col-md-12">
    <h2>FORM PENERIMAAN BARANG</h2>   
  </div>

<?php 
	$kode = $pembelian->kode_otomatis();
?>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				 Detail Data Barang
			</div>
			<div class="panel-body">
				<form method="POST">	
					
			<?php 
			    if (isset($_GET['masuk'])) {
				$brg = $barang->ambil_barang($_GET['masuk']);
				$kdbarang = $brg['kd_barang'];
				
				?>	
				<div class="form-group">
					<h4>Kode Barang : <?php echo $brg['kd_barang']; ?></h4>   
					<h5>Nama Barang : <?php echo $brg['nama_barang']; ?></h5>
					<h5>Tipe        : <?php echo $brg['tipe']; ?></h5>
					<h5>Merk        : <?php echo $brg['merk']; ?></h5>
					<h5>Lokasi      : <?php echo $brg['lokasi']; ?></h5>
					<h5>Stok        : <?php echo $brg['stok']; ?></h5>
					<p> </p>
				</div>
               
					
				
				
			</div>
			
				</form>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				Detail Data Penerimaan
			</div>
			<div class="panel-body">
				<!--Form-->
				<form method="POST">
					<div class="form-group">
						<label>Kode Penerimaan</label>
						<input type="text" class="form-control" name="kdinput" id="kdinput" maxlength="8" readonly="true" value="<?php echo $kode; ?>">
					</div>
					<div class="form-group">
						<label>Tanggal Penerimaan</label>
						<input type="date" class="form-control" name="tglinput" id="tglinput">
					</div>
					<div class="form-group">
						<label>Jumlah</label>
						<input type="text" style="text-transform:uppercase" class="form-control" name="jumlah" id="jumlah" placeholder="Masukan Satuan">
					</div>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		
		<div class="form-group" align="center">
		<button class="btn btn-primary" name="save"><i class="fa fa-save"></i> Simpan</button>
		<a href="index.php?page=detailbarang" class="btn btn-warning"><i class="fa fa-arrow-right"></i> Back</a>
		</div>				
	</form><!--End Form-->
	</div>
	<?php 
			
	if (isset($_POST['save'])) {
		$pembelian->simpan_penerimaan($_POST['kdinput'],$kdbarang, $_POST['tglinput'],$_POST['jumlah']);
		echo "<script>location='index.php?page=detailbarang';</script>";
	}


			
				} 
				?>
</div>
<script>
	//upper
	$(function(){
    	$('#satuan').focusout(function() {
        	// Uppercase-ize contents
        	this.value = this.value.toLocaleUpperCase();
    	});
	});
	//fungsi hide div
	$(function(){
		setTimeout(function(){$("#divAlert").fadeOut(900)}, 500);
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
			if (!validateText('tglpembelian')) {
				$('#tglpembelian').focus();
				return false;
			}
			else if (!validateText('supplier')) {
				$('#supplier').focus();
				return false;
			}
			return true;
		});
	});
	$(document).ready(function(){
		$("#tambah").click(function(){
			if (!validateText('nama')) {
				$('#nama').focus();
				return false;
			}
			else if (!validateText('satuan')) {
				$('#satuan').focus();
				return false;
			}
			else if (!validateText('hargab')) {
				$('#hargab').focus();
				return false;
			}
			else if (!validateText('item')) {
				$('#item').focus();
				return false;
			}
			return true;
		});
	});
</script>