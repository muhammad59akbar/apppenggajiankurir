<?php

namespace App\Controllers;

use App\Models\SubPaketsModels;

class SubBarang extends BaseController
{

    protected $SubPaketsModels;
    public function __construct()
    {
        $this->SubPaketsModels = new SubPaketsModels();
    }

    public function index() {}
    public function TambahSubBarang()
    {
        $formValidasi = [
            'kodepkt' => 'required',
            'fotosubpaket' =>  [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Foto harus diambil terlebih dahulu!'
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


        ];
        if (!$this->validate($formValidasi)) {
            session()->setFlashdata('modaltambahsub',   'tambahsubbarang');
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fotobarang = $this->request->getPost('fotosubpaket');
        if (preg_match('/^data:image\/(\w+);base64,/', $fotobarang, $match)) {
            $ext = $match[1];
            $datafileku = base64_decode(str_replace($match[0], '', $fotobarang));
            $filename = uniqid('subbarang_') . '.' . $ext;

            file_put_contents(FCPATH . 'assets/images/subbarang/' . $filename, $datafileku);
        } else {
            return redirect()->back()->with('error', 'Gagal membaca foto.');
        }

        $data = [
            'id_karung' => $this->request->getPost('id_karung'),
            'foto_subpaket' => $filename,
            'kode_paket' => $this->request->getPost('kodepkt'),
            'alamat_pengantaran' => $this->request->getPost('alamat'),
            'no_telp' => $this->request->getPost('notelp'),
        ];
        $this->SubPaketsModels->save($data);
        return redirect()->back()->with('message', 'Data berhasil ditambahkan !!!');
    }
}
