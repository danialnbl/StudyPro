<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpertController extends Controller
{
    public function expertListView()
    {
        return view('manageExpertDomain.expertListView', [
            'expert' => Expert::all(),
        ]);
    }

    public function addExpertView()
    {
        return view('manageExpertDomain.addExpertView', [
            'expert' => Expert::all(),
        ]);
    }

    public function myExpertView()
    {
        return view('manageExpertDomain.myExpertListView', [
            'expert' => Expert::all(),
        ]);
    }
}
