@extends('layouts.app')
@section('content')
    <section class="constumer-index margin-30">
        <div class="container">
            <h1 class="text-center">Daftar Konsumen</h1>
                 <div class="float-left add-costumer">
                    <a href="{{url('costumer/create')}}" class="btn btn-info" >Buat Anggota Baru</a>
                </div>  
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr class="text-center">
                        <th>No</th>
                        <th>No Anggota</th>
                        <th>Nama Pemohon</th>
                        <th>Tempat Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Desa</th>
                        <th colspan="4">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($costumers as $key => $costumer)
                    <tr class="text-center">
                        <td>{{$key+1}}</td>
                        <td>{{$costumer->no_anggota ? $costumer->no_anggota : 'Belum Terverifikasi'}}</td>
                        <td>{{$costumer->nama_pemohon}}</td>
                        <td>{{$costumer->tempat_lahir}}, {{date('d-M-Y',strtotime($costumer->tanggal_lahir))}}</td>
                        <td>{{$costumer->alamat}}</td>
                        <td>{{$costumer->desa}}</td>
                        <td>
                            <a href="{{url('costumer/'.$costumer->id)}}" class="btn btn-primary">Lihat</a>
                        </td>
                        <td>
                            <a href="{{url('costumer/'.$costumer->id.'/edit')}}" class="btn btn-info">Edit</a>
                        </td>
                    
                    @endforeach
                    </tr>
                    
                </tbody>
            </table>
            </div>
     
        </div>
    </section>
@endsection