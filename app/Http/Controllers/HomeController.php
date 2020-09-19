<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class HomeController extends Controller
{
    //
    public function index(){
       
        $student=Student::all();
        return \view('home',array('students'=>$student));
    }
}
