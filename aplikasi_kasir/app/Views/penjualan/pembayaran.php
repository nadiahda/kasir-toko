<div class="modal fade" id="pembayaran">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Transaksi Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <?php echo form_open('Penjualan/SimpanTransaksi') ?>
                <div class="from-group">
                    <label for="">Grand Total</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input name="grand_total" id="grand_total" value="<?= number_format($grand_total, 0) ?>" class="form-control form-control-lg" style="font-weight: bold; text-align: right; color: blue;font-size:24pt;" readonly>
                    </div>
                </div>

                <div class="from-group">
                    <label for="">Cash</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="text" name="bayar" id="bayar" class="form-control form-control-lg" style="font-weight: bold; text-align: right; color: red; font-size:24pt;" required>
                    </div>
                </div>

                <div class="from-group">
                    <label for="">Change</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input name="kembali" id="kembali" class="form-control form-control-lg" style="font-weight: bold; text-align: right; color: blue;font-size:24pt;" readonly>
                    </div>
                </div>


            </div>


            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Transaksi</button>
            </div>
            <?php echo form_close() ?>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    // $('.fpembayaran').submit(function(e) {
    //     e.preventDefault();

    //     let totalBayar = parseFloat($('#bayar').val());
    //     let totalHargaSemuaBarang = parseFloat($('#grand_total').text());

    //     if (totalBayar >= totalHargaSemuaBarang) {
    //         let kembali = totalBayar - totalHargaSemuaBarang;
    //         alert('Pembayaran berhasil!');

    //         $.ajax({
    //             type: "POST",
    //             url: "<?= base_url('Penjualan/SimpanTransaksi'); ?>",
    //             data: $('#formPembayaran').serialize(),
    //             success: function(response) {
    //                 console.log(response)
    //             }
    //         });

    //         location.reload();
    //     } else {
    //         alert('Pembayaran kurang! Jumlah yang dibayarkan harus lebih besar atau sama dengan total harga semua barang.');
    //     }

    // });

    new AutoNumeric('#bayar', {
        digitGroupSeparator: ',',
        decimalPlaces: 0
    });

    function HitungKembalian() {
        let grand_total = $('#grand_total').val().replace(/[^.\d]/g, '').toString();
        let dibayar = $('#bayar').val().replace(/[^.\d]/g, '').toString();

        let kembalian = parseFloat(dibayar) - parseFloat(grand_total);
        $('#kembali').val(kembalian);

        new AutoNumeric('#kembali', {
            digitGroupSeparator: ',',
            decimalPlaces: 0
        });
    }
</script>