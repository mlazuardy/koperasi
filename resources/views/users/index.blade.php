@extends('layouts.app')
@section('content')
    <section class="users-loans">
        <div class="jumbotron">
            <div class="container text-center">
                <h2>Selamat Datang di Halaman Profile Anda {{Auth::user()->name}}</h2>
            </div>
        </div>
        <div class="container">
            <h2 class="text-center">Daftar Nasabah Anda</h2>
            <div class="row">
            @foreach ($loans as $loan)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">{{$loan->costumer->nama_pemohon}}</div>
                        <ul class="list-group text-center list-group-flush">
                            <li class="list-group-item">
                                <dl>
                                    <dt>Nomor SPK</dt>
                                    <dd>{{$loan->no_spk}}</dd>
                                </dl>
                            </li>
                            <li class="list-group-item">
                                <dl>
                                    <dt>Pembiayaan</dt>
                                    <dd>Rp. {{number_format($loan->pembiayaan)}}</dd>
                                </dl>
                            </li>
                            <li class="list-group-item">
                                <dl>
                                    <dt>Jangka Waktu</dt>
                                    <dd>{{$loan->jangka_waktu}} {{$loan->bulan_minggu === "mingguan" ? "Minggu" : "Bulan"}}</dd>
                                </dl>
                            </li>
                            <li class="list-group-item">
                                <a href="{{url('costumer/'.$loan->costumer->id.'/'.$loan->id)}}" class="btn btn-primary">Lihat Selengkapnya</a>
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>
@endsection