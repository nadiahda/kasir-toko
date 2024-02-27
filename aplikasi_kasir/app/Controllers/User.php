<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class User extends BaseController
{
    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'User',
            'menu' => 'masterdata',
            'submenu' => 'user',
            'page' => 'user/v_user',
            'user' => $this->ModelUser->allData(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'is_unique[user.username]',
                'errors' => [
                    'is_unique' => 'Username Sudah Ada, Masukan Username Lain !!',
                ]
            ]
        ])) {

            $data = [
                'username' => $this->request->getPost('username'),
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'password' => ($this->request->getPost('password')),
                'level' => $this->request->getPost('level'),
            ];
            $this->ModelUser->InsertData($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
            return redirect()->to('User');
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('User'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function UpdateData($id_user)
    {

        $data = [
            'id_user' => $id_user,
            'username' => $this->request->getPost('username'),
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'password' => ($this->request->getPost('password')),
            'level' => $this->request->getPost('level')
        ];
        $this->ModelUser->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate');
        return redirect()->to('User');
    }

    public function DeleteData($id_user)
    {
        $data = [
            'id_user' => $id_user,
        ];
        $this->ModelUser->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('User');
    }
}
