<?php

namespace App\Controllers;

use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;

class Admin extends BaseController
{
    protected $UserModels;
    protected $GroupModels;

    public function __construct()
    {
        $this->UserModels = new UserModel();
        $this->GroupModels = new GroupModel();
    }
    public function index(): string
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('Dashboard', $data);
    }

    public function ListPengguna()
    {
        $data = [
            'title' => 'Data Pengguna',
            'userCGK' => $this->UserModels->getUsersWithRoles()
        ];
        return view('DataPengguna', $data);
    }

    public function tambahPengguna()
    {
        $formValidasi = [
            'email' => [
                'rules' => 'required|is_unique[users.email]',
                'errors' => [
                    'required' => '{field} Wajib diisi',
                    'is_unique' => '{field} Sudah Ada !!!',
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[5]|max_length[30]|regex_match[/^[a-zA-Z0-9\s]+$/]|is_unique[users.username]',
                'errors' => [
                    'is_unique' => '{field} already registered.'
                ]
            ],
            'password' => 'required',
            'confpass' => 'required|matches[password]',
            'namalengkap' => [
                'rules' => 'required|min_length[3]|max_length[100]|regex_match[/^[a-zA-Z0-9\s]+$/]|',
                'errors' => [
                    'required' => 'Nama Wajib diisi',
                    'min_length' => 'Nama Minimal 3 Karakter',
                    'regex_match' => 'Nama Harap Diisi Dengan Benar !!!'
                ]
            ],
            'alamat' => 'required',
            'notelp' => [
                'rules' => 'required|max_length[15]|numeric',
                'errors' => [
                    'required' => 'No Telp Wajib Diisi',
                    'numeric' => 'No Telp hanya di awali 08'
                ]
            ],
            'jabatanpengguna' => 'required'

        ];
        if (!$this->validate($formValidasi)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'namalengkap' => $this->request->getPost('namalengkap'),
            'alamat' => $this->request->getPost('alamat'),
            'notelp' => $this->request->getPost('notelp'),
            'password_hash' =>  Password::hash($this->request->getVar('password')),
            'active' => 1,
        ];

        $penggunaID = $this->UserModels->insert($data);

        if ($penggunaID) {
            $jabatan = $this->request->getPost('jabatanpengguna');
            $this->GroupModels->addUserToGroup($penggunaID, $jabatan);

            return redirect()->back()->with('message', 'User berhasil ditambahkan !!!');
        }
    }

    public function detailPengguna($url)
    {
        $data = [
            'title' => 'Detail Pengguna',
            'detailuser' => $this->UserModels->GetUserbyURL($url),
            'jabatan' =>  $this->GroupModels->select('id, name')->findAll(),

        ];
        return view('DetailPengguna', $data);
    }

    public function editPengguna($id_pengguna)
    {
        $formValidasi = [
            'email' => [
                'rules' => 'required|is_unique[users.email, id, ' . $id_pengguna . ']',
                'errors' => [
                    'required' => '{field} Wajib diisi',
                    'is_unique' => '{field} Sudah Ada !!!',
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[5]|max_length[30]|regex_match[/^[a-zA-Z0-9\s]+$/]|is_unique[users.username, id, ' . $id_pengguna . ']',
                'errors' => [
                    'is_unique' => '{field} already registered.'
                ]
            ],
            'password' => 'permit_empty|min_length[5]',

            'namalengkap' => [
                'rules' => 'required|min_length[3]|max_length[100]|regex_match[/^[a-zA-Z0-9\s]+$/]|',
                'errors' => [
                    'required' => 'Nama Wajib diisi',
                    'min_length' => 'Nama Minimal 3 Karakter',
                    'regex_match' => 'Nama Harap Diisi Dengan Benar !!!'
                ]
            ],
            'alamat' => 'required',
            'notelp' => [
                'rules' => 'required|max_length[15]|numeric',
                'errors' => [
                    'required' => 'No Telp Wajib Diisi',
                    'numeric' => 'No Telp hanya di awali 08'
                ]
            ],
            'jabatanpengguna' => 'required'

        ];
        if (!$this->validate($formValidasi)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }
}
