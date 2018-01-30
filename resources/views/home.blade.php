@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-8 text-center">
            <div class="jumbotron margin-30">
                <h1>Selamat Datang {{Auth::user()->name}}</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-header">
                    Total Anggota Terdaftar
                </div>
                <div class="card-body">
                    <h1>{{$costumers->count()}}</h1>
                    <p>Anggota</p>
                    <a href="{{url('costumer')}}" class="btn btn-primary">Lihat Daftar Anggota</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-header">
                    Total Pinjaman DiKeluarkan
                </div>
                <div class="card-body">
                    <h1>Rp. {{number_format($loans->sum('pembiayaan'))}}</h1>
                    <p>Telah Dikeluarkan</p>
                    <a href="{{url('loan')}}" class="btn btn-primary">Lihat Daftar Pinjaman</a>
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
