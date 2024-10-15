<?php

namespace App\Controllers;

use App\Models\ModelBarang;
use App\Models\ModelLokasi;

class Barang extends BaseController
{
    private $ModelBarang;
    private $ModelLokasi;

    public function __construct()
    {
        helper('form');
        $this->ModelBarang = new ModelBarang();
        $this->ModelLokasi = new ModelLokasi();
    }

    public function index()
    {
        $data = [
            'title' => 'Barang',
            'barang' => $this->ModelBarang->allData(),
            'lokasi' => $this->ModelLokasi->findAll(),
            'isi' => 'admin/v_barang'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'merk' => $this->request->getPost('merk'),
            'spesifikasi' => $this->request->getPost('spesifikasi'),
            'tanggal_pembelian' => $this->request->getPost('tanggal_pembelian'),
            'harga' => $this->request->getPost('harga'),
            'kondisi' => $this->request->getPost('kondisi'),
            'id_lokasi' => $this->request->getPost('id_lokasi')
        ];
        $this->ModelBarang->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to(base_url('barang'));
    }

    public function edit($id_barang)
    {
        $data = [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'merk' => $this->request->getPost('merk'),
            'spesifikasi' => $this->request->getPost('spesifikasi'),
            'tanggal_pembelian' => $this->request->getPost('tanggal_pembelian'),
            'harga' => $this->request->getPost('harga'),
            'kondisi' => $this->request->getPost('kondisi'),
            'id_lokasi' => $this->request->getPost('id_lokasi')
        ];
        $this->ModelBarang->edit($id_barang, $data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate!');
        return redirect()->to(base_url('barang'));
    }

    public function delete($id_barang)
    {
        $this->ModelBarang->delete_data($id_barang);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('barang'));
    }

    public function print()
    {
        $data = [
            'title' => 'Barang',
            'barang' => $this->ModelBarang->allData(),
            'lokasi' => $this->ModelLokasi->findAll(),
        ];
        return view('admin/v_print_barang', $data);
    }
}
