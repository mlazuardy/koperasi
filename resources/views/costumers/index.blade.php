@extends('layouts.app')
@section('content')
    <section class="constumer-index">
        <div class="container">
            <h1 class="text-center">Daftar Konsumen</h1>
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>No SPK</th>
                        <th>No Anggaran</th>
                        <th>Nama Pemohon</th>
                        <th>Tempat Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Desa</th>
                        <th>Pembiayaan</th>
                        <th>Jangka Waktu</th>
                        <th>Tabungan 1x Angsuran</th>
                        <th>Hari Cair</th>
                        <th>Tanggal, Bulan, Tahun Cair</th>
                        <th>Pokok</th>
                        <th>Jasa</th>
                        <th>Total Anggaran</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
            </table>
            </div>
                <div class="text-center">
                    <a href="{{url('costumer/create')}}" class="btn btn-info" >Buat Konsumen Baru</a>
                </div>       
        </div>
    </section>
@endsection