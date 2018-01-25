<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loan;
use App\Payment;
use App\Costumer;

class PaymentController extends Controller
{
    /**
     * tampilkan total angsuran yang sudah dibayar
     */
    public function show($id)
    {
        $payment = Payment::firstOrFail();
        return view('payments.show',compact('payment'));
    }
    /**
     * tambahkan angsuran baru
     */
    public function create(Costumer $costumer,Loan $loan)
    {
        Loan::firstOrFail();
        return view('payments.create',compact('loan'));
    }
}
