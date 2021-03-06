@extends('layouts.app')
@section('content')
    <section class="create-costumer margin-30">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <form id="form" action="{{url('costumer/'.$costumer->id.'/create')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="pembiayaan">Pembiayaan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                     <span class="input-group-text" >Rp</span>
                                 </div>
                                <input type="text" class="form-control" id="amount"  name="pembiayaan" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="jangka_waktu">Jangka Waktu</label>
                                    <input type="number" name="jangka_waktu" class="form-control" required>
                                </div>
                                <div class="col">
                                    <label for="">Bulanan / Mingguan</label>
                                    <select name="bulan_minggu" class="form-control">
                                        <option value="bulanan">Bulanan</option>
                                        <option value="mingguan">Mingguan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jasa">Jasa</label>
                            <input type="text" name="jasa" placeholder="contoh (1.7 / satu titik tujuh)" class="form-control">
                            <small class="form-text">Masukan dengan Titik untuk membagi koma, dan masukan data Tanpa %</small>
                        </div>
                        <div class="form-group">
                            <label for="hari_cair">Hari Cair</label>
                            <input type="text" name="hari_cair" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_cair">Tanggal Cair</label>
                            <input type="date" name="tanggal_cair" class="form-control"required  required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" class="form-control"></textarea>
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