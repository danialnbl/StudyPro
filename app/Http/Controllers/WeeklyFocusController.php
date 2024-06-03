<?php

namespace App\Http\Controllers;
use App\Models\WeeklyFocus;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WeeklyFocusController extends Controller
{
    public function AddWeeklyFocusView()
    {
        return view('WeeklyFocus.AddWeeklyFocusView');
    }

    public function submitWeeklyFocusView(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'block' => 'required|string',
            'inputinfo' => 'required|array',
            'inputinfo.*' => 'required|string',
        ]);
        
        $weeklyFocus = [
            'WF_Date' => $validatedData['date'],
            'WF_AdminInfo' => '',
            'WF_FocusInfo' => '',
            'WF_SocialInfo' => '',
            'WF_RecoveryInfo' => '',
        ];
    
        // Store data based on the selected block
        switch ($validatedData['block']) {
            case 'admin':
                $weeklyFocus['WF_AdminInfo'] = implode(', ', $validatedData['inputinfo']);
                break;
            case 'focus':
                $weeklyFocus['WF_FocusInfo'] = implode(', ', $validatedData['inputinfo']);
                break;
            case 'recovery':
                $weeklyFocus['WF_RecoveryInfo'] = implode(', ', $validatedData['inputinfo']);
                break;
            case 'social':
                $weeklyFocus['WF_SocialInfo'] = implode(', ', $validatedData['inputinfo']);
                break;
        }
    
        WeeklyFocus::create($weeklyFocus);
        return redirect()->route('viewWeeklyFocus')->with('success', 'Weekly Focus added successfully.');
    }
    

    public function ListWeeklyFocusView()
    {
        $weeklyFocus = WeeklyFocus::all();
        return view('WeeklyFocus.ListWeeklyFocusView');
    }

}

