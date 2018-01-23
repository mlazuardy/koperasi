<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    protected $fillable = [
        'no_spk',
        'no_anggaran',
        'nama_pemohon',
        'tempat_tanggal_lahir',
        'alamat',
        'desa',
        'pembiayaan',
        'jangka_waktu',
        'bulan/minggu',
        'tabungan_1x_angsuran',
        'hari_cair',
        'tanggal_cair',
        'pokok',
        'jasa',
        'total_anggaran',
        'keterangan'
    ];
}
