<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class facultyController extends Controller
{


    public function index(Request $request){
    	if($request->session()->get('type') == 'faculty'){

$facultyCourseList	= DB::table('t_course_faculty')->where('c_faculty_faculty', $request->session()->get('username'))
->get();


		return view('page.portal.faculty.portal',  ['facultyCourseList' => $facultyCourseList]);
		}
	else{
		$request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }
	}





	 public function tsf(Request $request){
    	if($request->session()->get('type') == 'faculty'){
				//fetching logged facult's tsf starts

$tsf	= DB::table('t_tsf')->where('t_name', $request->session()->get('username'))
				 
				 ->get();

//echo $result;

 				//fetching logged facult's tsf ends

				 //tsf check starts
				 if(count($tsf) > 0)
				 {
				 	return view('page.portal.faculty.tsfUpdate',  ['tsf' => $tsf]);
				 }
				 else 
				 {
				 	return redirect()->route('faculty.tsf.insert');
				 	//return view('page.portal.faculty.tsfSubmit');
				 }


				 //tsf check ends

		
		}
	else{
		$request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }


	}





	 public function tsfinsert(Request $request){
    	if($request->session()->get('type') == 'faculty'){
				

				 	return view('page.portal.faculty.tsfSubmit');
				

		
		}
	else{
		$request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }


	}





 public function insertTsf(Request $req){
		
		
       $req->validate([

            
            't_sun'=>'required',
            't_mon'=>'required',
            
            


            
        ]); 


//insert statrs
       //echo $req->session()->get('username');

       DB::table('t_tsf')->insert([
    ['t_name' => $req->session()->get('username'),  
    't_sun' => $req->t_sun ,
    't_mon' => $req->t_mon ,
    't_tue' => $req->t_tue,
    't_wed' => $req->t_wed,
    
]
    
]);


//insert ends
     //  $msg="TSF Updated";
         //return view('page.registration.registration')->with('msg', 'complete');
       $req->session()->flash('msg', "✔ Your Tsf has been Inserted");
        		return redirect()->route('faculty.tsf');

		
		

	}


//updateTsf starts

	 public function updateTsf(Request $req){
		
		
//        $req->validate([

            
//             't_sun'=>'required',
//             't_mon'=>'required',
            
            


            
//         ]); 


DB::table('t_tsf')->where('t_name', $req->session()->get('username'))
->update([
	
		 
    't_sun' => $req->t_sun ,
    't_mon' => $req->t_mon ,
    't_tue' => $req->t_tue,
    't_wed' => $req->t_wed
	
]);
	 	//echo 'update called';

		$req->session()->flash('msg', "✔ Your Tsf has been Updated");
        		return redirect()->route('faculty.tsf');
		

	}
	//updateTsf ends





//sectionDetails starts

public function sectionDetails($c_faculty_id,Request $request){
    	if($request->session()->get('type') == 'faculty'){

$facultyCourseDetails	= DB::table('t_course_faculty')->where('c_faculty_id', $c_faculty_id)
->get();


		return view('page.portal.faculty.sectionDetails',  ['facultyCourseDetails' => $facultyCourseDetails]);
		}
	
	else{
		$request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }
	}
	//sectionDetails ends







}
