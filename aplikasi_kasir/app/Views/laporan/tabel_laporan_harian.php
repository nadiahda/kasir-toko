<div class="row">
    <div class="col-12 text-center">

        <address>
            <i class="fas fa-shopping-cart fa-3x"></i>
            <b>
                <font size="9">Nadia Store</font>
            </b><br>
            <strong>Jalan Krikil, Desa Maniskidul, Kec. Jalaksana</strong><br>
            No. Telp : 0859-2980-8895<br>
        </address>

    </div>
    <!-- /.col -->
    <div class="col-12 text-center">
        <hr>
        <b>
            <h4><b><?= $judul ?></b></h4>
        </b>
    </div>
    <div class="col-12">
        <b>Tanggal :</b> <?= $tgl ?>
        <table class="table table-bordered table-striped">
            <tr class="text-center bg-navy">
                <th>No</th>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>QTY</th>
                <th>Total Harga</th>
                <th>Total Untung</th>
            </tr>
            <?php $no = 1;
            foreach ($dataharian as $key => $value) {
                $grandtotal[] = $value['total_harga'];
                $untung[] = $value['untung'];
            ?>
                <tr>
                    <th class="text-center"><?= $no++ ?></th>
                    <th class="text-center"><?= $value['kode_produk'] ?></th>
                    <th><?= $value['nama_produk'] ?></th>
                    <th class="text-right">Rp.<?= number_format($value['modal'], 0) ?></th>
                    <th class="text-right">Rp.<?= number_format($value['harga'], 0) ?></th>
                    <th class="text-center"><?= $value['qty'] ?></th>
                    <th class="text-right">Rp.<?= number_format($value['total_harga'], 0) ?></th>
                    <th class="text-right">Rp.<?= number_format($value['untung'], 0) ?></th>
                </tr>
            <?php } ?>
            <tr>
                <td class="text-center bg-gray" colspan="6">
                    <h5>Grand Total</h5>
                </td>
                <td class="text-right">Rp. <?= $dataharian == null ? '' : number_format(array_sum($grandtotal), 0)  ?></td>
                <td class="text-right">Rp. <?= $dataharian == null ? '' : number_format(array_sum($untung), 0)  ?></td>
            </tr>
        </table>
    </div>
</div>