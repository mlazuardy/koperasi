@extends('layouts.app')
@section('content')
    <section class="loan-index margin-30">
        @if(Request::is('staff'))
        <div class="jumbotron">
            <div class="container">

            <h2>Untuk Melihat Data Setoran Secara Keseluruhan silahkan Klik Tombol Dibawah</h2>
            <a href="staff/all" class="btn btn-info">Lihat Data Keseluruhan</a>
       
        </div>
    </div>
    @endif
        <div class="container">
            <div class="form-group">
                @if(Request::is('staff'))
                <a href="{{url('exportToday')}}" class="btn btn-info">Export Excel</a>
                @else
                <a href="{{url('exportAll')}}" class="btn btn-info">Export Excel</a>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No SPK</th>
                            <th>Nominal</th>
                            <th>Jasa</th>
                            <th>Angsuran Ke</th>
                            <th>Nama Penabung</th>
                            <th>Jumlah Tabungan</th>
                            <th>Nama Penyetor</th>
                            <th>Kolektor</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($payments as $payment)
                            <tr>
                                <td>{{$payment->loan->no_spk}}</td>
                                <td>Rp. {{number_format($payment->nominal)}}</td>
                                <td>Rp. {{number_format($payment->jasa)}}</td>
                                <td>{{$payment->angsuran_ke}}</td>
                                <td>{{$payment->nama ? $payment->nama : '-'}}</td>
                                <td>Rp. {{number_format($payment->tabungan)}}</td>
                                <td>{{$payment->loan->costumer->nama_pemohon}}</td>
                                <td>{{$payment->loan->user->name}}</td>
                                <td>
                                    <a href="{{url('costumer/'.$payment->loan->costumer->id.'/'.$payment->loan->id.'/'.$payment->id)}}" class="btn btn-primary" >Lihat Angsuran</a>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center" >Data Tidak ada</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                {{$payments->links()}}
            </div>
        </div>
    </section>
@endsection