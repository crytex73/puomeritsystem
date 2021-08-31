<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Lecturer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HEPController extends Controller
{
    public function register(){
        return view('heps.new');
    }

    public function submitRegistration(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['pass']),
            'is_student' => $request->roleopt == 'student' ? true : false,
            'is_lecturer' => $request->roleopt == 'lecturer' ? true : false,
            'is_hep' => false,
        ]);

        if ($request->roleopt == 'student'){
            Student::create([
                'fullname' => $request->name,
                'course' => '',
                'matric_number' => $request->matric,
                'merit' => 100,
                'user_id' => $user->id,
            ]);
        }elseif ($request->roleopt == 'lecturer'){
            Lecturer::create([
                'fullname' => $request->name,
                'matric_number' => $request->matric,
                'user_id' => $user->id,
            ]);
        }
        return redirect()->route('home');

    }
}
