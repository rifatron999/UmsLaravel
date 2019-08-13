<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
