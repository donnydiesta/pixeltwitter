@extends('templates.main')
@section('menubar')
	<div class="menu_bar">
		<a href="{{ url('/') }}">Home</a> | <a href="{{ url('/profile') }}">Profile</a> | <a href="{{ url('/logout') }}">Logout</a>
	</div>
@endsection
@section('content')
	<div class="update_status_box">
		{!! Form::open(array('url' => '', 'id' => 'update_status_form')) !!}
			{!! Form::text('message', '', array('placeholder' => 'Update status...', 'id' => 'status_txt', 'autofocus')) !!}
			<div style="width: 100%; text-align: right; margin-top: 10px;"><button class="my_button" style="padding: 10px 40px 10px 40px;">Update</button></div>
		{!! Form::close() !!}
	</div>
	<div id="update_notif_txt" style="margin: 0px 0px 0px 0px; text-align:center; font-size: 14px; background-color: #eeecea;"></div>
	<div class="content_container">
		
	</div>
	{!! $data['js'] !!}
@endsection