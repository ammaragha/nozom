<?php

namespace App\Http\Controllers\dash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use App\User;
use Session;
use Validator;
use Hash;
Use Response;
use DB;


class dash_ctrl extends Controller
{
     public function index()
    {
    	if(Auth::user() != null && Auth::user()->role == 1){
    		if(isset($_GET['search'])){
                if($_GET['search'] == 'admin') {
                    $data = User::where('role','=','1')->get();
                }else{

        			$data = User::where([
                        ['name','Like',"%".$_GET['search']."%"],
                        ['email','Like',"%".$_GET['search']."%"]
                        ])
        				->where('role','0')->get();
                }
    		}else{
    			$data = User::where('role','=',"0")->get();
    		}
    		
    		return view('dashboard.index')->withdata($data);
    	}else{
    		return Redirect::to('/');
    	}
    	
    }

    public function addUser()
    {
    	if(Auth::user() != null  && Auth::user()->role == 1){
    		return view('dashboard.addUser');
    	}else{
    		return Redirect::to('/');
    	}
    }

 //    public function checkEmail(Request $request){
	//     $data = $request->all(); // This will get all the request data.
	// 	$userCount = User::where('email', $data['email']);
	// 	if ($userCount->count()) {
	// 		return Response::json(array('msg' => 'true'));
	// 	} else {
	// 		return Response::json(array('msg' => 'false'));
	// 	}
	// }


    public function doAddUser(Request $request)
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
                Session::flash('scc','user has been added');
            }catch(\Exception $e){
                Session::flash('err','something went wrong mabye Email exists');
            }
        }

        return Redirect::back();

    }

    public function editUSer($id)
    {	
    	if(Auth::user() != null  && Auth::user()->role == 1){
    		$user = User::find($id);
    		return view('dashboard.editUSer')->withuser($user);	
		}else{
			return Redirect::to('/');
		}
		
    }


    public function doEditUSer(Request $request,$id)
    {
    	Validator::make($request->all(), [
            'username'=>'required|max:20',
            'email'=>'required'
        ])->validate();


        if(isset($errors) && count($errors)>0){
            //
        }elseif($request->input('password') !== $request->input('rePassword')){
            Session::flash('err','passwords not match');
        }elseif($request->input('password')==null ||  empty($request->input('password'))){
            $row = User::find($id);
                $row->name      = $request->input('username');
                $row->email     = $request->input('email');
                
                $row->save();
                Session::flash('scc','user has been Updated');
        }else{
            try{
                $row = User::find($id);
                $row->name      = $request->input('username');
                $row->password  = Hash::make($request->input('password'));
                $row->email     = $request->input('email');
                
                $row->save();
                Session::flash('scc','user has been Updated');
            }catch(\Exception $e){
                Session::flash('err','something went wrong mabye Email exists');
            }
        }

        return Redirect::back();
    }



    public function delUser($id)
    {
        try {
            User::find($id)->delete();
            Session::flash('k','Deleted..');

        } catch (\Exception $e) {
            Session::flash('err','Something went wrong');
        }
    	return Redirect::back();

    }
}
