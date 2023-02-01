<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\joinedCourse;
use App\Models\User;

use Hash;
use Session;

class joinedCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user=User::where('email','=',$request->email)->first();
            if($user)
            {
                        if(Hash::check($request->password,$user->password))
                        {
                             $request->Session()->put('loginId',$user->id);
                        }
            }
            $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }
           
           // $joinedCourses=array();
            $joinedCourses = joinedCourse::where('email','=',$data->email)->get();
                $list=array();       
                $course = Course::all();
                 return view('studentcourses',compact('joinedCourses'))->with('course',$course);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {   
     $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();
        }         
                $joinedCourses=new joinedCourse();
                $joinedCourses->name        = $data->name;
                $joinedCourses->email       = $data->email;
                $joinedCourses->courseName  = $req->courseName;
                $joinedCourses->courseCode  = $req->courseCode;
                $joinedCourses->teacherId   = $req->teacherId;
                $joinedCourses->save();
                return redirect('joinedcourses')->with('joinedcourses',$joinedCourses); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list = Course::where('id','=',id);
        return redirect('studentcourses')->with('list',$list);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = joinedCourse::find($id);
        $course -> delete();
        return redirect('joinedcourses');

    }
}
