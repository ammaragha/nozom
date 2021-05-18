<?php

namespace App\Http\Controllers\myApp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Redirect;
use Hash;
use Session;
use Auth;

class auth_ctrl extends Controller
{
    public function index()
    {
    	if(Auth::check()){
    		if(Auth::user()->role ==1){
    			return Redirect::to('/dash');	
    		}else{
	    		return Redirect::to('/');

    		}
    	}else{
    		return view('auth.index');
    	}
    }


    public function doLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $data = ['email'=>$email,'password'=>$password];

        if(!Auth::attempt($data)){
            Session::flash('err','Email or password wrong');
            return Redirect::back();
        }else{
        	if(Auth::user()->role == 1){
        		return Redirect::to('/dash');
        	}else{
            	return Redirect::to('/');
        	}
        }
    }

    public function doSignin(Request $request)
    {
        Validator::make($request->all(), [
            'username'=>'required|max:20',
            'password'=>'required|max:20|min:4',
            'email'=>'required'
        ])->validate();


        if(isset($errors) && count($errors)>0){
            //
        }elseif($request->input('password') !== $request->input('rePassword')){
            Session::flash('err','passwords not match');
        }else{
            try{
                $row = new User;
                $row->name      = $request->input('username');
                $row->password  = Hash::make($request->input('password'));
                $row->email     = $request->input('email');
                
                $row->save();
                Session::flash('scc','Nice try to Login now ^^');
            }catch(\Exception $e){
                Session::flash('err','Email exists');
            }
        }

        return Redirect::back();
    }


    public function logout()
    {
    	Auth::logout();
    	return Redirect::to('/login');
    }
}
