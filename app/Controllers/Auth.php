<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Auth extends BaseController
{
    protected $modelAuth;
    public function __construct()
    {
        helper('form');
        $this->modelAuth = new ModelAuth();
    }

    public function login()
    {
        $data = array(
            'title' => 'Login',
        );
        return view('v_login', $data);
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
            'isi' => 'v_login'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function cek_login()
    {
        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
        ])) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            // if ($level == 0) {
            $cek_user = $this->modelAuth->login_user($username, $password);
            if ($cek_user) {
                // jika data cocok
                session()->set('log', true);
                session()->set('username', $cek_user['username']);
                session()->set('password', $cek_user['password']);
                session()->set('nama', $cek_user['nama_user']);
                session()->set('level', $cek_user['level']);
                session()->set('foto', $cek_user['foto']);
                // login
                return redirect()->to(base_url('home'));
            } else {
                // jika data tidak cocok
                session()->setFlashdata('pesan', 'Login Gagal!, Username Atau Password Salah !!');
                return redirect()->to(base_url('auth/login'));
            }
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/login'));
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('nama');
        session()->remove('foto');
        session()->remove('level');
        session()->setFlashdata('sukses', 'Logout Suksess !!!');
        return redirect()->to(base_url());
    }
}
