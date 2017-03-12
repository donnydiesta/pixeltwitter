<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\StatusMessageModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		
		
		
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	#remove session last feed time
    	$request->session()->forget('last_feed_time');
    	
    	#prepare JS action
    	$js = "<script>
    			$(document).ready(function(){
    				$('#update_status_form').submit(function(){
						if ($('#status_txt').val() == '')
						{
							$('#update_notif_txt').show();
			            	$('#update_notif_txt').html('<span style=\'color:#dd0000;\'><b>Please fill the status</b></span>');
			              	$('#update_notif_txt').hide().slideDown();
			              	$('#update_notif_txt').delay(1500).show().slideUp();
						}
						else
						{
							$.ajax({
					            type: 'POST',
					            url:  '" . url('/update_status') . "',
					            data: $(this).serialize(),
					            success: function (msg) {
					            	$('#status_txt').val('');
					              	
					              	$('.content_container').prepend(msg).hide().slideDown();
					              	
					            }
					        });	
						}
						return false;
					});
					
					$.ajax({
			            type: 'GET',
			            url:  '" . url('/get_all_status') . "',
			            data: $(this).serialize(),
			            success: function (msg) {
			            	$('.content_container').html(msg);
			            }
			        });	
				});
    			</script>";
    	
    	#view
    	$prm = array(
						'form_action'	=> 'save_profile',
						'js'			=> $js
					);    	
    	return view('home.index')->with('data', $prm);
    }
    
    public function updateStatus(Request $request)
    {
    	#get params
		$qmessage = $request->input('message');
		
		$suser 	= getLoggedUser();
		
		#insert status
		$ins_prm	= array(
							'user_id'	=> $suser['user_id'],
							'message'	=> $qmessage,
							'created'	=> time()
						);
			
		$ins = StatusMessageModel::insert($ins_prm);
		
		$this->getAllStatus($request);
	}
	
	public function getAllStatus(Request $request)
	{
		#get last feed time
		if ($request->session()->get('last_feed_time') == null) 
        {
			$last_feed_time = '';
		}
		else
		{
			$last_feed_time = $request->session()->get('last_feed_time');
		}
		
		$suser 	= getLoggedUser();
		
		#get data
		$ga = StatusMessageModel::getAll($last_feed_time);
		
		$html = '';
		if ($ga->count())
		{
			foreach($ga->get() as $k => $v)
			{
				if ($k == 0)
				{
					$request->session()->put('last_feed_time', $v->created);
				}
				
				if ($v->user_id == $suser['user_id'])
				{
					$html .= '<div class="feed_box" style="background-color:#cee0c9;">';
					$img_path 	= '/images/users/' . $v->user_id . '/profpic.jpg';
					$html .= '<table border="0" style="width:100%">
								<tr>
									<td style="padding-right: 15px;" valign="middle" align="right"><b>' . $v->name . '</b><br/>' . $v->message . '</td>
									<td width="75px"><div class="thumbnail_home"><img align="middle" src="' . asset($img_path) . '"/></div></td>
								</tr>
							</table>';	
				}
				else
				{
					$html .= '<div class="feed_box" style="background-color:#ffffff;">';
					$img_path 	= '/images/users/' . $v->user_id . '/profpic.jpg';
					$html .= '<table border="0" style="width:100%">
								<tr>
									<td width="75px"><div class="thumbnail_home"><img align="middle" src="' . asset($img_path) . '"/></div></td>
									<td style="padding-left: 15px;" valign="middle"><b>' . $v->name . '</b><br/>' . $v->message . '</td>
								</tr>
							</table>';
				}
				$html .= '</div>';
			}
			
		}
		
		echo $html;
		
	}
    
    public function logout(Request $request)
    {
		$request->session()->flush();
		
		return redirect('/');
	}
}
