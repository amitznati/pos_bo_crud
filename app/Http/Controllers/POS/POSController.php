<?php

namespace App\Http\Controllers\pos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Menu;
use App\Models\Person;
use App\Models\Employee;
use App\Models\DailyAttendance;
use Carbon\Carbon;

class POSController extends Controller
{
    public function index(Request $request)
    {
    	return view('pos.index');
    }

    public function terminal(Request $request)
    {
        $empid = \Session::get('empid');
        $employee = null;
        if($empid)
        {
            $employee = Employee::find($empid)->load('person');
        }
        else
        {
            \Alert::error("Employee was not found!")->flash();
            return redirect('pos/home');
        }
    	$menus = Menu::all()->load('containsDisplayInfos');
    	$currentMenu = $menus[0];
    	
    	$data = [];
    	$data['menus'] = $menus;
    	$data['currentMenu'] = $currentMenu;
    	$data['employee'] = $employee;
    	return view('pos.terminal.pos-terminal')->with($data);
    }

    public function terminalWithEmployee($empid)
    {
        \Session::put('empid',$empid);
        return redirect('pos/terminal');
    }

    public function dialog($dialog)
    {//xdebug_break();
        if($dialog == 'select_employee')
        {
            $employees = Employee::whereHas('dailyAttendances', function ($query) {
                $query->where('isPresent', '=', true);
            })->get()->load('person');
            return view('pos.dialogs.'.$dialog)->withEmployees($employees);
        }
        return view('pos.dialogs.'.$dialog);
    }

    public function typeAttendance(Request $request)
    {
        //xdebug_break();
        $empnum = $request['empnum'];
        $person = Person::where('identifier',$empnum)->where('personable_type', 'App\Models\Employee')->first();
        if($person!=null)
        {
            $dailyAtt = DailyAttendance::where('employee_id',$person->id)->where('isPresent',true)->first();
            if($dailyAtt !=null)
            {
                $dailyAtt->isPresent = false;
                $dailyAtt->exitTime = Carbon::now()->format('Y-m-d H:i:s');
                $dailyAtt->save();
                \Alert::success('Bye Bye \n'.$person->full_name .'\n Exit At: '. $dailyAtt->exitTime)->flash();
            }
            else
            {
                $dailyAtt = new DailyAttendance();
                $dailyAtt->employee_id = $person->id;
                $dailyAtt->save();
                \Alert::success('Welcome \n'.$person->full_name .'\n Entered At: '. Carbon::now()->format('Y-m-d H:i:s'))->flash();
            }
        }
        else {
            \Alert::error("Employee was not found!")->flash();
        }
        return redirect('pos/home');
    }
}
