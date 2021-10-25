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
        $compounds = Compound::where('lecturer_id', $lectData->id);
        if ($compounds){
            $compounds = $compounds->get();
        }else {
            $compounds = [];
        }

        return view('lecturers.compound', compact('compounds'));
    }

    /**
     * Page to start submit new compound
     */
    public function newCompound(){
        $compounds = array(
            array(
                'ind' => 0,
                'compound_type'   => 'Tidak memulangkan buku/bahan perpustakaan',
                'compound_value'  => 50.00,
                'merit_deduction' => 5
            ),
            array(
                'ind' => 1,
                'compound_type'   => 'Merosakkan buku/bahan perpustakaan',
                'compound_value'  => 50.00,
                'merit_deduction' => 5
            ),
            array(
                'ind' => 2,
                'compound_type'   => 'Lewat memulangkan buku',
                'compound_value'  => 10.00,
                'merit_deduction' => 1
            ),
            array(
                'ind' => 3,
                'compound_type'   => 'Membuat bising/ menganggu kenteteraman',
                'compound_value'  => 10.00,
                'merit_deduction' => 1
            ),
            array(
                'ind' => 4,
                'compound_type'   => 'Berpakaian tidak sopan',
                'compound_value'  => 50.00,
                'merit_deduction' => 5
            ),
            array(
                'ind' => 5,
                'compound_type'   => 'Berpakaian tidak bersesuaian',
                'compound_value'  => 50.00,
                'merit_deduction' => 5
            ),
            array(
                'ind' => 6,
                'compound_type'   => 'Berambut panjang/tidak kemas/diwarnakan',
                'compound_value'  => 50.00,
                'merit_deduction' => 5
            ),
            array(
                'ind' => 7,
                'compound_type'   => 'Membuang sampah di merata-rata tempat',
                'compound_value'  => 50.00,
                'merit_deduction' => 5
            ),
            array(
                'ind' => 8,
                'compound_type'   => 'Menconteng di mana-mana bahagian bangunan/premis',
                'compound_value'  => 50.00,
                'merit_deduction' => 5
            ),
            array(
                'ind' => 9,
                'compound_type'   => 'Tidak menjaga kebersihan/kekemasan di mana-mana bahagian bangunan/premis',
                'compound_value'  => 50.00,
                'merit_deduction' => 5
            ),
            array(
                'ind' => 10,
                'compound_type'   => 'Membuat sebarang bentuk bunyi/bising yang menyebabkan gangguan',
                'compound_value'  => 50.00,
                'merit_deduction' => 5
            ),
            array(
                'ind' => 11,
                'compound_type'   => 'Menggunakan mana-mana bahagian bangunan/premis dalam kampus sebagai tempat tidur selain daripada kamsis',
                'compound_value'  => 20.00,
                'merit_deduction' => 2
            ),
            array(
                'ind' => 12,
                'compound_type'   => 'Tiada kad pelajar',
                'compound_value'  => 50.00,
                'merit_deduction' => 5
            ),
            array(
                'ind' => 13,
                'compound_type'   => 'Tidak Memakai Kad Pelajar',
                'compound_value'  => 50.00,
                'merit_deduction' => 5
            ),
            array(
                'ind' => 14,
                'compound_type'   => 'Kad pelajar rosak atau conteng',
                'compound_value'  => 30.00,
                'merit_deduction' => 3
            ),
            array(
                'ind' => 15,
                'compound_type'   => 'Memakai kad pelajar di tempat yang tidak bersesuaian',
                'compound_value'  => 20.00,
                'merit_deduction' => 2
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

        $studData->merit = $studData->merit - $compound->merit_deduction;
        $studData->save();
        
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
 