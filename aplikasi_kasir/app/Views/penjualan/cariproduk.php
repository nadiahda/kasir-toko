<!-- cari produk -->
<div class="modal fade" id="cari-produk">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pencarian Data Produk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table id="example1" class="table table-bordered table-striped text-sm">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($produk as $key => $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['kode_produk'] ?></td>
                                <td><?= $value['nama_produk'] ?></td>
                                <td class="text-right">Rp. <?= number_format($value['harga_jual'], 0)  ?></td>
                                <td class="text-center"><?= $value['stok'] ?></td>
                                <td class="text-center">
                                    <button onclick="PilihProduk(<?= $value['kode_produk'] ?>)" class="btn btn-success">Pilih</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "paging": true,
            "info": true,
            "ordering": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>