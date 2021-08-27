<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Compound;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\User;
use App\Mail\NewCompoundEmail;

use Carbon\Carbon;


class LecturerController extends Controller
{
    /**
     * Page for views all student's compound
     */
    public function viewCompound(){
        $lectData = Lecturer::firstWhere('user_id', Auth::user()->id);
        $compounds = Compound::firstWhere('lecturer_id', $lectData->id)->get();

        return view('lecturers.compound', compact('compounds'));
    }

    /**
     * Page to start submit new compound
     */
    public function newCompound(){
        $compounds = array(
            array(
                'ind' => 0,
                'compound_type'   => 'Membuat Bising/Menganggu Kenteteraman',
                'compound_value'  => 10.00,
                'merit_deduction' => 1
            ),
            array(
                'ind' => 1,
                'compound_type'   => 'Berpakaian Tidak Sopan',
                'compound_value'  => 50.00,
                'merit_deduction' => 2
            ),
            array(
                'ind' => 2,
                'compound_type'   => 'Berambut Panjang',
                'compound_value'  => 50.00,
                'merit_deduction' => 1
            ),
            array(
                'ind' => 3,
                'compound_type'   => 'Membuang Sampah Merata',
                'compound_value'  => 50.00,
                'merit_deduction' => 2
            ),
            array(
                'ind' => 4,
                'compound_type'   => 'Tidak Memakai Kad Pelajar',
                'compound_value'  => 50.00,
                'merit_deduction' => 1
            )
        );

        // return view('lecturers.newcompound', array('compounds' => $compounds));
        return view('lecturers.newcompound', compact('compounds'));
    }

    // /**
    //  * Submit new compound function
    //  */
    public function submitCompound(Request $request){
        $request->validate([
            'proof_file' => 'required|mimes:png,PNG,jpg,JPG,jpeg,JPEG|max:2048'
        ]);
        if($request->file()){
            $filename = time().'_'.$request->file('proof_file')->getClientOriginalName();
            $filepath = $request->file('proof_file')->storeAs('uploads',$filename,'public');
        }

        $lectData = Lecturer::firstWhere('user_id', Auth::user()->id);
        $studData = Student::firstWhere('matric_number',$request->matric_num);
        $studUser = User::firstWhere('id',$studData->user_id);

        $compound = new Compound;
        $compound->lecturer_id = $lectData->id;
        $compound->student_id = $studData->id;
        $compound->comp_value = $request->comp_value;
        $compound->merit_deduction = $request->merit_deduction;
        $compound->comp_reason = $request->comp_reason;
        $compound->proof_file_url = $filepath?'/storage' . $filepath : '';
        $compound->invoice_file_url = '';
        $compound->payment_status = false;
        $compound->submission_date = Carbon::now();
        $compound->save();
        
        //email
        $data = [
            'student_name' => $studData->fullname,
            'compound_reason' => $compound->comp_reason,
            'compound_value' => 'RM' . number_format((float)$compound->comp_value, 2, '.', ''),
            'lecturer_name' => $lectData->fullname
        ];
        Mail::to($studUser->email)->send(new NewCompoundEmail($data));

        return redirect()->route('lecturer.viewCompound', ['newCompoundSubmitted'=> true]);
    }

}
 