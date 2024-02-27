<?php

namespace App\Controllers;

use App\Models\ModelUser;

class Home extends BaseController
{
    public function __construct()
    {
        $this->ModelUser = new ModelUser;
    }

    public function index(): string
    {
        $data = [
            'judul' => 'login',
        ];
        return view('login', $data);
    }

    public function CekLogin()
    {
        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username Masih Kosong!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Masih Kosong!',
                ]
            ]
        ])) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek_login = $this->ModelUser->LoginUser($username, $password);
            if ($cek_login) {
                session()->set('id_user', $cek_login['id_user']);
                session()->set('nama', $cek_login['nama']);
                session()->set('level', $cek_login['level']);
                if ($cek_login['level'] == 'Admin') {
                    return redirect()->to(base_url('Admin'));
                } else {
                    return redirect()->to(base_url('Penjualan'));
                }
            } else {
                session()->setFlashdata('pesan', 'Username atau Password Salah!!');
                return redirect()->to(base_url('Home'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Home'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function Logout()
    {
        session()->remove('id_user');
        session()->remove('nama');
        session()->remove('level');
        return redirect()->to(base_url('Home'));
    }
}
