<?php

namespace App\Controllers;

use App\Models\PaketsModels;
use App\Models\SubPaketsModels;
use App\Models\WilayahModels;

class Barang extends BaseController
{
    protected $wilayahModels;
    protected $paketsModels;
    protected $SubPaketsModels;

    public function __construct()
    {
        $this->wilayahModels = new WilayahModels();
        $this->paketsModels = new PaketsModels();
        $this->SubPaketsModels = new SubPaketsModels();
    }
    public function index(): string
    {
        $data = [
            'title' => 'Daftar Barang',
            'wilayah' => $this->wilayahModels->findAll(),
            'pakets' => $this->paketsModels->getPakets()
        ];
        return view('DataBarang', $data);
    }

    public function tambahBarang()
    {
        $formValidasi = [
            'wilayah' => 'required',
            'fotobarang' =>  [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Foto harus diambil terlebih dahulu!'
                ]
            ]

        ];
        if (!$this->validate($formValidasi)) {
            session()->setFlashdata('modaltambah',   'tambahbarang');
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fotobarang = $this->request->getPost('fotobarang');
        if (preg_match('/^data:image\/(\w+);base64,/', $fotobarang, $match)) {
            $ext = $match[1];
            $datafileku = base64_decode(str_replace($match[0], '', $fotobarang));
            $filename = uniqid('barang_') . '.' . $ext;
            file_put_contents(FCPATH . 'assets/images/barang/' . $filename, $datafileku);
        } else {
            return redirect()->back()->with('error', 'Gagal membaca foto.');
        }


        $id_wilayah = $this->request->getPost('wilayah');
        $getWilayah = $this->wilayahModels->find($id_wilayah);

        $wilayah = $getWilayah['nama_wilayah'];

        $getkodewilayah = $this->wilayahModels->getWilayahKode($wilayah);

        $data = [
            'id_wilayah' =>   $id_wilayah,
            'gambar_karung' =>   $filename
        ];

        $id_karung = $this->paketsModels->insert($data, true);

        if ($id_karung) {
            $kodekarung = 'karung-' . $id_karung . '-' .   $getkodewilayah;

            $datakodekarung = [
                'id_karung' => $id_karung,
                'kode_karung' => $kodekarung
            ];

            $this->paketsModels->save($datakodekarung);

            return redirect()->to('spxcgk4/barang/DataBarang')->with('message', 'Data berhasil ditambahkan !!!');
        }
    }

    public function detailBarang($url_pakets)
    {
        $paket = $this->paketsModels->getPakets($url_pakets);
        $id_karung = $paket['id_karung'];
        $data = [
            'title' => 'Detail Barang Pengiriman',
            'pakets' => $this->paketsModels->getPakets($url_pakets),
            'subpaket' => $this->SubPaketsModels->getSubPaketsByKarung($id_karung),

        ];
        return view('DetailBarang', $data);
    }
}
