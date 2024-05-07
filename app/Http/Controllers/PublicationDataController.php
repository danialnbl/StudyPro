<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicationDataController extends Controller
{
        public function addPublicationDataView()
        {
            return view('managePublicationData.addPublicationDataView',[

            ]);
        } 
}
