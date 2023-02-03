<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\admin;
use Session;

class courseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $admin = admin::where('email','=',$request->email)->first();
        
            if($admin){
                if(Hash::check($request->password,$user->password))
                {
                     $request->Session()->put('loginId',$admin->id);
                }
                      }
            $data=array();
            if(Session::has('loginId')){
        $data = admin::where('id','=',Session::get('loginId'))->first();
            }
            if($data->role=='1'){
       $course = Course::all();
        return view('createcourses',compact('data'))->with('course',$course); }
        else{
            $course = Course::where('teacherId','=',$data->id)->get();
            return view('createcourses',compact('data'))->with('course',$course); 

        }   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
       
        
       /* if($res){
            return back()->with('success','Created Successfull');
        }
        else{
            return back()->with('fail','Try Again');
        }*/
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    $request->validate([
        'courseName'=>'required',
        'courseCode'=>'required|unique:courses',
       
         ]); 

         $data=array();
         if(Session::has('loginId')){
             $data=admin::where('id','=',Session::get('loginId'))->first();
         }        
        $course=new Course();
        $course->courseName=$request->courseName;
        $course->courseCode=$request->courseCode;
        $course->teacherId=$data->id;
        $course->save();
        return redirect('course');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $course= Course::find($id);
        $course->courseName=$request->courseName;
        $course->courseCode=$request->courseCode;
        $course->teacherId=$request->teacherId;
        $course->save();
        return redirect('course');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           $course = Course::find($id);
           $course -> delete();
           return redirect('course');

    }


    public function createcourses()
        {
            return view('admin.createcourses');
        }
        
  
}
