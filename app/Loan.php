<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'no_spk',
        'pembiayaan',
        'jangka_waktu',
        'jasa',
        'bulan_minggu',
        'tabungan_1x_angsuran',
        'hari_cair',
        'tanggal_cair',
        'pokok',
        'total_angsuran',
        'keterangan',
        'sisa_angsuran'
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

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
