<?php

namespace App\Controllers;

use App\Models\ModelLokasi;

class Lokasi extends BaseController
{
    private $ModelLokasi;

    public function __construct()
    {
        helper('form');
        $this->ModelLokasi = new ModelLokasi();
    }

    public function index()
    {
        $data = [
            'title' => 'Lokasi',
            'lokasi' => $this->ModelLokasi->allData(),
            'isi' => 'admin/v_lokasi'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'nm_lokasi' => $this->request->getPost('nm_lokasi'),
        ];
        $this->ModelLokasi->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!');
        return redirect()->to(base_url('lokasi'));
    }

    public function edit($id_lokasi)
    {
        $data = [
            'id_lokasi' => $id_lokasi,
            'nm_lokasi' => $this->request->getPost('nm_lokasi'),
        ];
        $this->ModelLokasi->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!');
        return redirect()->to(base_url('lokasi'));
    }

    public function delete($id_lokasi)
    {
        $data = [
            'id_lokasi' => $id_lokasi,
        ];
        $this->ModelLokasi->deleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!');
        return redirect()->to(base_url('lokasi'));
    }
}
