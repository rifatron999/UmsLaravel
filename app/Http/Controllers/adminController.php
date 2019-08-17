<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    public function index(Request $request){
    	if($request->session()->get('type') == 'admin'){
		return view('page.portal.admin.portal');
	}
	else{
		$request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }
	}





public function verification(Request $request){
    	if($request->session()->get('type') == 'admin')
    	{
				//fetching req UserList starts

				$verification	= DB::table('t_temp_users')->get();
				 
				return view('page.portal.admin.verification', ['verification' => $verification ]);

				 //->get();
//echo $result;
		}
	else{
		$request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }
	}



public function updateAdmin($ut_id,Request $req){
        
    
            //update to ut_users starts

           

            $newUserRow = DB::table('t_temp_users')->where('ut_id', $ut_id)
                             
                             ->get();


                              DB::table('t_temp_users')->where('ut_id', $ut_id)
            ->delete();
  

            DB::table('t_users')->insert([
                ['u_name' => $newUserRow[0]->ut_name,  
                'u_password' => $newUserRow[0]->ut_password ,
                'u_dob' => $newUserRow[0]->ut_dob ,
                'u_gender' => $newUserRow[0]->ut_gender ,

                'u_email' => $newUserRow[0]->ut_email ,
                'u_phone' => $newUserRow[0]->ut_phone ,
                'u_type' => $newUserRow[0]->ut_type ,
                'u_dept' => $newUserRow[0]->ut_dept ,              
            ]
                
            ]);      
            //insert to t_course_faculty ends                

                    $req->session()->flash('msg', "✔ New User Added To Your Portal");
                            return redirect()->route('admin.verification');
                    

    }





    public function delete($ut_id){
    	
        

        $s = DB::table('t_temp_users')->where('ut_id', $ut_id)
            ->delete();
        //echo $s;
    	return view('admin.verification', ['ut_id'=> $s]);
    }

    public function destroy(Request $req, $ut_id){
    
        User::destroy($utid);
        return redirect()->route('admin.verification');
    }




	

public function userlist(Request $request){
    	if($request->session()->get('type') == 'admin')
    	{
				//fetching req UserList starts

				$userlist	= DB::table('t_users')
				->get();
				 
				

				return view('page.portal.admin.userlist', ['userlist' => $userlist ]);

				 //->get();
//echo $result;
		}
	else{
		$request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }
	}





	 public function departmentinsert(Request $request){
    	if($request->session()->get('type') == 'admin'){
				
				 	return view('page.portal.admin.department');
		}
	else{
		$request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }
	}



	 public function insertdepartment(Request $req){
			
	       $req->validate
	       ([          
	            'd_name'=>'required',    
	        ]); 


	//insert statrs
	       //echo $req->session()->get('username');

	       DB::table('t_department')->insert
	       ([
		    [ 
		    'd_name' => $req->d_name ,
		    ]    
			]);
	//insert ends
	       $req->session()->flash('msg', "✔ Your department has been Inserted");
	        		return redirect()->route('admin.department');
		}





	public function department(Request $request){
	    	if($request->session()->get('type') == 'admin')
	    	{
					//fetching req UserList starts

					$department	= DB::table('t_department')->get();
					 
					return view('page.portal.admin.department', ['department' => $department ]);

					 //->get();
	//echo $result;
			}
		else{
			$request->session()->flash('msg', "illigal request!");
	            return redirect()->route('login.index');
	        }
		}






	 public function courseinsert(Request $request){
    	if($request->session()->get('type') == 'admin'){
				
				 	return view('page.portal.admin.course');
		}
	else{
		$request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }
	}



	 public function insertcourse(Request $req){
			
	       $req->validate
	       ([          
	            'c_code'=>'required',  
	            'c_name'=>'required', 
	            'c_section'=>'required', 
	            'c_semester'=>'required', 


	        ]); 


	//insert statrs
	      //echo $req->session()->get('username');

	       DB::table('t_course_semester')->insert
	       ([
		    [ 
		    'c_code' => $req->c_code ,
		    'c_name' => $req->c_name ,
		    'c_section' => $req->c_section ,
		    'c_semester' => $req->c_semester ,
		    ]    
			]);
	//insert ends
	       $req->session()->flash('msg', "✔ Your course has been Inserted");
	        		return redirect()->route('admin.course');
		}





	public function course(Request $request){
	    	if($request->session()->get('type') == 'admin')
	    	{
					//fetching req UserList starts

					$course	= DB::table('t_course_semester')->get();
					 
					return view('page.portal.admin.course', ['course' => $course ]);

					 //->get();
	//echo $result;
			}
		else{
			$request->session()->flash('msg', "illigal request!");
	            return redirect()->route('login.index');
	        }
		}




}

