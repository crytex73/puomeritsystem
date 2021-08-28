<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Compound;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Page for views all student's compound
     */
    public function viewCompound(){
        $studData = Student::firstWhere('user_id', Auth::user()->id);
        $compounds = Compound::firstWhere('student_id', $studData->id)->get();

        return view('students.compound', compact('compounds'));
    }

    /**
     * Page for submitting student's merit
     */
    public function viewMerit(){
        return view('students.merit');
    }

    // /**
    //  * Pay compound function
    //  */
    // public function payCompound(){
    //     return 0;
    // }

    // /**
    //  * Submit merit function
    //  */
    // public function submitMerit(){
    //     return 0;
    // }

}
