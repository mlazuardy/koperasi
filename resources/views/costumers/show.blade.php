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
    @if(count($costumer->loans))
    <h2 class="text-center">Daftar Pinjaman</h2>
  <div class="costumer-button float-left">
        <a href="{{url()->current().'/create'}}" class="d-inline btn btn-primary">Tambah Pinjaman</a>
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
                    <th>Total Angsuran</th>
                    <th>Keterangan</th>
                    <th>Detail</th>
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
                        <td>Rp. {{number_format($loan->total_angsuran)}}</td>
                        <td>{{$loan->keterangan ? $loan->keterangan :'-'}}</td>
                        <td>
                            <a href="{{url('costumer/'.$costumer->id.'/'.$loan->id)}}" class="btn btn-info">Lihat</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="loans-else text-center">
        <h2>Tidak Ada Pinjaman yang dibuat Anggota ini</h2>
        <a href="{{url()->current().'/create'}}" class="d-inline btn btn-primary">Tambah Pinjaman</a>
    </div>
    @endif
</div>
</section>

@endsection