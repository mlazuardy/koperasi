<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loan;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $loans = Loan::where('user_id',auth()->id())->get();
        return view('users.index',compact('loans'));
    }
}
