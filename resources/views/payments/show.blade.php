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
                            <td class="text-right">Rp {{number_format($payment->nominal)}}</td>
                        </tr>
                        <tr>
                            <td>JASA</td>
                            <td class="text-right">Rp {{number_format($payment->jasa)}}</td>
                        </tr>
                        <tr>
                            <td><b>JUMLAH</b></td>
                            <td class="text-right">Rp {{number_format($payment->nominal + $payment->jasa)}}</td>
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
                <div class="float-left">{{$payment->loan->costumer->nama_pemohon}}</div>
                <div class="float-right">{{Auth::user()->name}}</div>        
            </div>
            <br>
            <br>
            <input id="printpagebutton" type="button" value="Print" class="btn btn-primary" onclick="sendToQuickPrinterChrome();"/>
        </div>
    </section>
    <br>
@endsection
@section('js')
<script>
function sendToQuickPrinterChrome(){
   var commandsToPrint =
                        "<BOLD><CENTER>KOPERASI BINA UMMAT MANDIRI\n" +
                        "<CENTER>TENJOLAYA\n"+
                        "<CENTER>KP. Tapos Lebak Desa Tapos II<BR>" +
                        "<LINE>" +
                        "<CENTER>Struk Angsuran Koperasi <BR>\n" +
                        "<BOLD>No SPK   : {{$payment->loan->no_spk}}\n" +
                        "<LEFT>Nama     : {{$payment->loan->costumer->nama_pemohon}}\n" +
                        "<LEFT>Angs ke  : {{$payment->angsuran_ke}}\n"+
                        "<LEFT>Pokok    : Rp. {{number_format($payment->nominal)}}\n"+
                        "<LEFT>Jasa     : Rp. {{number_format($payment->jasa)}}<BR>\n" +
                        "<LINE>"+
                        "<RIGHT><BOLD>Total : Rp. {{number_format($payment->nominal + $payment->jasa)}}<BR>" +
                        "<LINE>"+
                        "<BOLD>Struk Ini Adalah Bukti Sah Yang\n" +
                        "<BOLD><CENTER>Dikeluarkan Oleh Pihak KBUMT\n" +
                        "<CENTER>Terima Kasih<BR>\n" +
                        "Penyetor                Kolektor<BR>\n" +
                        "<BR>\n" +
                        "{{$payment->loan->costumer->nama_pemohon}}           {{Auth::user()->name}}\n"+
                        "<LINE>" +
                        "<CENTER>{{Carbon\Carbon::now(new DateTimeZone('Asia/Jakarta'))->format('d-m-Y H:i:s')}}\n"+
                        "<LINE>" +
                        "<CENTER>Tabungan<BR>\n" +
                        "<LEFT>Nama     : {{$payment->nama ? $payment->nama : '-'}}<BR>\n" +
                        "<LEFT>Nominal  : Rp. {{number_format($payment->tabungan)}}\n" +
                        "<CUT>\n"
                ;
    var textEncoded = encodeURI(commandsToPrint);
    window.location.href="intent://"+textEncoded+"#Intent;scheme=quickprinter;package=pe.diegoveloper.printerserverapp;end;";
}
</script>
@endsection