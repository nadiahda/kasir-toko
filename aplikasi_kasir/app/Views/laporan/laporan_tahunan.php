<div class="col-md-12">
    <div class="card card-navy ">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tahun :</label>
                        <div class="col-10 input-group">
                            <select name="tahun" id="tahun" class="form-control">
                                <option value="">Pilih Tahun</option>
                                <?php
                                $mulai = date('Y') - 1;
                                for ($i = $mulai; $i < $mulai + 5; $i++) {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }

                                ?>
                            </select>
                            <span class="input-group-append">
                                <button onclick="ViewTabelLaporan()" class="btn btn-primary btn-flat">
                                    <i class="fas fa-file-alt"></i> View Laporan
                                </button>
                                <button onclick="PrintLaporan()" class="btn btn-dark btn-flat">
                                    <i class="fas fa-print"></i> Print Laporan
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <hr>
                    <div class="tabel">

                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<script>
    function ViewTabelLaporan() {
        let tahun = $('#tahun').val();
        $.ajax({
            type: "POST",
            url: "<?= base_url('Laporan/ViewLaporanTahunan') ?>",
            data: {
                tahun: tahun,
            },
            dataType: "JSON",
            success: function(response) {
                if (response.data) {
                    $('.tabel').html(response.data)
                }
            }
        });
    }

    function PrintLaporan() {
        let tahun = $('#tahun').val();
        if (tahun == '') {
            Swal.fire("Tahun Belum Diplih !!");
        } else {
            newWin = window.open('<?= base_url('Laporan/PrintLaporanTahunan') ?>/' + tahun)
        }
    }
</script>