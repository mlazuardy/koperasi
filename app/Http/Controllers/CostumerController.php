<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Costumer;
use Alert;
use Carbon\Carbon;

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
            'tanggal_lahir' => 'required',
            'tempat_lahir'=>'required',
            'alamat' => 'required',
            'desa' => 'required',
        ]);
        
        $costumer = new Costumer;
        $costumer->nama_pemohon = title_case($request->nama_pemohon);
        $costumer->tempat_lahir = $request->tempat_lahir;
        $costumer->tanggal_lahir = $request->tanggal_lahir;
        $costumer->alamat = $request->alamat;
        $costumer->desa = $request->desa;
        $costumer->save();
        Alert::success('mantap');
        return redirect('costumer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Costumer $costumer)
    {
        Costumer::where('id',$costumer->id)->firstOrFail();
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
        $costumer = Costumer::find($id);
        return view('costumers.edit',compact('costumer'));
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
        $this->validate(request(),[
            'no_anggota' => 'required|unique:costumers'
        ]);
        $costumer = Costumer::find($id);
        $costumer->nama_pemohon = $request->nama_pemohon;
        $costumer->tempat_lahir = $request->tempat_lahir;
        $costumer->no_anggota = $request->no_anggota;
        $costumer->tanggal_lahir = $request->tanggal_lahir;
        $costumer->desa = $request->desa;
        $costumer->alamat = $request->alamat;
        $costumer->save();
        return redirect('costumer');
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
