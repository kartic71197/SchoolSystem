<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class AdminController extends Controller
{
    public function adminlogin(){
        {
            return view('admin.login');
        }
        
    }
    public function adminlogindata(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5'
        ]);
        return view('admindashboard');
    }
public function admindashboard(){
    return view('admindashboard');
}
    public function createcourses(){
        {
            return view('admin.createcourses');
        }
        
    }
    public function courseCreated(Request $request){
       
            $request->validate([
                'courseName'=>'required',
                'courseCode'=>'required|unique:courses',
                
            ]);

            $course=new Course();
            $course->courseName=$request->courseName;
            $course->courseCode=$request->courseCode;
            $res=$course->save();
            if($res){
                return back()->with('success','Created Successfull');
            }
            else{
                return back()->with('fail','Try Again');
            }
        }

    }
