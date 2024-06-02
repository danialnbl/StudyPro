<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeeklyFocusController extends Controller
{
    public function AddWeeklyFocusView(){
        return view('manageWeeklyFocusView.AddWeeklyFocusView');
    }

    public function ListWeeklyFocusView(){
        return view('manageWeeklyFocusView.ListWeeklyFocusView');
    }

    public function EditWeeklyFocusView(){
        return view('manageWeeklyFocusView.EditWeeklyFocusView');
    }

    public function FeedbackWFWeeklyFocusView(){
        return view('manageWeeklyFocusView.FeedbackWFWeeklyFocusView');
    }

    public function SearchWeeklyFocusView(){
        return view('manageWeeklyFocusView.SearchWFWeeklyFocusView');
    }

    public function ListPlatinumWFView(){
        return view('manageWeeklyFocusView.FeedbackWFWeeklyFocusView');
    }

    public function testing(){
        return view('manageWeeklyFocusView.testing');
    }

    public function testingadd(){
        return view('manageWeeklyFocusView.testingadd');
    }

}

