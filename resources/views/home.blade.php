@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-8">
          Selamat Datang {{Auth::user()->name}}
        </div>
    </div>
</div>
@endsection
