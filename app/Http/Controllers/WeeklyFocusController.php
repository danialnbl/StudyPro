<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeeklyFocusController extends Controller
{
    public function AddWeeklyFocusView(){
        return view('manageWeeklyFocusView.AddWeeklyFocusView');
    }

    
}
