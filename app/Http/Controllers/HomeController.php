<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compound;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user() && Auth::user()->is_lecturer){
            $lectData = Lecturer::firstWhere('user_id', Auth::user()->id);
            $compoundCounts = Compound::where('lecturer_id', $lectData->id)->count();
            $settledCompoundCounts = Compound::where('lecturer_id', $lectData->id)->where('payment_status', true)->count();
            return view('home', compact('compoundCounts', 'settledCompoundCounts'));
        }else {
            $studData = Student::firstWhere('user_id', Auth::user()->id);
            $merit = $studData->merit;
            $unsettledCompoundCounts = Compound::where('student_id', $studData->id)->where('payment_status', false)->count();
            $settledCompoundCounts = Compound::where('student_id', $studData->id)->where('payment_status', true)->count();
            return view('home', compact('unsettledCompoundCounts', 'settledCompoundCounts', 'merit'));
            
        }
        
    }
}
