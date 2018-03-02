@extends('layouts.app')
@section('content')
    <section class="payment-pay margin-30">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="alert alert-warning">
                        Anda dapat memberi ceklis dan mengisikan jumlah Angsuran yang dibayar nasabah. Namun, Anda juga bisa mengosongkan Salah satunya jika nasabah tidak membayar sesuai angsuran yang ditentukan
                    </div>
                    <form action="{{url('costumer/'.$costumer->id.'/'.$loan->id)}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="pokok">Pokok</label>
                            <small class="form-text">
                                Pokok yang Harus dibayar Rp. {{number_format($loan->pokok)}}
                            </small>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" id="amount" value="0" name="nominal" class="form-control" >
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="jasa" type="checkbox" value="{{$loan->jasa}}">
                                        Ceklis Jika Nasabah Membayar Jasa juga, Jasa sebesar Rp. {{number_format($loan->jasa)}}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-center">Tabungan</h3>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tabungan">Jumlah Tabungan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" name="tabungan" id="amount" class="form-control">
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