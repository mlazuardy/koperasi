@extends('layouts.app') @section('content')
<section class="search-costumer margin-30">
    <div class="container">
        <div class="search" style="margin-bottom:20px;" >
            <form class="form-inline" method="post" action="{{url('loan/search')}}">
                {{csrf_field()}}
                <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
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
                            <th>Hari Cair</th>
                            <th>Tanggal Cair</th>
                            <th>Pokok</th>
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
                                <td>{{$loan->hari_cair}}</td>
                                <td>{{$loan->tanggal_cair}}</td>
                                <td>Rp. {{number_format($loan->pokok)}}</td>
                                <td>{{$loan->keterangan ? $loan->keterangan : '-'}}</td>
                                <td>
                                    <a href="{{url('costumer/'.$loan->costumer->id.'/'.$loan->id)}}" class="btn btn-primary">Lihat</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    </div>
</section>
@endsection