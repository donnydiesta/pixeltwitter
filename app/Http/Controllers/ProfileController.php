<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\UserModel;

class ProfileController extends Controller
{
    public function __construct()
    {
    		
    }
    
    public function index(Request $request)
    {
    	#get sess flash
    	$flash_msg = '';
    	if ($request->session()->has('flash_msg')) 
    	{
			$flash_msg = $request->session()->get('flash_msg');
		}
		$flash_msg2 = '';
    	if ($request->session()->has('flash_msg2')) 
    	{
			$flash_msg2 = $request->session()->get('flash_msg2');
		}
		
    	$user_model = new UserModel;
    	
    	#Get user data 
    	$suser 	= getLoggedUser();
    	$dbuser = $user_model->getUserById($suser['user_id']);
    	
    	#Get user photo 
    	$img_path 	= '/images/users/' . $suser['user_id'] . '/profpic.jpg';
    	$img_html	= '';
    	if (file_exists(public_path() . $img_path))
    	{
			$img_html = '<div class="thumbnail"><img align="middle" src="' . asset($img_path) . '"/></div>';
//			$img_html = '<div style="background: url(\''.asset($img_path).'\'); background-size: 200px 200px; background-repeat:no-repeat;border-radius: 50%; width: 200px; height: 200px;"></div>';
		}
    	
    	if ($dbuser->first())
    	{
			$prm = array(
						'user' 			=> $dbuser->first(),
						'form_action'	=> 'save_profile',
						'form_action2'	=> 'photo_upload',
						'flash_msg'		=> $flash_msg,
						'flash_msg2'	=> $flash_msg2,
						'profpic'		=> $img_html
					);
		}
		else
		{
			
		}
    	
    	#view params
		return view('profile.index')->with('data', $prm);
	}
	
	public function saveProfile(Request $request)
	{
		#get params
		$qemail		= $request->input('email');
		$qcur_email	= $request->input('current_email');
		$qname		= $request->input('name');
		$qpass		= $request->input('password');
		
		$suser 	= getLoggedUser();
		
		$user_model	= new UserModel;
		
		#check email
		if ($qemail != $qcur_email)
		{
			$ge = $user_model->getUserLogin($qemail, '');
			
			$con = (!$ge->first()) ? TRUE : FALSE;
		}
		else
		{
			$con = TRUE;
		}
		
		#process 
		if ($con == TRUE)
		{
			#save profile
			$edit_prm = array(
							'name'		=> $qname,
							'email'		=> $qemail,
							'password'	=> $qpass
						);
			
			$upd = $user_model->where('user_id', $suser['user_id'])->update($edit_prm);
			
			if ($upd == true)
			{
				#success save
				$request->session()->flash('flash_msg', '<span style="color: #008800;"><b>Edit Success.</b></span>');
			}
			else
			{
				$request->session()->flash('flash_msg', '<span style="color: #fc7275;"><b>No changes</b></span>');
			}
		}
		else
		{
			#email exist, can not process
			$request->session()->flash('flash_msg', '<span style="color: #fc7275;"><b>Edit failed, your new email was already taken.</b></span>');
		}
		
		return redirect('/profile');
	}
	
	public function photoUpload(Request $request)
	{
		$file = $request->file('img');
		$suser 	= getLoggedUser();
		
		//Move Uploaded File
		$destinationPath = public_path() . '/images/users/' . $suser['user_id'];
		$ext = $file->getClientOriginalExtension();
		$file->move($destinationPath, 'profpic.jpg');
		
		//resize
		$filename = public_path() . '/images/users/' . $suser['user_id'] . '/profpic.jpg';
		$percent = 1.0;
		
		list($orig_width, $orig_height) = getimagesize($filename);
		
		$max_height = 300;
		$max_width 	= 300;
		
	    $width = $orig_width;
	    $height = $orig_height;

	    # taller
	    if ($height > $max_height) {
	        $width = ($max_height / $height) * $width;
	        $height = $max_height;
	    }

	    # wider
	    if ($width > $max_width) {
	        $height = ($max_width / $width) * $height;
	        $width = $max_width;
	    }

	    $image_p = imagecreatetruecolor($width, $height);
		
		if ($ext == 'png' || $ext == 'PNG')
		{
			$image = imagecreatefrompng($filename);
		}
		else
		{
			$image = imagecreatefromjpeg($filename);	
		}

	    imagecopyresampled($image_p, $image, 0, 0, 0, 0, 
	                                     $width, $height, $orig_width, $orig_height);
		
		if ($ext == 'png' || $ext == 'PNG')
		{
			imagepng($image_p, $filename, 0);
		}
		else
		{
			imagejpeg($image_p, $filename, 100);
		}
		
		#session flash message
		$request->session()->flash('flash_msg2', '<span style="color: #008800;"><b>Profile Picture updated.</b></span>');

		return redirect('/profile');
	}
}
