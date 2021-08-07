<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Page for views all student's compound
     */
    public function viewCompound(){
        return view('lecturers.compound');
    }

    /**
     * Page to start submit new compound
     */
    public function newCompound(){
        return view('lecturers.newcompound');
    }

    // /**
    //  * Submit new compound function
    //  */
    // public function submitCompound(){
    //     return 0;
    // }

}
 