<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class facultyController extends Controller
{


    public function index(Request $request){
    	if($request->session()->get('type') == 'faculty'){
		return view('page.portal.faculty.portal');
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

		return view('page.portal.faculty.tsf',  ['tsf' => $tsf]);
		}
	else{
		$request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }


	}





 public function uploadTsf(Request $req){
		
		
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
       $req->session()->flash('msg', "✔ Your Tsf has been updated");
        		return redirect()->route('faculty.tsf');

		
		// $result	= DB::table('t_users')->where('u_name', $req->u_name)
		// 		 ->where('u_password', $req->u_password)
		// 		 ->get();

		// //echo $result;

		// if(count($result) > 0){
			
		// 	$req->session()->put('username', $req->u_name );
		// 	$req->session()->put('type', $result[0]->u_type );
			
		// 	//return redirect()->route('home.index');
		// 	return redirect()->route('portal.index');
		// }else{
		// 	$req->session()->flash('msg', "invalid username or password!");
			
		// 	return redirect()->route('login.index');
		// 	//return view('login.index');
		// }

	}














}
