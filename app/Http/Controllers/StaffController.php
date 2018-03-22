<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Payment;
use Carbon\Carbon;
use DB;
use Excel;
use Alert;
class StaffController extends Controller
{
    public function indexToday()
    {
        $payments = Payment::whereDate('created_at',DB::raw('CURDATE()'))->paginate(12);
        if (Auth::user()->role->name == "staff") {
            return view('admin.index',compact('payments'));
        }
       
        abort(404);
    }

    public function index()
    {
        $payments = Payment::paginate(12);
        if (Auth::user()->role->name == "staff"){
            return view('admin.index',compact('payments'));
        }
    }

    /**
     * export data to excel
     */
    public function exportToday()
    {
        $payments = Payment::whereDate('created_at',DB::raw('CURDATE()'))->get();
        if(count($payments)> 0){
            return Excel::create("data_setoran_hari_ini" . "_" . date("D_M_Y-H_i_s"), function ($excel) use ($payments) {
                $excel->sheet('mysheet', function ($sheet) use ($payments) {
                    $sheet->fromArray($payments);
                });
            })->download('xls');
        }
        Alert::error('Data Tidak ada')->persistent('close');
        return redirect()->back();
    }
    
    public function exportAll()
    {
        $payments = DB::table('loans')->join('payments','loans.id','=','payments.loan_id')
        ->get();
        return Excel::create("data_setoran_semua"."_".date("D_M_Y-H_i_s"),function($excel)use($payments){
            $excel->sheet('mysheet',function($sheet)use($payments){
                $sheet->fromArray($payments);
            });
        })->download('xls');
    }
}
