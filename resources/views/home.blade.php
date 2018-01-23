@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-8 text-center">
            <h1>Selamat Datang {{Auth::user()->name}}</h1>
            
        </div>
    </div>
</div>
@endsection
