<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loan;
use App\Payment;
use App\Costumer;
use Carbon\Carbon;
use Alert;

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
        if(count($loan->payments) && $loan->payments->last()->nominal !== $loan->total_angsuran ){
            Alert::error('Pokok Nasabah Anda tidak sesuai dengan Angsuran yang dibayar di angsuran ke '.$loan->payments->last()->angsuran_ke.' ,Harap Cek Angsuran dibawah','Opps')->persistent('close');
            return back();
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
        $payment->jasa = $loan->pembiayaan * ($request->jasa / "100");
        $payment->nominal = str_replace(',','', $request->nominal) + $payment->jasa;
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
    /**
     * edit angsuran jika belum sesuai dengan setoran
     */
    public function edit(Costumer $costumer, Loan $loan, Payment $payment)
    {
        Payment::findOrFail($payment->id);
        return view('payments.edit',compact('payment','costumer','loan'));
    }

    public function update(Request $request, Costumer $costumer, Loan $loan, Payment $payment)
    {
        $this->validate(request(),[
            'nominal' => 'nullable',
            'jasa'=> 'nullable'
        ]);
        Payment::findOrFail($payment->id);
        $payment->nominal = $payment->nominal + str_replace(',','', $request->nominal);
        if(!is_null($request->jasa)){
            $payment->jasa = $loan->pembiayaan * ($request->jasa / "100");
        }
        $payment->save();
        return redirect("costumer/$costumer->id/$loan->id/$payment->id");
    }
}
