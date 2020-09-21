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
        return view('home',array('students'=>$student));
    }

    public function delete($id){
        //print($id);
       
        //$student=Student::find($id);
        //echo $student->delete();
        //Student::destroy[$id];    
        
        DB::delete('delete from student where id = ?',[$id]);
       return redirect()->back();

    }

    public function edit($id){


    }
}
