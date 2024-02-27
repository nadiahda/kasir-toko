<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProduk;
use App\Models\ModelLaporan;


class Laporan extends BaseController
{
    public function __construct()
    {
        $this->ModelProduk = new ModelProduk();
        $this->ModelLaporan = new ModelLaporan();
    }

    public function PrintDataProduk()
    {
        $data = [
            'judul' => 'Laporan Data Produk',
            'produk' => $this->ModelProduk->allData(),
            'page' => 'laporan/print_lap_produk'
        ];
        return view('laporan/template_print', $data);
    }

    public function LaporanHarian()
    {
        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Laporan Harian',
            'menu' => 'laporan',
            'submenu' => 'laporan-harian',
            'page' => 'laporan/laporan_harian',

        ];
        return view('v_template', $data);
    }

    public function ViewLaporanHarian()
    {
        $tgl = $this->request->getPost('tgl');
        $data = [
            'judul' => 'Laporan Harian',
            'dataharian' =>  $this->ModelLaporan->DataHarian($tgl),
            'tgl' => $tgl,
        ];

        $response = [
            'data' => view('laporan/tabel_laporan_harian', $data)
        ];
        echo json_encode($response);
    }

    public function PrintLaporanHarian($tgl)
    {
        $data = [
            'judul' => 'Laporan Penjualan Harian',
            'page' => 'laporan/print_lap_harian',
            'dataharian' => $this->ModelLaporan->DataHarian($tgl),
            'tgl' => $tgl,
        ];
        return view('laporan/template_print', $data);
    }

    public function LaporanBulanan()
    {
        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Laporan Bulanan',
            'menu' => 'laporan',
            'submenu' => 'laporan-bulanan',
            'page' => 'laporan/laporan_bulanan',

        ];
        return view('v_template', $data);
    }

    public function ViewLaporanBulanan()
    {
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'judul' => 'Laporan Bulanan',
            'databulanan' =>  $this->ModelLaporan->DataBulanan($bulan, $tahun),
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];

        $response = [
            'data' => view('laporan/tabel_laporan_bulanan', $data)
        ];
        echo json_encode($response);
    }

    public function PrintLaporanBulanan($bulan, $tahun)
    {
        $data = [
            'judul' => 'Laporan Penjualan Bulanan',
            'databulanan' =>  $this->ModelLaporan->DataBulanan($bulan, $tahun),
            'page' => 'laporan/print_lap_bulanan',
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];
        return view('laporan/template_print', $data);
    }

    public function LaporanTahunan()
    {
        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Laporan Tahunan',
            'menu' => 'laporan',
            'submenu' => 'laporan-tahunan',
            'page' => 'laporan/laporan_tahunan',

        ];
        return view('v_template', $data);
    }

    public function ViewLaporanTahunan()
    {
        $tahun = $this->request->getPost('tahun');
        $data = [
            'judul' => 'Laporan Tahunan',
            'datatahunan' =>  $this->ModelLaporan->DataTahunan($tahun),
            'tahun' => $tahun,
        ];

        $response = [
            'data' => view('laporan/tabel_laporan_tahunan', $data)
        ];
        echo json_encode($response);
    }

    public function PrintLaporanTahunan($tahun)
    {
        $data = [
            'judul' => 'Laporan Penjualan Tahunan',
            'datatahunan' =>  $this->ModelLaporan->DataTahunan($tahun),
            'page' => 'laporan/print_lap_tahunan',
            'tahun' => $tahun,
        ];
        return view('laporan/template_print', $data);
    }
}
