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
                <H2>Master Data Barang</H2>
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
                                    <a href="index.php?page=ubahbarang&id=<?php echo $data['kd_barang']; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ubah</a>
                                    <a href="index.php?page=barang&hapus=<?php echo $data['kd_barang']; ?>" class="btn btn-danger btn-xs" id="alertHapus"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>   
            </div>
            <div class="panel-footer">
                <a href="index.php?page=tambahbarang" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Barang</a>
            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>