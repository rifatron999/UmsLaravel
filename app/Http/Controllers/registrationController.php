<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class registrationController extends Controller
{
    public function index()
    {
      $t_department = DB::table('t_department')->get();
      //echo $t_department;
      //echo (count($t_department));
    	return view('page.registration.registration',['t_department' => $t_department]);
    }





    public function valid(Request $req){
		
		
       $req->validate([

            'u_name'=>'required|unique:t_users',
            'ut_password'=>'required|max:3',
            'ut_password'=>'required|max:3',
            'utc_password'=>'required|same:ut_password|max:3',
            'ut_email'=>'required',
            'ut_phone'=>'required|unique:t_temp_users',
            'ut_dob'=>'required',
            


            
        ]); 


//insert statrs
      // echo $req;

       DB::table('t_temp_users')->insert([
    ['u_name' => $req->u_name,  
    'ut_password' => $req->ut_password ,
    'ut_dob' => $req->ut_dob ,
    'ut_gender' => $req->ut_gender,
    'ut_email' => $req->ut_email,
    'ut_phone' => $req->ut_phone,
    'ut_type' => $req->ut_type,
    'ut_dept' => $req->ut_dept,
    'ut_pic' => $req->ut_pic
]
    
]);


//insert ends
       // //$msg="reg comp";
       //   return view('page.registration.registration')->with('msg', 'complete');
       
       $req->session()->flash('msg', "✔ Your registration request has been submitted to our admin");
        		return redirect()->route('registration.index');

		
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
