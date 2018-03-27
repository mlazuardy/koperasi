<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loan;
use App\Costumer;
use Carbon\Carbon;
use Alert;
use DB;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::latest()->paginate(20);
        return view('loans.index',compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Costumer $costumer)
    {
        Costumer::where('id',$costumer->id)->firstOrFail();
        if(is_null($costumer->no_anggota)){
            Alert::error('Nama Pemohon Ini Belum Terverifikasi, tidak dapat membuat pinjaman', 'Ooops!')->persistent('Tutup') ;
            return back();
        }
        else{
            return view('loans.create', compact('costumer'));
        }
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
        $loan->user_id = auth()->id();
        $loan->costumer_id = $costumer->id;
        $loan->pembiayaan = str_replace(',','', $request->pembiayaan);
        $loan->jangka_waktu = $request->jangka_waktu;
        $loan->bulan_minggu = $request->bulan_minggu;
        $loan->sisa_angsuran = $request->jangka_waktu;
        $loan->hari_cair = $request->hari_cair;
        $loan->tanggal_cair = $request->tanggal_cair;
        if ($request->bulan_minggu === "mingguan"){
            $loan->jasa = $loan->pembiayaan * ($request->jasa / "100") / 4 ;
        } else {
            $loan->jasa = $loan->pembiayaan * ($request->jasa / "100");
        }
        
        $loan->pokok = $loan->pembiayaan / $loan->jangka_waktu;
        $loan->total_angsuran  = ($loan->pokok) + ($loan->jasa);
        $loan->tabungan_1x_angsuran = $loan->bulan_minggu == "bulanan" ? $loan->pokok + $loan->jasa : 0; 
        $loan->keterangan = $request->keterangan;
      
        $loan->save();
        $loan->no_spk = $loan->id . date('dmy');
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
        $loan = Loan::where('id',$loan->id)->firstOrFail();
        Carbon::setLocale('id');
        $payments = $loan->payments()->get();
        return view('loans.show',compact('loan','payments'));
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
    /**
     * print struk
     */
    public function loanPrint(Costumer $costumer,Loan $loan)
    {
        Loan::where('id',$loan->id)->firstOrFail();
        return view('loans.print',compact('loan'));
    }
    /**
     * search loan by no_spk
     */
    public function loanSearch(Request $request)
    {
        $q = $request->input('search');
        $loans = Loan::where('no_spk', 'like', '%' . $q . '%')
            ->orderBy('no_spk')->get();
        return view('loans.search', compact('loans'));
    }
}
