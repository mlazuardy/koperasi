@extends('layouts.app')
@section('content')
    <section class="loan-index margin-30">
        <div class="container">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No SPK</th>
                            <th>Nama Pemohon</th>
                            <th>Pembiayaan</th>
                            <th>Jangka Waktu</th>
                            <th>Bulan / Minggu</th>
                            <th>Tabungan 1x Angsuran</th>
                            <th>Hari Cair</th>
                            <th>Tanggal Cair</th>
                            <th>Pokok</th>
                            <th>Jasa</th>
                            <th>Total Angsuran</th>
                            <th>Keterangan</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($loans as $loan)
                            <tr>
                                <td>{{$loan->no_spk}}</td>
                                <td>{{$loan->costumer->nama_pemohon}}</td>
                                <td>Rp. {{number_format($loan->pembiayaan)}}</td>
                                <td>{{$loan->jangka_waktu}}</td>
                                <td>{{$loan->bulan_minggu}}</td>
                                <td>Rp. {{number_format($loan->tabungan_1x_angsuran)}}</td>
                                <td>{{$loan->hari_cair}}</td>
                                <td>{{$loan->tanggal_cair}}</td>
                                <td>Rp. {{number_format($loan->pokok)}}</td>
                                <td>Rp. {{number_format($loan->jasa)}}</td>
                                <td>Rp. {{number_format($loan->total_angsuran)}}</td>
                                <td>{{$loan->keterangan ? $loan->keterangan : '-'}}</td>
                                <td>A</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection