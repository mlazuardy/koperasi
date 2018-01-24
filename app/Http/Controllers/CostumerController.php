<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Costumer;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costumers = Costumer::all();
        return view('costumers.index',compact('costumers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('costumers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'nama_pemohon' => 'required',
            'no_spk' => 'unique:costumers',
            'no_anggota' => 'unique:costumers',
            'tempat_tanggal_lahir' => 'required',
            'alamat' => 'required',
            'desa' => 'required',
            'pembiayaan' => 'required',
            'jangka_waktu' => 'required',
            'bulan_minggu' => 'required',
            'tabungan_1x_angsuran' => 'required',
            'hari_cair' => 'required',
            'tanggal_cair' => 'required',
            'pokok' => 'required',
            'jasa' => 'required'
        ]);
        
        $costumer = new Costumer;
        $costumer->no_spk = mt_rand(000001,999999);
        $costumer->no_anggota = mt_rand(1000000,9999999);
        $costumer->nama_pemohon = title_case($request->nama_pemohon);
        $costumer->tempat_tanggal_lahir = $request->tempat_tanggal_lahir;
        $costumer->alamat = $request->alamat;
        $costumer->desa = $request->desa;
        $costumer->pembiayaan = str_replace(',','', $request->pembiayaan);
        $costumer->jangka_waktu = $request->jangka_waktu;
        $costumer->bulan_minggu= $request->bulan_minggu;
        $costumer->tabungan_1x_angsuran = str_replace(',','', $request->tabungan_1x_angsuran);
        $costumer->hari_cair = $request->hari_cair;
        $costumer->tanggal_cair = $request->tanggal_cair;
        $costumer->pokok = str_replace(',','', $request->pokok);
        $costumer->jasa = str_replace(',','', $request->jasa);
        $costumer->total_angsuran = str_replace(',','', $request->pokok) + str_replace(',','', $request->jasa);
        $costumer->save();
        return redirect('costumer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $costumer = Costumer::firstOrFail();
        return view('costumers.show',compact('costumer'));
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
