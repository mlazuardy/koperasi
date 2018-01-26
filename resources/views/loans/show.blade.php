@extends('layouts.app')
@section('content')
  <div class="jumbotron">
      <div class="container">
          <h2>Pinjaman {{$loan->costumer->nama_pemohon}}</h2>
          <p>Nomor SPK = {{$loan->no_spk}}</p>
          <p>Total Anguran = {{$loan->jangka_waktu}}</p>
      </div>
  </div>
  <section class="loan-show">
      <div class="container">
          <div class="row">
              <div class="col-md-6">
                  <div class="card border-primary">
                      <div class="card-header bg-primary  mb-3 text-white">
                          # Anguran ke 
                      </div>
                      <div class="card-body">
                          tes
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
@endsection