<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class CustomAuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function registration(){
        return view('auth.registration');
    }
    public function registerUser(Request $request){
        
        $user=new User();
        $user->name=$request->name;
        $user->password=Hash::make($request->password);
        $user->email=$request->email;
        $res=$user->save();
        if($res){
            return back()->with('success','Registration Successfull');
        }
        else{
            return back()->with('fail','Try Again');
        }
    }
    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5'
        ]);
        $user=User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->Session()->put('loginId',$user->id);
                return redirect('dashboard');

            }else{
                return back()->with('fail','Wrong Password!');
            }

        }
        else{
            return back()->with('fail','Email do not exist!');
        }
    }
    public function dashboard(){
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
        return view('dashboard',compact('data'));
    }
    public function logout(){
        if(Session::has('loginId')){     
            Session::pull('loginId');
            return redirect('login');
        }

    }

}
