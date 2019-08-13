<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class studentController extends Controller
{
    public function index(Request $request){
    	if($request->session()->get('type') == 'student'){
		return view('page.portal.student.portal');
		}
	else{
		$request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }
	
	}
}

