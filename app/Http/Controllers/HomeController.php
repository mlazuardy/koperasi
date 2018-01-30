<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Costumer;
use App\Loan;
use App\Payment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::get();
        $loans = Loan::get();
        $costumers = Costumer::get();
        return view('home',compact('costumers','loans','payments'));
    }
}
