<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\joinedCourse;
use App\Models\admin;
use Hash;
use Session;



class AdminController extends Controller
{
    public function adminlogin()
    {
        { return view('admin.adminlogin'); } 
    }

    public function adminlogindata(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5'
                                         ]);
         $admin=admin::where('email','=',$request->email)->first();
            if($admin){
                if(Hash::check($request->password,$admin->password)){
                $request->Session()->put('loginId',$admin->id);
                return redirect('admindashboard');
                }
                else{ return back()->with('fail','Wrong Password!'); }
                }
            else{ return back()->with('fail','Email do not exist!'); }
    
        
       
    }

    public function admindashboard(){
        $data=array();
        if(Session::has('loginId')){
            $data = admin::where('id','=',Session::get('loginId'))->first();
        }

        return view('admindashboard',compact('data'));  
    }


    public function showstudents(){
        $data=array();
        if(Session::has('loginId')){
            $data = admin::where('id','=',Session::get('loginId'))->first();
        }
        if($data->role=='1'){
        $joinedCourses = joinedCourse::all();
        return view('ShowAllData',compact('joinedCourses'));
        }
        else{
            $joinedCourses = joinedCourse::where('teacherId','=',$data->id)->get();
            return view('ShowAllData',compact('joinedCourses'));
        }
    }
    

    public function delete($id){
        $course = joinedCourse::find($id);
        $course -> delete();
       return back();
    }


    public function adminlogout(){
        return redirect('/');
    }

    public function addnewadmin(Request $req){
        
        
        $req->validate([
            'role'=>'required',
            'name'=>'required|uppercase',
            'lastname'=>'required|uppercase',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:5'
        ]);

        $admin=new admin;
        $admin->role=$req->role;
        $admin->name=$req->name;
        $admin->lastname=$req->lastname;
        $admin->email=$req->email;
        $admin->password=Hash::make($req->password);
        $res=$admin->save();
        if($res){
            return back()->with('success','Registration Successfull');
        }
        else{
            return back()->with('fail','Try Again');
        }
    }

}