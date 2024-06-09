<?php

namespace App\Http\Controllers;

use App\Models\PlatinumGroup;
use App\Models\User;
use App\Models\Mentor;
use App\Models\Platinum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Exports\PlatinumsExport;
use Barryvdh\DomPDF\Facade\Pdf;

class ManageCRMPController extends Controller
{

    public function CRMPListView(){
        $platinum = Platinum::where('P_Status', 'CRMP')->get();

        return view('manageCRMPView.CRMPListView')->with('platinums', $platinum);
    }
    public function CRMPAssignView(){
        $platinum = Platinum::where('P_Status', 'Platinum')->get();
        return view('manageCRMPView.CRMPAssignView')->with('platinums', $platinum);
    }

    public function updateCRMPStatus(Request $request) {
        $platinum = Platinum::where('P_IC', $request->P_IC)->first();
        if ($platinum) {
            $platinum->P_Status = 'CRMP';
            $platinum->save();
            return response()->json(['success' => 'Status updated successfully.']);
        }
        
        \Log::error('Platinum not found with P_IC: ' . $request->P_IC);
        return response()->json(['error' => 'Platinum not found.'], 404);
    }

    public function CRMPProfileView(Request $request){
        $platinum = Platinum::where('P_IC', $request->P_IC)->first();

        return view('manageCRMPView.CRMPProfileView')->with('platinums', $platinum);
        }
    
    public function SearchPlatinumView(Request $request){
        // Retrieve the search input
        $search = $request->input('search');

        // Query the database based on the search input
        $platinum = Platinum::query()
            ->where('P_Name', 'LIKE', "%{$search}%")
            ->get();

        // Return the view with the search results
        return view('manageCRMPView.SearchPlatinumView')->with('platinums', $platinum);
    }

    public function generateReportCRMP(){
        $platinum = Platinum::where('P_Status', 'CRMP')->get();

        return view('manageCRMPView.CRMPReport')->with('platinums', $platinum);
    }

    public function CRMPReport()
    {
        $data = ['platinums'=> Platinum::where('P_Status', 'CRMP')->get()];
        $pdf = Pdf::LoadView('manageCRMPView.CRMPReport', $data)->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('generatecrmpreport.pdf');
    }

    public function PlatinumGroupView(){
        $crmp = Platinum::where('P_Status', 'CRMP')->get();
        $platinum = Platinum::where('P_Status', 'Platinum')->get();

        return view('manageCRMPView.PlatinumGroupView')
        ->with('platinums', $platinum)
        ->with('crmp', $platinum);
    }

    public function MyCRMP(Request $request){
        $platinum = Platinum::where('P_IC', $request->P_IC)->first();

        return view('manageCRMPView.MyCRMP')->with('platinums', $platinum);
        }
    
}
