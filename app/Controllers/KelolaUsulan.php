<?php

namespace App\Controllers;

use App\Models\ModelUsulanBarang;

class KelolaUsulan extends BaseController
{
    private $ModelUsulanBarang;

    public function __construct()
    {
        helper('form');
        $this->ModelUsulanBarang = new ModelUsulanBarang();
    }

    public function index()
    {
        $usulan = $this->ModelUsulanBarang->allData();

        // Menghitung total nilai usulan
        $jmlAprove = 0;
        $jmlReject = 0;
        $jms = [];

        foreach ($usulan as $item) {
            $jms[] = $item['jmlHarga'];
            if ($item['status'] == '2') {
                $jmlAprove += $item['jmlHarga'];
            } elseif ($item['status'] == '0') {
                $jmlReject += $item['jmlHarga'];
            }
        }

        $data = [
            'title' => 'Kelola Usulan',
            'usulan' => $usulan,
            'jms' => $jms,
            'jmlAprove' => $jmlAprove,
            'jmlReject' => $jmlReject,
            'isi' => 'admin/v_kelola_usulan'
        ];

        return view('layout/v_wrapper', $data);
    }

    public function delete($id_)
    {
        $data = [
            'id_' => $id_,
        ];
        $this->ModelUsulanBarang->deleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('kelolausulan'));
    }


    public function approve($id_)
    {
        $this->ModelUsulanBarang->updateStatus($id_, '2');
        session()->setFlashdata('pesan', 'Data Berhasil Disetujui!');
        return redirect()->to(base_url('kelolausulan'));
    }

    public function reject($id_)
    {
        $this->ModelUsulanBarang->updateStatus($id_, '0');
        session()->setFlashdata('pesan', 'Data Berhasil Ditolak!');
        return redirect()->to(base_url('kelolausulan'));
    }

    public function refresh($id_)
    {
        $this->ModelUsulanBarang->updateStatus($id_, '1');
        session()->setFlashdata('pesan', 'Status berhasil direset!');
        return redirect()->to(base_url('kelolausulan'));
    }

    public function print()
    {
        $usulan = $this->ModelUsulanBarang->allData();

        // Menghitung total nilai usulan
        $jmlAprove = 0;
        $jmlReject = 0;
        $jms = [];

        foreach ($usulan as $item) {
            $jms[] = $item['jmlHarga'];
            if ($item['status'] == '2') {
                $jmlAprove += $item['jmlHarga'];
            } elseif ($item['status'] == '0') {
                $jmlReject += $item['jmlHarga'];
            }
        }

        $data = [
            'title' => 'Barang',
            'usulan' => $usulan,
            'jms' => $jms,
            'jmlAprove' => $jmlAprove,
            'jmlReject' => $jmlReject,
        ];

        return view('admin/v_print_usulan', $data);
    }

}
