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
    // public function submitCompound(){
    //     return 0;
    // }

}
 