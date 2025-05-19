<?php

namespace App\Models;

use CodeIgniter\Model;

class WilayahModels extends Model
{
    protected $table      = 'wilayah_antar';
    protected $primaryKey = 'id_wilayah';

    public function getWilayahKode($namaWilayah)
    {
        // Aturan singkatan untuk beberapa nama wilayah
        $shortNames = [
            'Tomang' => 'T',
            'Grogol' => 'G',
            'Jelambar' => 'J',
            'Jelambar Baru' => 'JB',
            'Wijaya Kusuma' => 'WK',
            'Tanjung Duren Selatan' => 'TDS',
            'Tanjung Duren Utara' => 'TDU',
        ];

        if (array_key_exists($namaWilayah, $shortNames)) {
            return $shortNames[$namaWilayah];
        }


        $words = explode(' ', $namaWilayah);
        $shortName = '';
        foreach ($words as $word) {
            $shortName .= strtoupper(substr($word, 0, 1));
        }

        return $shortName;
    }
}
