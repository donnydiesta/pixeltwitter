@extends('templates.main')
@section('content')
<div class="content_container">
	<div>
		<div class="login_box">
			<div style="text-align: center; line-height: 100%">{!! $data['flash_msg1'] !!}</div>
			{!! Form::open(array('url' => 'login_process', 'name' => 'loginForm', 'id' => 'login_form')) !!}
				<b>LOGIN</b><br/>
				<input type="text" name="email" placeholder="Email" style="width: 100%" autofocus=""/><div></div>
				<input type="password" name="password" placeholder="Password" style="width: 100%"/> <span></span>
				<div style="width: 100%; text-align: center;"><button class="my_button">Login</button></div>
			{!! Form::close() !!}
		</div>
		<div class="separator"></div>
		<div class="login_box">
			<div style="text-align: center; line-height: 100%">{!! $data['flash_msg2'] !!}</div>
			<b>REGISTER</b><br/>
			{!! Form::open(array('url' => 'register', 'name' => 'register_form', 'id' => 'register_form')) !!}
			<input type="text" name="email" placeholder="Email" style="width: 100%"/>
			<input type="text" name="name" placeholder="Name" style="width: 100%"/>
			<input type="password" name="password" placeholder="Password" style="width: 100%"/>
			<div style="width: 100%; text-align: center;"><button class="my_button">Register</button></div>
			{!! Form::close() !!}
		</div>
	</div>
	<h1></h1>
	
	<script>
		$("#login_form").validate({
            rules: {
            	email: {
                    required: true,
                    email: true
                },
                password:
                {
					required: true
				}
            },
            messages: {
			},
            errorElement: "div",
            errorClass: "valError",
            highlight: function(element, errorClass) {
			    $(element).removeClass(errorClass);
			}
        });
        
        $("#register_form").validate({
            rules: {
            	email: {
                    required: true,
                    email: true
                },
                name: {
                    required: true
                },
                password:
                {
					required: true
				}
            },
            messages: {
			},
            errorElement: "div",
            errorClass: "valError",
            highlight: function(element, errorClass) {
			    $(element).removeClass(errorClass);
			}
        });
	</script>
</div>
@endsection