<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\ClassData;

class HomeController extends Controller
{
    //
    public function index(){
       
        //$student=Student::all();
        
        $student=DB::table('student')
            ->join('class','class.Id','=','student.ClassId')
            ->select('student.Id', 'student.Name', 'student.Surname','student.Gender','class.Name as className','student.Img')
            ->get()->toArray();

       
        return view('home',array('students'=>$student));
    }

    public function creat(){
        $classData=ClassData::all();
        return view('creat',array('class'=>$classData));
    }

    public function store(Request $request){
            //Log::debug('Some message.');
            //print($request->name); 
            //print($request->surname);
            //print($request->gender);
            //print($request->classId);
            
            $student =new Student([
                'Name'=>$request->name,
                'Surname'=>$request->surname,
                'Gender'=>$request->gender,
                'ClassId'=>$request->classId
            ]);
            
            //print $student;

            $file = $request->file('fileToUpload');
            $imageFileType= $file->getClientOriginalExtension();
            $uploadOk = 1;
             
             //Control file extension
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                 $uploadOk = 0;
             }
           


                //Move Uploaded File
                $destinationPath = 'img';
              
                if($uploadOk==1){
                     $file->move($destinationPath,$file->getClientOriginalName());
                     $student->img=$file->getClientOriginalName();
                }
                else{
                    if($request->gender==0){
                        $student->Img="female.jpg";  
                    }else{
                        $student->Img="male.jpg";
                    }
                }
                
              // $student->save(); 
              $sql="INSERT INTO student (Name, Surname, Gender,ClassId,Img) VALUES ('".$student->Name."','".$student->Surname."','".$student->Gender."',".$student->ClassId.",'".$student->Img."')";
              DB::delete($sql); 
              //print $sql;
              return redirect()->back();  
 
               
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

        $student =Student::find($id);
        $classData=ClassData::all();
        return view('edit',compact('student'),array('class'=>$classData));
    }

    public function update(Request $request,$id){
        
        $student =new Student([
            'Name'=>$request->name,
            'Surname'=>$request->surname,
            'Gender'=>$request->gender,
            'ClassId'=>$request->classId,
            'Img'=>$request->img

        ]);

            $file = $request->file('fileToUpload');
            //$image=$file->getClientOriginalName();
            
            if($file!=null){
                $imageFileType= $file->getClientOriginalExtension();
                $uploadOk = 1;
                 
                 //Control file extension
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                     $uploadOk = 0;
                 }
               
    
    
                    //Move Uploaded File
                    $destinationPath = 'img';
                  
                    if($uploadOk==1){
                         $file->move($destinationPath,$file->getClientOriginalName());
                         $student->img=$file->getClientOriginalName();
                    }
                    else{
                        if($request->gender==0){
                            $student->Img="female.jpg";  
                        }else{
                            $student->Img="male.jpg";
                        }
                    }
            }

            $sql = "UPDATE student SET Name='$student->Name', Surname='$student->Surname',Gender='$student->Gender',ClassId=".$student->ClassId.",Img='".$student->Img."' Where Id=".$id;
            
            DB::update($sql);

            return redirect('/');
    }
}
