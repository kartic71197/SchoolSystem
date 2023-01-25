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
    
    
    }
