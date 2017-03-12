@extends('templates.main')
@section('menubar')
	<div class="menu_bar">
			<a href="{{ url('/') }}">Home</a> | <a href="{{ url('/profile') }}">Profile</a> | <a href="{{ url('/logout') }}">Logout</a>
	</div>
@endsection
@section('content')
<div class="content_container">
	<div class="photo_box">
		<div style="text-align: center; line-height: 2">{!! $data['flash_msg2'] !!}</div>
		{!! $data['profpic'] !!}
		{!! Form::open(array('url' => "{$data['form_action2']}", 'files' => 'true', 'id' => 'upload_form')) !!}
		{!! Form::file('img') !!}
		<div style="width: 100%; text-align: center;"><button>Upload</button></div>
		{!! Form::close() !!}
	</div>
	<div class="profile_edit_box">
	<div style="text-align: center; line-height: 2">{!! $data['flash_msg'] !!}</div>
	{!! Form::open(array('url' => "{$data['form_action']}", 'id' => 'save_profile_form')) !!}
		{!! Form::text('name', "{$data['user']['name']}") !!}
		{!! Form::text('email', "{$data['user']['email']}") !!}
		{!! Form::hidden('current_email', "{$data['user']['email']}") !!}
		{!! Form::input('password', 'password', "{$data['user']['password']}") !!}
		<br/><br/><br/>
		<div style="width: 100%; text-align: right;"><button>Save</button></div>
	{!! Form::close() !!}
	</div>
	
	<script>
		$("#save_profile_form").validate({
			rules: {
				name: {
					required: true
				},
				email: {
					required: true,
					email: true
				}
			},
			errorElement: "div",
			errorClass: "valError"
		});
		
		$("#upload_form").validate({
			rules: {
				img: {
					required: true,
					accept: 'png|jpg|jpeg|PNG|JPG|JPEG'
				}
			},
			messages: {
				img: {
					accept: 'Please upload jpg or png type'
				}
			},
			errorElement: "div",
			errorClass: "valError"
		});
	</script>
</div>
@endsection