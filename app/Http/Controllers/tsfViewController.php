<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tsfViewController extends Controller
{
    

	 public function index($t_name)
    {
    	
            $tsf	= DB::table('t_tsf')->where('t_name',$t_name )
				 
				 ->get();

				 //echo $tsf;

				 return view('page.portal.tsfView.tsfView',  ['tsf' => $tsf]);
 
	}








}
