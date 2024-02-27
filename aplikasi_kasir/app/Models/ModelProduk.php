<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProduk extends Model
{
    public function AllData()
    {
        return $this->db->table('produk')
            ->join('kategori', 'kategori.id_kategori=produk.id_kategori')
            ->join('satuan', 'satuan.id_satuan=produk.id_satuan')
            ->orderBy('id_produk', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('produk')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('produk')
            ->where('id_produk', $data['id_produk'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('produk')
            ->where('id_produk', $data['id_produk'])
            ->delete($data);
    }
}
