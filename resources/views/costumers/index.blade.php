@extends('layouts.app')
@section('content')
    <section class="constumer-index margin-30">
        <div class="container">
            <h1 class="text-center">Daftar Konsumen</h1>
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr class="text-center">
                        <th>No</th>
                        <th>No SPK</th>
                        <th>No Anggota</th>
                        <th>Nama Pemohon</th>
                        <th>Tempat Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Desa</th>
                        <th>Bulanan/Mingguan</th>
                        <th>Pembiayaan</th>
                        <th>Jangka Waktu</th>
                        <th>Tabungan 1x Angsuran</th>
                        <th>Hari Cair</th>
                        <th>Tanggal, Bulan, Tahun Cair</th>
                        <th>Pokok</th>
                        <th>Jasa</th>
                        <th>Total Angsuran</th>
                        <th>Keterangan</th>
                        <th colspan="2">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($costumers as $costumer)
                    <tr class="text-center">
                        <td>{{$costumer->id}}</td>
                        <td>{{$costumer->no_spk}}</td>
                        <td>{{$costumer->no_anggota}}</td>
                        <td>{{$costumer->nama_pemohon}}</td>
                        <td>{{$costumer->tempat_tanggal_lahir}}</td>
                        <td>{{$costumer->alamat}}</td>
                        <td>{{$costumer->desa}}</td>
                        <td>{{$costumer->bulan_minggu}}</td>
                        <td>Rp. {{number_format($costumer->pembiayaan)}}</td>
                        <td>{{$costumer->jangka_waktu}}</td>
                        <td>Rp .{{number_format($costumer->tabungan_1x_angsuran)}}</td>
                        <td>{{$costumer->hari_cair}}</td>
                        <td>{{$costumer->tanggal_cair}}</td>
                        <td>Rp. {{number_format($costumer->pokok)}}</td>
                        <td>Rp. {{number_format($costumer->jasa)}}</td>
                        <td>Rp. {{number_format($costumer->total_angsuran)}}</td>
                        <td>{{$costumer->keterangan ? $costumer->keterangan :'-' }}</td>
                        <td>
                            <a href="{{url('costumer/'.$costumer->id)}}" class="btn btn-primary">Lihat</a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-info">Edit</a>
                        </td>
                    @endforeach
                    </tr>
                    
                </tbody>
            </table>
            </div>
                <div class="text-center">
                    <a href="{{url('costumer/create')}}" class="btn btn-info" >Buat Konsumen Baru</a>
                </div>       
        </div>
    </section>
@endsection