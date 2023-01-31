<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\joinedCourse;



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
       // $user=User::where('email','=',$request->email)->first();
        //if($user){
           // if(Hash::check($request->password,$user->password)){
             //   $request->Session()->put('loginId',$user->id);
                return redirect('admindashboard');

           // }else{
            //    return back()->with('fail','Wrong Password!');
            //}

 //       }
   //     else{
     //       return back()->with('fail','Email do not exist!');
       // }
       
    }
public function admindashboard(){

    $joinedCourses = joinedCourse::all();
    return view('admindashboard',compact('joinedCourses'));
   
    
}

    
public function delete($id){
        $course = joinedCourse::find($id);
        $course -> delete();
       return redirect('admindashboard');

    }
}