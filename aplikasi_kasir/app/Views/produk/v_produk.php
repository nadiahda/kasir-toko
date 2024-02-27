<div class="col-md-12">
    <div class="card card-navy ">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>

            <div class="card-tools">
                <button type="button" onclick="window.open('<?= base_url('Laporan/PrintDataProduk') ?>')" class="btn btn-tool"><i class="fas fa-print"></i> Print
                    <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-data"><i class="fas fa-plus"></i> Add Data
                    </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <?php
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
            ?>

            <?php
            $errors = session()->getFlashdata('errors');
            if (!empty($errors)) { ?>
                <div class="alert alert-danger alert-dismissible">
                    Periksa Lagi Entry Form !!
                    <ul>
                        <?php foreach ($errors as $key => $error) { ?>
                            <li><?= esc($error) ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Satuan</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($produk as $key => $value) { ?>
                        <tr class="<?= $value['stok'] == 0 ? 'bg-danger' : '' ?>">
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value['kode_produk'] ?></td>
                            <td><?= $value['nama_produk'] ?></td>
                            <td class="text-center"><?= $value['nama_kategori'] ?></td>
                            <td class="text-center"><?= $value['nama_satuan'] ?></td>
                            <td class="text-right">Rp. <?= number_format($value['harga_beli'], 0)  ?></td>
                            <td class="text-right">Rp. <?= number_format($value['harga_jual'], 0)  ?></td>
                            <td class="text-center"><?= $value['stok'] ?></td>
                            <td class="text-center">
                                <button class="btn btn-dark btn-sm " data-toggle="modal" data-target="#edit-data<?= $value['id_produk'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger btn-sm " data-toggle="modal" data-target="#hapus-data<?= $value['id_produk'] ?>"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- add data -->
<div class="modal fade" id="add-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Data <?= $subjudul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('Produk/InsertData') ?>
            <div class="modal-body">

                <div class="from-group">
                    <label for="">Kode Produk</label>
                    <input type="text" name="kode_produk" class="form-control" value="<?= old('kode_produk') ?>" placeholder="kode produk" required>
                </div>

                <div class="from-group">
                    <label for="">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" value="<?= old('nama_produk') ?>" placeholder="nama produk" required>
                </div>

                <div class="from-group">
                    <label for="">Kategori</label>
                    <select name="id_kategori" class="form-control">
                        <option value="">--Pilih Kategori--</option>
                        <?php foreach ($kategori as $key => $value) { ?>
                            <option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="from-group">
                    <label for="">Satuan</label>
                    <select name="id_satuan" class="form-control">
                        <option value="">--Pilih Satuan--</option>
                        <?php foreach ($satuan as $key => $value) { ?>
                            <option value="<?= $value['id_satuan'] ?>"><?= $value['nama_satuan'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="from-group">
                    <label for="">Harga Beli</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="text" name="harga_beli" id="harga_beli" class="form-control" value="<?= old('harga_beli') ?>" placeholder="harga beli" required>
                    </div>
                </div>

                <div class="from-group">
                    <label for="">Harga Jual</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="text" name="harga_jual" id="harga_jual" class="form-control" value="<?= old('harga_jual') ?>" placeholder="harga jual" required>
                    </div>
                </div>

                <div class="from-group">
                    <label for="">Stok</label>
                    <input type="number" name="stok" class="form-control" value="<?= old('stok') ?>" placeholder="stok" required>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark">Save</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- edit data -->
<?php foreach ($produk as $key => $value) { ?>
    <div class="modal fade" id="edit-data<?= $value['id_produk'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data <?= $subjudul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('Produk/UpdateData/' . $value['id_produk']) ?>
                <div class="modal-body">

                    <div class="from-group">
                        <label for="">Kode Produk</label>
                        <input type="text" name="kode_produk" class="form-control" value="<?= $value['kode_produk'] ?>" placeholder="kode produk" readonly>
                    </div>

                    <div class="from-group">
                        <label for="">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control" value="<?= $value['nama_produk'] ?>" placeholder="nama produk" required>
                    </div>

                    <div class="from-group">
                        <label for="">Kategori</label>
                        <select name="id_kategori" class="form-control">
                            <option value="">--Pilih Kategori--</option>
                            <?php foreach ($kategori as $key => $k) { ?>
                                <option value="<?= $k['id_kategori'] ?>" <?= $value['id_kategori'] == $k['id_kategori'] ? 'Selected' : '' ?>><?= $k['nama_kategori'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="from-group">
                        <label for="">Satuan</label>
                        <select name="id_satuan" class="form-control">
                            <option value="">--Pilih Satuan--</option>
                            <?php foreach ($satuan as $key => $s) { ?>
                                <option value="<?= $s['id_satuan'] ?>" <?= $value['id_satuan'] == $s['id_satuan'] ? 'Selected' : '' ?>><?= $s['nama_satuan'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="from-group">
                        <label for="">Harga Beli</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" name="harga_beli" id="harga_beli<?= $value['id_produk'] ?>" class="form-control" value="<?= $value['harga_beli'] ?>" placeholder="harga beli" required>
                        </div>
                    </div>

                    <div class="from-group">
                        <label for="">Harga Jual</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" name="harga_jual" id="harga_jual<?= $value['id_produk'] ?>" class="form-control" value="<?= $value['harga_jual'] ?>" placeholder="harga jual" required>
                        </div>
                    </div>

                    <div class="from-group">
                        <label for="">Stok</label>
                        <input type="number" name="stok" class="form-control" value="<?= $value['stok'] ?>" placeholder="stok" required>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Save</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>

<!-- hapus data -->
<?php foreach ($produk as $key => $value) { ?>
    <div class="modal fade" id="hapus-data<?= $value['id_produk'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data <?= $subjudul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <p>Apakah Anda Yakin Hapus <b><?= $value['nama_produk'] ?></b> ?</p>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('Produk/DeleteData/' . $value['id_produk']) ?>" class="btn btn-danger">Delete</a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

<?php } ?>


<script>
    new AutoNumeric('#harga_beli', {
        digitGroupSeparator: ',',
        decimalPlaces: 0
    });

    new AutoNumeric('#harga_jual', {
        digitGroupSeparator: ',',
        decimalPlaces: 0
    });
    <?php foreach ($produk as $key => $value) { ?>
        new AutoNumeric('#harga_beli<?= $value['id_produk'] ?>', {
            digitGroupSeparator: ',',
            decimalPlaces: 0
        });

        new AutoNumeric('#harga_jual<?= $value['id_produk'] ?>', {
            digitGroupSeparator: ',',
            decimalPlaces: 0
        });
    <?php } ?>
</script>