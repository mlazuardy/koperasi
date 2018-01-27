@extends('layouts.app')
@section('content')
  <div class="jumbotron">
      <div class="container">
          <h2>Pinjaman {{$loan->costumer->nama_pemohon}}</h2>
          <p>Nomor SPK = {{$loan->no_spk}}</p>
          <p>Total Angsuran = {{$loan->jangka_waktu}}</p>
          <p>Angsuran Dibayar = {{$loan->jangka_waktu - $loan->sisa_angsuran}}</p>
          <p>Sisa Angsuran = {{$loan->sisa_angsuran > 0 ? $loan->sisa_angsuran : 'Lunas' }}</p>
          <p>Biaya Per Angsuran = Rp. {{number_format($loan->total_angsuran)}}</p>
          @if($loan->sisa_angsuran > 0)
          <div class="loan-create">
              <a href="{{url()->current().'/create'}}" class="btn btn-primary">Tambah Angsuran</a>
          </div>
          @endif
      </div>
  </div>
  <section class="loan-show">
      <div class="container">
          <div class="row">
              @foreach ($payments as $key => $payment)
              <div class="col-md-6">
                  <div class="card border-primary">
                      <div class="card-header bg-primary  mb-3 text-white">
                          # Anguran ke {{$key+1}} 
                      </div>              
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">Nominal : Rp. {{number_format($payment->nominal)}}</li>
                        <li class="list-group-item">Tanggal Dibayar : {{$payment->created_at->format('m d Y')}}</li>
                        <li class="list-group-item"><a href="#" class="btn btn-success" >Buat Struk Angsuran Ini</a></li>
                      </ul> 
                  </div>
              </div>
               @endforeach
          </div>
      </div>
  </section>
@endsection