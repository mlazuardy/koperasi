@extends('layouts.app')
@section('content')
    <section class="payment-pay margin-30">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <form action="{{url('costumer/'.$costumer->id.'/'.$loan->id.'/'.$payment->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <div class="form-group">
                            <label for="pokok">Nominal</label>
                            <small class="form-text">Sisa Setoran Nasabah ini sebesar Rp. {{number_format($loan->total_angsuran - $payment->nominal)}}
                                <span class="text-danger">(Jangan Sampai salah Input)</span>
                            </small>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" id="amount" name="nominal" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="jasa">Jasa</label>
                                <input type="text" name="jasa" id="" class="form-control">
                                <small class="form-text">Masukan Jumlah Jasa ( gunakan titik untuk memisahkan angka koma ) Contoh : ( 1.7 ) tanpa %</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
  $('input#amount').keyup(function(event) {

  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40) return;

  // format number
  $(this).val(function(index, value) {
    return value
    .replace(/\D/g, "")
    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    ;
  });
});
    </script>
@endsection