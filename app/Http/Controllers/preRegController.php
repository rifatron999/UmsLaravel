<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class preRegController extends Controller
{
    
  public function index(Request $req){

        
        	
        	if($req->session()->get('type') == 'faculty')
        	{
                 return redirect()->route('preReg.faculty');
        		//return view('page.portal.faculty.portal');
        	}
        	
        	if($req->session()->get('type') == 'admin')
        	{
        		//return redirect()->route('admin.index');
        	}
        	
        	if($req->session()->get('type') == 'register')
        	{
        		//return redirect()->route('register.index');
        	}
        	
        	if($req->session()->get('type') == 'student')
        	{
        		//return redirect()->route('student.index');
        	}

        	else{
        		$req->session()->flash('msg', "illigal usertype or request!");
        		return redirect()->route('login.index');
        	    }

            

    }







 public function faculty(Request $request){
    	if($request->session()->get('type') == 'faculty'){
				//fetching logged facult's preReg starts

$facReg	= DB::table('t_course_register')->where('c_register_dept', $request->session()->get('dept'))
->where('c_register_status', 0)

->get();





//echo $facReg;
    		//echo $request->session()->get('dept');

 				 //fetching logged facult's preReg  ends

				 //facReg check starts
				 if(count($facReg) > 0)
				 {
				 	return view('page.portal.preReg.faculty.preReg',  ['facReg' => $facReg]);
				 }
				 else 
				 {
				 	return redirect()->route('portal.index');
				 	//return view('page.portal.faculty.tsfSubmit');
				 }


				 //facReg check ends

		
		}
	else{
		$request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }


	}






		 public function updateFaculty($c_register_id,Request $req){
		
	
//update to t_course_register starts

DB::table('t_course_register')->where('c_register_id', $c_register_id)
->update([
	
		 
    'c_register_status' => 1
	
]);

//update to t_course_register ends
//getting course details from t_course_register starts

$newCourseRow	= DB::table('t_course_register')->where('c_register_id', $c_register_id)
				 
				 ->get();
//getting course details from t_course_register starts

//insert to t_course_faculty starts		

DB::table('t_course_faculty')->insert([
    ['c_faculty_name' => $newCourseRow[0]->c_register_name,  
    'c_faculty_dept' => $newCourseRow[0]->c_register_dept ,
    'c_faculty_semester' => $newCourseRow[0]->c_register_semester ,
    'c_faculty_section' => $newCourseRow[0]->c_register_section ,
    'c_faculty_faculty' => $req->session()->get('username'),
    'c_faculty_capacity' => 0
    
]
    
]);		 
//insert to t_course_faculty ends				 


	 	

		


		$req->session()->flash('msg', "✔ New Course Added To Your Portal");
        		return redirect()->route('preReg.faculty');
		

	}












}
