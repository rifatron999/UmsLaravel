<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
