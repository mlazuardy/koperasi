<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loan;
use App\Costumer;
use Carbon\Carbon;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Costumer $costumer)
    {
        Costumer::firstOrFail();
        return view('loans.create',compact('costumer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $costumer = Costumer::where('id',$id)->firstOrFail();
        $loan = new Loan;
        $loan->no_spk = $request->no_spk;
        $loan->costumer_id = $costumer->id;
        $loan->pembiayaan = str_replace(',','', $request->pembiayaan);
        $loan->jangka_waktu = $request->jangka_waktu;
        $loan->bulan_minggu = $request->bulan_minggu;
        $loan->sisa_angsuran = $request->jangka_waktu;
        $loan->tabungan_1x_angsuran = str_replace(',','',$request->tabungan_1x_angsuran);
        $loan->hari_cair = $request->hari_cair;
        $loan->tanggal_cair = $request->tanggal_cair;
        $loan->pokok = str_replace(',','',$request->pokok);
        $loan->jasa = str_replace(',','',$request->jasa);
        $loan->total_angsuran  = str_replace(',','',$request->pokok) + str_replace(',','',$request->jasa);
        $loan->keterangan = $request->keterangan;
        $loan->save();
        return redirect('costumer/'.$costumer->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Costumer $costumer ,Loan $loan)
    {
        $loan = Loan::firstOrFail();
        return view('loans.show',compact('loan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
