<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketsModels extends Model
{
    protected $table      = 'pakets';
    protected $primaryKey = 'id_karung';
    protected $allowedFields = ['kode_karung', 'gambar_karung', 'id_kurir', 'id_wilayah', 'status', 'tanggal_kirim', 'tanggal_selesai'];


    public function getPakets($url_pakets = false)
    {
        $userID = user_id();

        $querygetpakets = $this->select('pakets.*');

        if (!in_groups(['Admin', 'Kapten'])) {
            $querygetpakets->where('id_kurir', $userID);
        }

        if ($url_pakets) {
            $no_karung = $querygetpakets->where(['kode_karung' => $url_pakets])->first();
            if (!$no_karung) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Paket dengan nomor  $url_pakets tidak ditemukan.");
            }
            return $no_karung;
        }
        return $querygetpakets->get()->getResultArray();
    }
}
