<?php  
    if (isset($_GET['hapus'])) {
        $barang->hapus_barang($_GET['hapus']);
        echo "<script>location='index.php?page=barang';</script>";
    }
?>
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>INPUT DATA BARANG MASUK</h2>
            </div>
            <div class="panel-body">
                <div class="table">
                    <table class="table table-striped table-bordered table-hover" id="tabelku">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Tipe</th>
                                <th>Merk</th>
                                <th>Lokasi</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                                $brg = $barang->tampil_barang();
                                foreach ($brg as $index => $data) {
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $index + 1; ?></td>
                                <td><?php echo $data['kd_barang']; ?></td>
                                <td><?php echo $data['nama_barang']; ?></td>
                                <td><?php echo $data['tipe']; ?></td>
                                <td><?php echo $data['merk']; ?></td>
                                <td><?php echo $data['lokasi']; ?></td>
                                <td><?php echo $data['stok']; ?></td>
                                <td>
                                    <a href="index.php?page=tambahpembelian&masuk=<?php echo $data['kd_barang']; ?>" class="btn btn-info btn-xs"><i class="fa fa-plus"></i> PILIH</a>
                                    
                                </td>
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