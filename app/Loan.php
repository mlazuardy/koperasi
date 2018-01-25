<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'no_spk',
        'pembiayaan',
        'jangka_waktu',
        'bulan_minggu',
        'tabungan_1x_angsuran',
        'hari_cair',
        'tanggal_cair',
        'pokok',
        'jasa',
        'total_angsuran',
        'keterangan'
    ];
    
    /**
     * Loan Belongsto Costumer 
     */
    public function costumer()
    {
        return $this->belongsTo('App\Costumer','costumer_id');
    }
    /**
     * loan has many Payment
     */
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
}
