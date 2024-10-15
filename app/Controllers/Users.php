<?php

namespace App\Controllers;

use App\Models\ModelUsers;

class Users extends BaseController
{
    private $ModelUsers;

    public function __construct()
    {
        helper('form');
        $this->ModelUsers = new ModelUsers();
    }

    public function index()
    {
        $data = [
            'title' => 'Users',
            'users' => $this->ModelUsers->allData(),
            'isi' => 'admin/v_user'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'level' => $this->request->getPost('level'),
            'foto' => $this->request->getPost('foto'),
        ];
        $this->ModelUsers->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
        return redirect()->to(base_url('users'));
    }

    public function edit($id_user)
    {
        $data = [
            'id_user' => $id_user,
            'nama_user' => $this->request->getPost('nama_user'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'level' => $this->request->getPost('level'),
            'foto' => $this->request->getPost('foto'),
        ];
        $this->ModelUsers->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!');
        return redirect()->to(base_url('users'));
    }

    public function delete($id_user)
    {
        $data = [
            'id_user' => $id_user,
        ];
        $this->ModelUsers->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!');
        return redirect()->to(base_url('users'));
    }
}
