<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Payment;
use Carbon\Carbon;
use DB;

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
}
