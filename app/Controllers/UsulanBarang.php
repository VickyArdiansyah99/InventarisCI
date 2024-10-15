<?php

namespace App\Controllers;

use App\Models\ModelUsulanBarang;

class UsulanBarang extends BaseController
{
    private $ModelUsulanBarang;

    public function __construct()
    {
        helper('form');
        $this->ModelUsulanBarang = new ModelUsulanBarang();
    }

    public function index()
    {
        $data = [
            'title' => 'Usulan Barang',
            'usulan' => $this->ModelUsulanBarang->allData(),
            'isi' => 'admin/v_usulan_barang'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'id_pengusul' => $this->request->getPost('id_pengusul'),
            'namaBarang' => $this->request->getPost('namaBarang'),
            'jmlBarang' => $this->request->getPost('jmlBarang'),
            'kiraHarga' => $this->request->getPost('kiraHarga'),
            'jmlHarga' => $this->request->getPost('jmlHarga'),
            'keperluan' => $this->request->getPost('keperluan'),
            'status' => '1' // Mengatur status default menjadi '1' (menunggu persetujuan)
        ];

        $this->ModelUsulanBarang->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to(base_url('usulanbarang'));
    }

    public function delete($id_)
    {
        $data = [
            'id_' => $id_,
        ];
        $this->ModelUsulanBarang->deleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('usulanbarang'));
    }
}
