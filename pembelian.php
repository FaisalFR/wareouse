
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>DATA PENERIMAAN BARANG</h2>
            </div>
            <div class="panel-body">
                <div class="table">
                    <table class="table table-striped table-bordered table-hover" id="tabelku">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Penerimaan</th>
                                <th>Tanggal Penerimaan</th>
                                <th>Nama Barang</th>
								<th>Tipe</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                                $pem = $pembelian->tampil_penerimaan();
                                foreach ($pem as $index => $data) {
                                    $jumlahb = $pembelian->hitung_item_pembelian($data['kd_pembelian']);
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $index + 1; ?></td>
                                <td><?php echo $data['kd_input']; ?></td>
                                <td><?php echo $data['tgl']; ?></td>
                                <td><?php echo $data['nama_barang']; ?></td>
                                <td><?php echo $data['tipe']; ?></td>
                                <td><?php echo $data['jumlah']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>   
            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>