<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DraftThesisController extends Controller
{
    public function AddDraftThesisView(){
        return view('manageDraftThesisView.AddDraftThesisView');
    }

    public function create(){
        return view('manageDrafthesis.AddDraftThesisView');
    }

}
