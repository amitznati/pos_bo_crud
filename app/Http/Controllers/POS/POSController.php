<?php

namespace App\Http\Controllers\pos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Menu;

class POSController extends Controller
{
    public function index(Request $request)
    {
    	return view('pos.index');
    }

    public function terminal(Request $request)
    {
    	$menus = Menu::all()->load('containsDisplayInfos');
    	$currentMenu = $menus[0];
    	return view('pos.terminal.pos-terminal')->withMenus($menus)->with('currentMenu', $currentMenu);
    }
}
