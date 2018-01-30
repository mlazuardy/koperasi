<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loan;
use App\Payment;
use App\Costumer;
use Carbon\Carbon;

class PaymentController extends Controller
{
    /**
     * tampilkan total angsuran yang sudah dibayar
     */
    public function show(Costumer $costumer,Loan $loan ,Payment $payment)
    {
        $payment = Payment::where('id',$payment->id)->firstOrFail();
        return view('payments.show',compact('payment'));
    }
    /**
     * tambahkan angsuran baru
     */
    public function create(Costumer $costumer,Loan $loan)
    {
        Loan::firstOrFail();
        if($loan->sisa_angsuran === 0){
            abort(404);
        }
        return view('payments.create',compact('loan','costumer'));
    }
    /**
     * simpan angsuran yang dibayar
     * Illuminate\Http\Request
     */
    public function store(Request $request,Costumer $costumer,Loan $loan)
    {
        Loan::firstOrFail();
        $payment = new Payment;
        $payment->loan_id = $loan->id;
        // $payment->angsuran_ke = $loan->jangka_waktu - $loan->sisa_angsuran + 1;
        $payment->nominal = $loan->total_angsuran;
        $payment->angsuran_ke = $loan->jangka_waktu - $loan->sisa_angsuran + 1;
        $payment->save();
        $loan->sisa_angsuran = $loan->sisa_angsuran -1;
        $loan->save();
        return redirect("costumer/$costumer->id/$loan->id");
        
    }
    public function paymentPrint(Costumer $costumer,Loan $loan ,Payment $payment)
    {
        Payment::where('id',$payment->id)->firstOrFail();
        return view('payments.print',compact('payment'));
    }
}
