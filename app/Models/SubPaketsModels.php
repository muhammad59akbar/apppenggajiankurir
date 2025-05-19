<?php

namespace App\Models;

use CodeIgniter\Model;

class SubPaketsModels extends Model
{
    protected $table      = 'subpakets';
    protected $primaryKey = 'id_subpaket';
    protected $allowedFields = ['id_karung', 'kode_paket', 'foto_subpaket', 'alamat_pengantaran', 'no_telp', 'nama_penerima', 'foto_penerima', 'status'];

    public function getSubPaketsByKarung($id_karung)
    {
        return $this->where('id_karung', $id_karung)->findAll();
    }

    public function getSubPaket($kodepaket = false)
    {

        $subpaket = $this->where(['kode_paket' => $kodepaket])->first();
        if (!$subpaket) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Paket Dengan No $subpaket tidak ditemukan.");
        }
        return $subpaket;
    }

    // public function getSubPaket($kodepaket = false)
    // {
    //     $querysubpaket = $this->select('subpakets.*, pakets.id_karung')
    //         ->join('pakets', 'pakets.id_karung = subpakets.id_karung');
    // }
}
