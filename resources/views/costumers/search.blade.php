@extends('layouts.app') @section('content')
<section class="search-costumer margin-30">
    <div class="container">
        <div class="search" style="margin-bottom:20px;" >
            <form class="form-inline" method="post" action="{{url('costumer/search')}}">
                {{csrf_field()}}
                <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        @forelse($costumers as $costumer)
        <div class="card text-center">
            <div class="card-header">
                {{$costumer->nama_pemohon}}
            </div>
            <div class="card-body">
                
                <p class="card-text">
                    {{$costumer->tempat_lahir}}, {{date('d-M-Y',strtotime($costumer->tanggal_lahir))}}
                </p>
                <p>
                    Total Pinjaman : {{$costumer->loans->count()}}
                </p>
                <a href="{{url("costumer/$costumer->id")}}" class="btn btn-primary">Lihat</a>
            </div>
            <div class="card-footer text-muted">
                Terdaftar Sejak {{date('d M Y',strtotime($costumer->created_at))}}
            </div>
        </div>
        @empty
        @endforelse
    </div>
</section>
@endsection