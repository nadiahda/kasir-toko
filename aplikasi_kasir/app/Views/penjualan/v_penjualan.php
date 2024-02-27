<?php

use Kint\Zval\Value;
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaksi Penjualan</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">

    <!-- table -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">

    <!-- jQuery -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('AdminLTE') ?>/dist/js/adminlte.min.js"></script>
    <!-- auto numeric -->
    <script src="<?= base_url('autoNumeric') ?>/src/autoNumeric.js"></script>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="../../index3.html" class="navbar-brand">

                    <span class="brand-text font-weight-light">
                        <li class="fas fa-shopping-cart text-primary"></li><b> Transaksi Penjualan</b>
                    </span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">


                    <!-- Right navbar links -->
                    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

                        <li class="nav-item">
                            <?php if (session()->get('level') == 'Admin') { ?>
                                <a class="nav-link" href="<?= base_url('Admin') ?>">
                                    <i class="fas fa-tachometer-alt"> Dashboard</i>
                                </a>
                            <?php } else { ?>
                                <a class="nav-link" href="<?= base_url('Home/Logout') ?>">
                                    <i class="fas fa-sign-in-alt"> Logout</i>
                                </a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <!-- Main content -->
            <div class="content">
                <div class="row">

                    <!-- /.col-md-6 -->
                    <div class="col-lg-7">

                        <div class="card card-primary card-outline">

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>No Faktur</label>
                                            <label class="form-control text-danger" id="no_faktur"><?= $no_faktur ?></label>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <label class="form-control" id="tanggal"><?= date('d M Y') ?></label>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Jam</label>
                                            <label class="form-control" id="jam"></label>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Kasir</label>
                                            <label class="form-control text-primary">
                                                <?= session()->get('nama') ?>
                                            </label>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">

                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="card-title m-0"></h5>
                            </div>
                            <div class="card-body bg-black color-pallete text-right">
                                <label class="display-4 text-green">Rp. <?= number_format($grand_total) ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12">
                                        <?php echo form_open('Penjualan/InsertCart') ?>
                                        <div class="row">
                                            <div class="col-2 input-group">
                                                <input name="kode_produk" id="kode_produk" class="form-control" placeholder="kode produk" autocomplete="off">
                                                <span class="input-group-append">
                                                    <a class="btn btn-primary btn-flat" data-toggle="modal" data-target="#cari-produk">
                                                        <i class="fas fa-search"></i>
                                                    </a>
                                                    <button type="reset" class="btn btn-danger btn-flat">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </span>
                                            </div>

                                            <div class="col-3">
                                                <input name="nama_produk" class="form-control" placeholder="nama produk" readonly>
                                            </div>
                                            <div class="col-1">
                                                <input name="nama_kategori" class="form-control" placeholder="kategori" readonly>
                                            </div>
                                            <div class="col-1">
                                                <input name="nama_satuan" class="form-control" placeholder="satuan" readonly>
                                            </div>
                                            <div class="col-1">
                                                <input name="harga_jual" class="form-control" placeholder="harga" readonly>
                                            </div>
                                            <div class="col-1">
                                                <input id="qty" type="number" min="1" value="1" name="qty" class="form-control text-center" placeholder="qty">
                                            </div>
                                            <input type="hidden" name="harga_beli">
                                            <div class="col-3">
                                                <button type="submit" class="btn btn-primary btn-flat"><i class="fas fa-cart-plus"> Add</i></button>

                                                <a href="<?= base_url('Penjualan/ResetCart') ?>" class="btn btn-warning btn-flat"><i class="fas fa-sync"> Clear</i></a>
                                                <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#pembayaran" onclick="pembayaran()"><i class="fas fa-cash-register"> Pembayaran</i></a>
                                            </div>

                                        </div>
                                        <?php echo form_close() ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Kode Produk</th>
                                                    <th>Nama Produk</th>
                                                    <th>Kategori</th>
                                                    <th>Harga Jual</th>
                                                    <th width="100px">Qty</th>
                                                    <th>Total Harga</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($cart as $key => $value) { ?>
                                                    <tr>
                                                        <td><?= $value['id'] ?></td>
                                                        <td><?= $value['name'] ?></td>
                                                        <td><?= $value['options']['nama_kategori'] ?></td>
                                                        <td class="text-right">Rp. <?= number_format($value['price'], 0) ?></td>
                                                        <td class="text-center"><?= $value['qty'] ?> <?= $value['options']['nama_satuan'] ?></td>
                                                        <td class="text-right">Rp. <?= number_format($value['subtotal'], 0) ?> </td>
                                                        <td class="text-center">
                                                            <a href="<?= base_url('Penjualan/RemoveItemCart/' . $value['rowid']) ?>" class="text-danger"><i class="fas fa-times"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12">

                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- cari produk -->
        <?php include('cariproduk.php'); ?>

        <!-- pembayaran -->
        <?php include('pembayaran.php'); ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- Default to the left -->
            <strong>Point Of Sale Nadiyatul Huda.</strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <script>
        // menampilkan alert pesan warning
        <?php if (session()->getFlashdata('warning')) { ?>
            swal.fire({
                title: 'Peringatan!',
                text: '<?= session()->getFlashdata('warning') ?>',
                icon: 'warning'
            });
        <?php } ?>

        // menampilkan alert pesan success
        <?php if (session()->getFlashdata('pesan')) { ?>
            swal.fire({
                title: 'Berhasil!',
                text: '<?= session()->getFlashdata('pesan') ?>',
                icon: 'success'
            });
        <?php } ?>

        $(document).ready(function() {
            $('#kode_produk').focus();
            $('#kode_produk').keydown(function(e) {
                let kode_produk = $('#kode_produk').val();
                if (e.keyCode == 13) {
                    e.preventDefault();
                    if (kode_produk == '') {
                        Swal.fire("Kode Produk Belum Diinput !!");
                    } else {
                        CekProduk();
                    }
                }
            });

            // hitung kembalian
            $('#bayar').keyup(function(e) {
                HitungKembalian();
            });


        });



        function CekProduk() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Penjualan/CekProduk') ?>",
                data: {
                    kode_produk: $('#kode_produk').val(),
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.nama_produk == '') {
                        Swal.fire("Kode Produk Tidak Terdaftar Di Database !!");
                    } else {
                        $('[name="nama_produk"]').val(response.nama_produk);
                        $('[name="nama_kategori"]').val(response.nama_kategori);
                        $('[name="nama_satuan"]').val(response.nama_satuan);
                        $('[name="harga_jual"]').val(response.harga_jual);
                        $('[name="harga_beli"]').val(response.harga_beli);
                        $('#qty').focus();
                    }
                }
            });
        }

        function PilihProduk(kode_produk) {
            $('#kode_produk').val(kode_produk);
            $('#cari-produk').modal('hide');
            $('#kode_produk').focus();
        }

        function Pembayaran() {
            $('#pembayaran').modal('show');
        }

        // new AutoNumeric('#bayar', {
        //     digitGroupSeparator: ',',
        //     decimalPlaces: 0
        // });

        // new AutoNumeric('#kembali', {
        //     digitGroupSeparator: ',',
        //     decimalPlaces: 0
        // });

        // function HitungKembalian() {
        //     $grand_total = parseFloat(document.getElementById("grand_total").value);
        //     $bayar = parseFloat(document.getElementById("bayar").value);
        //     $kembali = $bayar - $grand_total;
        //     document.getElementById("kembali").value = $kembali;
        // }

        // function HitungKembalian() {
        //     let totalpembayaran = $('#grand_total').AutoNumeric('get');
        //     let jumlahuang = ($('#bayar').val() == "") ? 0 : $('#bayar').AutoNumeric('get');

        //     kembali = parseFloat(jumlahuang) - parseFloat(totalpembayaran);

        //     $('#kembali').val(kembali);

        //     let kembalix = $('#kembali').val();
        //     $('#kembali').AutoNumeric('set', kembalix);
        // }
    </script>

    <script>
        window.onload = function() {
            startTime();
        }

        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('jam').innerHTML = h + ":" + m + ":" + s;
            var t = setTimeout(function() {
                startTime();
            }, 1000);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }
            return i;
        }
    </script>

</body>

</html>