<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    public function Grafik()
    {
        return $this->db->table('detail_penjualan')
            ->join('penjualan', 'penjualan.no_faktur=detail_penjualan.no_faktur')
            ->where('month(penjualan.tgl_jual)', date('m'))
            ->where('year(penjualan.tgl_jual)', date('Y'))
            ->select('penjualan.tgl_jual')
            ->groupBy('penjualan.tgl_jual')
            ->selectSum('detail_penjualan.total_harga')
            ->selectSum('detail_penjualan.untung')
            ->get()
            ->getResultArray();
    }

    public function PendapatanHariIni()
    {
        return $this->db->table('detail_penjualan')
            ->join('penjualan', 'penjualan.no_faktur=detail_penjualan.no_faktur')
            ->where('(penjualan.tgl_jual)', date('Y-m-d'))
            ->groupBy('penjualan.tgl_jual')
            ->selectSum('detail_penjualan.total_harga')
            ->get()
            ->getRowArray();
    }

    public function PendapatanBulanIni()
    {
        return $this->db->table('detail_penjualan')
            ->join('penjualan', 'penjualan.no_faktur=detail_penjualan.no_faktur')
            ->where('month(penjualan.tgl_jual)', date('m'))
            ->where('year(penjualan.tgl_jual)', date('Y'))
            ->groupBy('month(penjualan.tgl_jual)')
            ->selectSum('detail_penjualan.total_harga')
            ->get()
            ->getRowArray();
    }

    public function PendapatanTahunIni()
    {
        return $this->db->table('detail_penjualan')
            ->join('penjualan', 'penjualan.no_faktur=detail_penjualan.no_faktur')
            ->where('year(penjualan.tgl_jual)', date('Y'))
            ->groupBy('year(penjualan.tgl_jual)')
            ->selectSum('detail_penjualan.total_harga')
            ->get()
            ->getRowArray();
    }

    public function JumlahProduk()
    {
        return $this->db->table('produk')->countAll();
    }

    public function JumlahKategori()
    {
        return $this->db->table('kategori')->countAll();
    }

    public function JumlahSatuan()
    {
        return $this->db->table('satuan')->countAll();
    }

    public function JumlahUser()
    {
        return $this->db->table('user')->countAll();
    }
}
