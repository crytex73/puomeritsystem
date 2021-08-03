<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Lecturer extends Controller
{
    public function lect() {
        return view('lecturers.index');
    }
}
