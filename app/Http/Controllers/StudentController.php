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
        $compounds = Compound::where('student_id', $studData->id);
        if ($compounds){
            $compounds = $compounds->get();
        }else {
            $compounds = [];
        }

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
    public function submitMerit(Request $request){
        // $studData = Student::firstWhere('user_id', Auth::user()->id);

        // $studData->merit = $studData->merit + intVal($request->levelopt);
        // if ($studData->merit>100){
        //     $studData->merit = 100;
        // }
        // $studData->save();
        // return redirect()->route('home');

        $studData = Student::firstWhere('matric_number', Auth::user()->matric_number);
        $lectData = Lecturer::firstWhere('matric_number', $request->lectmatricnumber);
        $lectUserData = User::firstWhere('id', $lectData->user_id);
        $data = [
            'student_name' => $studData->fullname,
            'matric_number' => $studData->matric_number,
            'lecturer_name' => $lectData->fullname,
            'link' => Request::getHost() . '/approve-merit?stud=' . $studData->id . '&meritvalue=' . $request->levelopt 
        ];
        Mail::to($lectUserData->email)->send(new NewMeritEmail($data));
    }

}
