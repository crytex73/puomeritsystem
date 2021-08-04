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

    // /**
    //  * Pay compound function
    //  */
    // public function payCompound(){
    //     return 0;
    // }

}
 