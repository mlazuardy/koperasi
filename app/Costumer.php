<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    protected $fillable = [
        'no_anggota',
        'nama_pemohon',
        'tanggal_lahir',
        'tempat_lahir',
        'alamat',
        'desa',
    ];
    /**
     * costumer has many Loans
     */
    public function loans()
    {
        return $this->hasMany('App\Loan');
    }
}
