@extends('layouts.app')
@section('content')
    <section class="payment-print margin-30">
        <div class="container">
          <div class="text-center">
            <div>KOPERASI</div>
            <div>BINA UMMAT MANDIRI TENJOLAYA</div>
            <div>KEC. TENJOLAYA KAB. BOGOR</div>
            <hr>
          </div>
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-right">{{$payment->id}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>NO.SPK</td>
                            <td class="text-right">{{$payment->loan->no_spk}}</td>
                        </tr>
                        <tr>
                            <td>NAMA</td>
                            <td class="text-right">{{strtoupper($payment->loan->costumer->nama_pemohon)}}</td>
                        </tr>
                        <tr>
                            <td>ALAMAT</td>
                            <td class="text-right">{{$payment->loan->costumer->alamat}}</td>
                        </tr>
                        <tr>
                            <td>DESA</td>
                            <td class="text-right">{{$payment->loan->costumer->desa}}</td>
                        </tr>
                        <tr>
                            <td>PERIODE</td>
                            <td class="text-right">{{$payment->loan->bulan_minggu}}</td>
                        </tr>
                        <tr>
                            <td>ANGS. KE</td>
                            <td class="text-right">{{$payment->angsuran_ke}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-center">RINCIAN ANGSURAN</div>
            <div class="table-responsive">
                <table class="table table-sm">
                    <tbody>
                        <tr>
                            <td>POKOK</td>
                            <td class="text-right">Rp {{number_format($payment->loan->pokok)}}</td>
                        </tr>
                        <tr>
                            <td>JASA</td>
                            <td class="text-right">Rp {{number_format($payment->loan->jasa)}}</td>
                        </tr>
                        <tr>
                            <td><b>JUMLAH</b></td>
                            <td class="text-right">Rp {{number_format($payment->loan->pokok + $payment->loan->jasa)}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="top-bro">
                <div class="float-left">PENYETOR</div>
                <div class="float-right">TELLER</div>
                <br>
                <br>
                <br>
                <div class="float-right">{{Auth::user()->name}}</div>        
            </div>
            <input id="printpagebutton" type="button" value="Print" class="btn btn-primary" onclick="printpage()"/>
        </div>
        
    </section>
    <br>
@endsection
@section('js')
    <script type="text/javascript">
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        //Set the print button to 'visible' again 
        //[Delete this line if you want it to stay hidden after printing]
        printButton.style.visibility = 'visible';
    }
</script>
@endsection