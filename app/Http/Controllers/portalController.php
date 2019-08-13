<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class portalController extends Controller
{
	
    

    public function index(Request $req){

        
        	
        	if($req->session()->get('type') == 'faculty')
        	{
                 return redirect()->route('faculty.index');
        		//return view('page.portal.faculty.portal');
        	}
        	
        	if($req->session()->get('type') == 'admin')
        	{
        		return redirect()->route('admin.index');
        	}
        	
        	if($req->session()->get('type') == 'register')
        	{
        		return redirect()->route('register.index');
        	}
        	
        	if($req->session()->get('type') == 'student')
        	{
        		return redirect()->route('student.index');
        	}

        	else{
        		$req->session()->flash('msg', "illigal usertype or request!");
        		return redirect()->route('login.index');
        	    }

            

    }
}
