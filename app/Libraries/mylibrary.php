<?php
namespace App\Libraries;

class MyLibrary
{
	function check_login()
	{
//		session(['logged_user' => '']);
//		session(['logged_user' => 'value']);
		
		$out = (session('logged_user') != NULL) ? TRUE : FALSE;
		
		return $out;
	}
}
?>