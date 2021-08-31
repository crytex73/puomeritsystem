<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Auth\Middleware\Role as Middleware;
use Illuminate\Support\Facades\Auth;

class Role {

  public function handle($request, Closure $next, String $role) {
    if (!Auth::check()) // This isnt necessary, it should be part of your 'auth' middleware
      return redirect('/home');

    $isStudentUser = Auth::user()->is_student;
    $isLecturerUser = Auth::user()->is_lecturer;
    $isHepUser = Auth::user()->is_hep;

    if($isStudentUser && $role == 'student')
        return $next($request);
    else if($isLecturerUser && $role == 'lecturer')
        return $next($request);
    else if($isHepUser && $role == 'hep')
        return $next($request);

    return redirect('/home');
  }
}