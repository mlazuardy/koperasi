@extends('layouts.app')
@section('content')
    <section class="constumer-index margin-30">
        <div class="container">
            <h1 class="text-center">Daftar Konsumen</h1>
                 <div class="add-costumer">
                    <a href="{{url('costumer/create')}}" class="btn btn-info" >Buat Anggota Baru</a>
                </div>
                <div class="search-costumer" style="margin-bottom:20px;">
                   <form class="form-inline" method="post" action="{{url('costumer/search')}}" >
                    {{csrf_field()}}
                    <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
                </div>  
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr class="text-center">
                        <th>No</th>
                        <th>No Anggota</th>
                        <th>Nama Pemohon</th>
                        <th>Tempat Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Desa</th>
                        <th colspan="4">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($costumers as $key => $costumer)
                    <tr class="text-center">
                        <td>{{$key+1}}</td>
                        <td>{{$costumer->no_anggota ? $costumer->no_anggota : 'Belum Terverifikasi'}}</td>
                        <td>{{$costumer->nama_pemohon}}</td>
                        <td>{{$costumer->tempat_lahir}}, {{date('d-M-Y',strtotime($costumer->tanggal_lahir))}}</td>
                        <td>{{$costumer->alamat}}</td>
                        <td>{{$costumer->desa}}</td>
                        <td>
                            <a href="{{url('costumer/'.$costumer->id)}}" class="btn btn-primary">Lihat</a>
                        </td>
                        @if(is_null($costumer->no_anggota))
                          <td>
                            <a href="{{url('costumer/'.$costumer->id.'/edit')}}" class="btn btn-info">Edit</a>
                        </td>
                        @endif
                    
                    @endforeach
                    </tr>
                    
                </tbody>
            </table>
            </div>
     
        </div>
    </section>
@endsection