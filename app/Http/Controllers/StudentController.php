<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Page for views all student's compound
     */
    public function viewCompound(){
        return view('students.compound');
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
