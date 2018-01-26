@extends('layouts.app')
@section('content')
    <section class="create-costumer margin-30">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <form action="{{url('costumer')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="nama_pemohon">Nama Pemohon</label>
                            <input type="text" name="nama_pemohon" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tempat_tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" placeholder="Tempat Tanggal Lahir" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="desa">Desa</label>
                            <input type="text" name="desa" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection