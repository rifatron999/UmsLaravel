<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class registerController extends Controller
{
    public function index(Request $request){
    	if($request->session()->get('type') == 'register'){
		return view('page.portal.register.portal');
		}
	else{
		$request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }
	}
}
