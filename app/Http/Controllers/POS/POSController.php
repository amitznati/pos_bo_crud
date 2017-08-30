<?php

namespace App\Http\Controllers\pos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class POSController extends Controller
{
    public function index(Request $request)
    {
    	return view('pos.index');
    }

    public function terminal(Request $request)
    {
    	return view('pos.terminal.pos-terminal');
    }
}
