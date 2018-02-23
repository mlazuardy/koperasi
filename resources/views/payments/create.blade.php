@extends('layouts.app')
@section('content')
    <section class="payment-pay margin-30">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <form action="{{url('costumer/'.$costumer->id.'/'.$loan->id)}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="pokok">Nominal</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" id="amount" value="{{number_format($loan->total_angsuran)}}" name="nominal" class="form-control"disabled>
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