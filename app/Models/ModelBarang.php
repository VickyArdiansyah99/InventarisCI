<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBarang extends Model
{
    protected $table = 'tbl_barang';
    protected $primaryKey = 'id_barang';
    protected $allowedFields = ['nama_barang', 'nama_kategori', 'merk', 'spesifikasi', 'tanggal_pembelian', 'harga', 'kondisi', 'id_lokasi'];

    public function allData()
    {
        return $this->select('tbl_barang.*, tbl_lokasi.nm_lokasi')
            ->join('tbl_lokasi', 'tbl_lokasi.id_lokasi = tbl_barang.id_lokasi')
            ->orderBy('id_barang', 'DESC')
            ->findAll();
    }

    public function add($data)
    {
        $this->insert($data);
    }

    public function edit($id_barang, $data)
    {
        $this->update($id_barang, $data);
    }


    public function delete_data($id_barang)
    {
        $this->delete($id_barang);
    }
}
