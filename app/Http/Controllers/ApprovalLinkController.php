<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class ApprovalLinkController extends Controller
{
    public function approveMerit(Request $request){
        $studData = Student::firstWhere('id', (int)$request->stud);
        
        $studData->merit = $studData->merit + intVal($request->meritvalue);
        if ($studData->merit>100){
            $studData->merit = 100;
        }
        $studData->save();

        return view('approvallinks.approvemerit');

    }
}
