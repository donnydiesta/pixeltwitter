<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\UserModel;

class LoginController extends Controller
{ 
    public function index(Request $request)
    {
    	#get sess flash
    	$flash_msg1 	= '';
    	$flash_msg2	= '';
    	if ($request->session()->has('flash_msg1')) 
    	{
		    $flash_msg1 = $request->session()->get('flash_msg1');
		}
		
		if ($request->session()->has('flash_msg2')) 
    	{
		    $flash_msg2 = $request->session()->get('flash_msg2');
		}
		
		#view params
    	$prm['form_action']	= url('/login_process');
    	$prm['flash_msg1'] 	= $flash_msg1;
    	$prm['flash_msg2'] 	= $flash_msg2;
    	
		return view('login.index')->with('data', $prm);
	}
	
	public function loginProcess(Request $request)
	{
		#get params
		$qemail	= $request->input('email');
		$qpass	= $request->input('password');
		
		#check database
		$cl = UserModel::getUserLogin($qemail, $qpass);
		
		#process
		if ($cl->first())
		{
			#success
			$data = $cl->first();
			
			#set logged session 
			$sess = array(
						'user_id'	=> $data->user_id,
						'email'		=> $data->email,
						'name'		=> $data->name
					);
			
			$request->session()->put('logged_user', $sess);
			
			return redirect('/');
		}
		else
		{
			#failed
			$request->session()->flash('flash_msg1', '<span style="color: #fc7275;"><b>Login failed. Please check your account.</b></span>');
			
			return redirect('/login');
		}
	}
	
	public function register(Request $request)
	{
		#get params
		$qemail	= $request->input('email');
		$qname	= $request->input('name');
		$qpass	= $request->input('password');
		
		#check email exist
		$userModel = new UserModel; 
		
		$ce	= $userModel->getUserLogin($qemail);
		
		if (!$ce->first())
		{
			#insert
			$ins_prm	= array(
							'email'		=> $qemail,
							'name'		=> $qname,
							'password'	=> $qpass
						);
			
			$ins = $userModel->insert($ins_prm);
			
			#set flash session message
			if ($ins == TRUE)
			{
				$request->session()->flash('flash_msg1', '<span style="color: #00aa00;"><b>Congrats, your email has been successfully registered.<br/> Please login.</b></span>');
			}
			else
			{
				$request->session()->flash('flash_msg2', 'Error');
			}
		}
		else
		{
			#exist, don't insert
			$request->session()->flash('flash_msg2', '<span style="color: #fc7275;"><b>Your email is alredy registered. Please register other email.</b></span>');
		}
		
		return redirect('/login');
	}
}
