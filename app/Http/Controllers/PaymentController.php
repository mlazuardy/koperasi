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
        return view('payments.create',compact('loan','costumer'));
    }
    /**
     * simpan angsuran yang dibayar
     * Illuminate\Http\Request
     */
    public function store(Request $request,Costumer $costumer,Loan $loan)
    {
        Loan::firstOrFail();
        $this->validate(request(),[
            'nominal' => 'required'
        ]);
        $payment = new Payment;
        $payment->loan_id = $loan->id;
        // $payment->angsuran_ke = $loan->jangka_waktu - $loan->sisa_angsuran + 1;
        $payment->nominal = $request->nominal;
        $payment->save();
        $loan->sisa_angsuran = $loan->sisa_angsuran -1;
        $loan->save();
        return redirect("costumer/$costumer->id/$loan->id");
        
    }
}
