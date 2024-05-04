<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function expertListView()
    {
    return view('manageExpertDomain.expertListView');
    }
}
