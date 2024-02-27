<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenjualan extends Model
{
    public function NoFaktur()
    {
        $tgl = date('Ymd');
        $query = $this->db->query("SELECT MAX(RIGHT(no_faktur,4)) as no_urut from penjualan where date(tgl_jual)='$tgl'");
        $hasil = $query->getRowArray();
        if ($hasil['no_urut'] > 0) {
            $tmp = $hasil['no_urut'] + 1;
            $kd = sprintf("%04s", $tmp);
        } else {
            $kd = "0001";
        }
        $no_faktur = date('Ymd') . $kd;
        return $no_faktur;
    }

    public function CekProduk($kode_produk)
    {
        return $this->db->table('produk')
            ->join('kategori', 'kategori.id_kategori=produk.id_kategori')
            ->join('satuan', 'satuan.id_satuan=produk.id_satuan')
            ->where('kode_produk', $kode_produk)
            ->get()
            ->getRowArray();
    }

    public function AllProduk()
    {
        return $this->db->table('produk')
            ->join('kategori', 'kategori.id_kategori=produk.id_kategori')
            ->join('satuan', 'satuan.id_satuan=produk.id_satuan')
            ->where('stok > 0')
            ->orderBy('id_produk', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function InsertJual($data)
    {
        $this->db->table('penjualan')->insert($data);
    }

    public function InsertDetailPenjualan($data)
    {
        $this->db->table('detail_penjualan')->insert($data);
    }
}
