@extends('layouts.app')
@section('content')
  <div class="jumbotron">
      <div class="container">
          <h2>Pinjaman {{$loan->costumer->nama_pemohon}}</h2>
          <p>Nomor SPK = {{$loan->no_spk}}</p>
          <p>Total Angsuran = {{$loan->jangka_waktu}}</p>
          <p>Angsuran Dibayar = {{$loan->jangka_waktu - $loan->sisa_angsuran}}</p>
          <p>Sisa Angsuran = {{$loan->sisa_angsuran > 0 ? $loan->sisa_angsuran : 'Lunas' }}</p>
          @if(count($loan->sisa_angsuran > 0))
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
                      <div class="card-header {{$payment->nominal + $payment->jasa === ($loan->total_angsuran)? 'bg-primary' :'bg-danger'}} mb-3 text-white">
                          # Anguran ke {{$key+1}} 
                      </div>
                      @if ($payment->nominal + $payment->jasa !== ($loan->total_angsuran))
                      <div class="card-body text-center text-danger">
                          <div class="alert alert-danger">Sepertinya Jumlah Pokok yang dibayar Nasabah Anda, 
                              tidak sesuai dengan Jumlah angsuran yang diharuskan, anda tidak dapat melakukan penambahan Angsuran jika nasabah ini belum membayarkan Pokok yang semestinya di Angsuran ini
                          </div>
                      </div>
                      @endif              
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">Pokok : Rp. {{number_format($payment->nominal)}}</li>
                        <li class="list-group-item">Jasa : Rp. {{number_format($payment->jasa)}}</li>
                        <li class="list-group-item">Total : Rp. {{number_format($payment->nominal + $payment->jasa)}}
                        <li class="list-group-item">Tanggal Dibayar : {{$payment->created_at->format('d M Y')}}</li>
                        <li class="list-group-item">
                            <a href="{{url('costumer/'.$payment->loan->costumer->id.'/'.$payment->loan->id.'/'.$payment->id)}}" class="btn btn-success" >Buat Struk Angsuran Ini</a>
                            @if ($payment->nominal + $payment->jasa !== ($loan->total_angsuran))
                            <a href="{{url('costumer/'.$payment->loan->costumer->id.'/'.$payment->loan->id.'/'.$payment->id.'/edit')}}" class="btn btn-info" >Edit Angsuran</a>
                            @endif
                        </li>
                      </ul> 
                  </div>
              </div>
               @endforeach
          </div>
      </div>
  </section>
@endsection