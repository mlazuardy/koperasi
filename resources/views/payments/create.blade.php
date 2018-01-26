@extends('layouts.app')
@section('content')
    <section class="payment-pay margin-30">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <form action="{{url('costumer/'.$costumer->id.'/'.$loan->id)}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="text" class="form-control" name="nominal" >
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