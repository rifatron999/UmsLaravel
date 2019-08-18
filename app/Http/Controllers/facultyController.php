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


$CourseNotice	= DB::table('t_course_notice')->where('n_course_id', $c_faculty_id)->orderBy('n_id', 'desc')
->get();


		return view('page.portal.faculty.sectionDetails',['facultyCourseDetails' => $facultyCourseDetails],['CourseNotice' => $CourseNotice]);
		}
	
	else{
		$request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }
	}
	//sectionDetails ends




//noticeInsert starts

public function noticeInsert($c_faculty_id,Request $request){
    	if($request->session()->get('type') == 'faculty'){

    		// echo $c_faculty_id;
    		// echo $request;


// $facultyCourseDetails	= DB::table('t_course_faculty')->where('c_faculty_id', $c_faculty_id)
// ->get();

//NOTICE INSERT STARTS 
    		$request->validate([

           
            'n_course_title'=>'required|max:40',
            'n_course_notice'=>'required'
            
            


            
        ]); 


//insert statrs
      // echo $req;

       DB::table('t_course_notice')->insert([
    ['n_course_id' => $c_faculty_id,  
    'n_course_title' => $request->n_course_title,  
    'n_course_date' => $request->n_course_date,  
    'n_course_notice' => $request->n_course_notice 
   
]
    
]);




$request->session()->flash('msg', "✓ NOTICE SENT !");
	return redirect()->route('faculty.sectionDetails',$c_faculty_id);
		}
	
	else{
		$request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }
	}
	//NOTICE INSERT ends



//loadUploadSlide starts

public function loadUploadSlide($c_faculty_id,Request $request){
    	if($request->session()->get('type') == 'faculty'){

$facultySlideList	= DB::table('t_course_slide')->where('sli_course_id', $c_faculty_id)
->get();


/*$CourseNotice	= DB::table('t_course_notice')->where('n_course_id', $c_faculty_id)->orderBy('n_id', 'desc')
->get();*/


		return view('page.portal.faculty.uploadSlide',['facultySlideList' => $facultySlideList,'CourseId' => $c_faculty_id]);
		}
	
	else{
		$request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }
	}
	//loadUploadSlide ends




//slideInsert starts

public function slideInsert($c_faculty_id,Request $request){
    	if($request->session()->get('type') == 'faculty'){



if($request->hasFile('sli_filename')){

            $file = $request->file('sli_filename');

           // echo "File Name: ".$file->getClientOriginalName();
           $fileName = $file->getClientOriginalName();

            /*echo "<br>File Extension: ".$file->getClientOriginalExtension();
            echo "<br>File Size: ".$file->getSize();
            echo "<br>File Mime Type: ".$file->getMimeType();*/

            $file->move('upload/slides', $fileName);
            
            /*echo $request->sli_term;
            echo $fileName;
            echo $c_faculty_id;*/
        }
        else{
            echo "File not found!";
        }






    		

       DB::table('t_course_slide')->insert([
    ['sli_filename' => $fileName,  
    'sli_course_id' => $c_faculty_id,  
    'sli_term' => $request->sli_term
   
]
    
]);

$request->session()->flash('msg', "✓ SLIDE UPLOADED !");
	return redirect()->route('faculty.sectionDetails.uploadSlide',$c_faculty_id);
		}
	
	else{
		$request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }
	}
	//slideInsert  ends


	//removeSlide starts

public function removeSlide($sli_id,Request $request){
    	if($request->session()->get('type') == 'faculty'){

$facultySlideList	= DB::table('t_course_slide')->where('sli_id', $sli_id)
->delete();


/*$CourseNotice	= DB::table('t_course_notice')->where('n_course_id', $c_faculty_id)->orderBy('n_id', 'desc')
->get();*/


		 return back()->with('msg', "✘ SLIDE REMOVED");
		}
	
	else{
		$request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }
	}
	//removeSlide ends


	//removeNotice starts

public function removeNotice($n_id,Request $request){
    	if($request->session()->get('type') == 'faculty'){

$facultySlideList	= DB::table('t_course_notice')->where('n_id', $n_id)
->delete();


/*$CourseNotice	= DB::table('t_course_notice')->where('n_course_id', $c_faculty_id)->orderBy('n_id', 'desc')
->get();*/


		 return back()->with('msg', "✘ NOTICE REMOVED");
		}
	
	else{
		$request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }
	}
	//removeNotice ends


//studentListGet starts

public function studentListGet($CourseId,Request $request){
    	if($request->session()->get('type') == 'faculty'){

$facultyStudentList	= DB::table('t_course_student')->where('c_student_courseId', $CourseId)
->get();
//echo $facultyStudentList;

 if(count($facultyStudentList) > 0)
				 {
				 	return view('page.portal.faculty.students',  ['facultyStudentList' => $facultyStudentList]);
				 }
				 else 
				 {
				 	 return back()->with('msg', "✘ You don't have any student yet");
				 	//
				 	//return view('page.portal.faculty.tsfSubmit');
				 }






		
		}
	else{
		$request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }
	}








//studentListGet ends






}
