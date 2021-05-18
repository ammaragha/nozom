<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;

class app_ctrl extends Controller
{
    public function index()
    {
    	if(Auth::check()){
    		if(Auth::user()->role ==1){
    			return Redirect::to('/dash');	
    		}else{
	    		return view('index');

    		}
    	}else{
    		return Redirect::to('/login');
    	}
    }
}
