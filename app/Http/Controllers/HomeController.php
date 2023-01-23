<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {

        if (Auth::check()) {
            return to_route('employee');
        } else {
            return view('login');
        }
    }
}
