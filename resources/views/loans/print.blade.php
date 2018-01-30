@extends('layouts.app')
@section('content')
    <section class="loan-print margin-30">
        <div class="container">
           Pembiayaan : Rp. {{number_format($loan->pembiayaan)}}
           <br>
           Nama Pemohon : {{$loan->costumer->nama_pemohon}}
        </div>
    </section>
@endsection