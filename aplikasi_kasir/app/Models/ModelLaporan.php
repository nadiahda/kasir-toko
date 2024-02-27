<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLaporan extends Model
{
    public function DataHarian($tgl)
    {
        return $this->db->table('detail_penjualan')
            ->join('produk', 'produk.kode_produk=detail_penjualan.kode_produk')
            ->join('penjualan', 'penjualan.no_faktur=detail_penjualan.no_faktur')
            ->where('penjualan.tgl_jual', $tgl)
            ->select('detail_penjualan.kode_produk')
            ->select('produk.nama_produk')
            ->select('detail_penjualan.modal')
            ->select('detail_penjualan.harga')
            ->groupBy('detail_penjualan.kode_produk')
            ->selectSum('detail_penjualan.qty')
            ->selectSum('detail_penjualan.total_harga')
            ->selectSum('detail_penjualan.untung')
            ->get()
            ->getResultArray();
    }

    public function DataBulanan($bulan, $tahun)
    {
        return $this->db->table('detail_penjualan')
            ->join('penjualan', 'penjualan.no_faktur=detail_penjualan.no_faktur')
            ->where('month(penjualan.tgl_jual)', $bulan)
            ->where('year(penjualan.tgl_jual)', $tahun)
            ->select('penjualan.tgl_jual')
            ->groupBy('penjualan.tgl_jual')
            ->selectSum('detail_penjualan.total_harga')
            ->selectSum('detail_penjualan.untung')
            ->get()
            ->getResultArray();
    }

    public function DataTahunan($tahun)
    {
        return $this->db->table('detail_penjualan')
            ->join('penjualan', 'penjualan.no_faktur=detail_penjualan.no_faktur')
            ->where('year(penjualan.tgl_jual)', $tahun)
            ->select('month(penjualan.tgl_jual) as bulan')
            ->groupBy('month(penjualan.tgl_jual)')
            ->selectSum('detail_penjualan.total_harga')
            ->selectSum('detail_penjualan.untung')
            ->get()
            ->getResultArray();
    }
}
