@extends('layouts.app')
@section('content')
<div class="jumbotron bg-light text-center">
    <div class="container">
        <h1>{{$costumer->nama_pemohon}}</h1>
        <p>No. Anggota</p>
        <p>{{$costumer->no_anggota ? $costumer->no_anggota : 'belum ada nomor anggota'}}</p>
    </div>
</div>

<section class="loan-list">
<div class="container">
    <h2 class="text-center">Daftar Pinjaman</h2>
  <div class="costumer-button">
        <a href="{{url()->current().'/create'}}" class="d-inline btn btn-primary">Tambah Pinjaman</a>
        <a href="#" class="d-inline btn btn-info">aa</a>
  </div>
    
    <div class="table-responsive text-center">
        <table class="table-bordered table table-sm">
            <thead>
                <tr>
                    <th>No_SPK</th>
                    <th>Pembiayaaan</th>
                    <th>Jangka Waktu</th>
                    <th>Bulan/Minggu</th>
                    <th>Tabungan 1x Angsuran</th>
                    <th>Hari Cair</th>
                    <th>Tanggal Cair</th>
                    <th>Pokok</th>
                    <th>Jasa</th>
                    <th>Total Angsuran</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($costumer->loans as $loan)
                    <tr>
                        <td>{{$loan->no_spk}}</td>
                        <td>Rp. {{number_format($loan->pembiayaan)}}</td>
                        <td>{{$loan->jangka_waktu}}</td>
                        <td>{{$loan->bulan_minggu}}</td>
                        <td>{{$loan->tabungan_1x_angsuran}}</td>
                        <td>{{$loan->hari_cair}}</td>
                        <td>{{$loan->tanggal_cair}}</td>
                        <td>Rp. {{number_format($loan->pokok)}}</td>
                        <td>Rp. {{number_format($loan->jasa)}}</td>
                        <td>Rp. {{number_format($loan->total_angsuran)}}</td>
                        <td>{{$loan->keterangan ? $loan->keterangan :'-'}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</section>

@endsection