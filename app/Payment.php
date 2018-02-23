<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['nominal','jasa'];
    /**
     * payment belongsto Loans
     */
    public function loan()
    {
        return $this->belongsTo('App\Loan','loan_id');
    }
}
