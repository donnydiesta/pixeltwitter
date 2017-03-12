<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Fonts -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	
	<!--<script type="text/javascript" src="{{ asset('resources/assets/js/jquery-2.1.0.min.js')}}"></script>-->
	<script type="text/javascript" src="{{ asset('js/jquery-2.1.0.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.validate.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
	<!--<script type="text/javascript" src="{{ asset('resources/assets/js/jquery-ui.js')}}"></script>-->
	<!--<script type="text/javascript" src="{{ asset('resources/assets/js/angular.min.js')}}"></script>-->
	<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>-->
	
	
    <style>
        body {
            font-family: 'Lato';
            margin: 0;
        }
		
		.header {
			width: 100%;
			min-height: 20px;
			padding: 10px;
			background-color: #349cab;
			color: #ffffff;
			text-align: center;
		}
		
		.menu_bar {
			width: 100%;
			min-height: 5px;
			padding: 5px 20px 5px 10px;
			background-color: #25727c;
			color: #ffffff;
			text-align: right;
		}
		
		.menu_bar a
		{
			color: #ffffff;
		}
		
		.menu_bar a:hover
		{
			text-decoration: none;
		}
		
		.content_container {
			width: 100%;
			min-height: 500px;
			background-color: #eeecea;
			padding: 20px 20px 20px 20px;
		}
		
		.login_box {
			width: 400px;
			border: 0px solid #cccccc;
			margin: auto;
			color: #888888;
			line-height: 3em;
		}
		
		.update_status_box
		{
			width: 100%;
			min-height: 120px;
			background-color: #cccccc;
			padding: 20px 20px 20px 20px;
		}
		
		.update_status_box input
		{
			width: 100%;
			line-height: 2;
		}
		
		.photo_box {
			float: left;
			width: 30%;
			line-height: 3em;
			text-align: center;
		}
		
		.photo_box button
		{
			margin-top: 10px;
			background-color: #ffffff;
			color: #000000;
			text-shadow:none !important;
			border:none !important;
			padding: 8px 40px 8px 40px;
			box-shadow: 2px 2px 2px #999999;
		}
		
		.feed_box {
			width: 100%;
			line-height: 1.5em;
			margin-bottom: 20px;
			padding: 10px;
			box-shadow: 3px 3px 3px #999999;
		}
		
		.thumbnail_home {
		  position: relative;
		  width: 70px;
		  height: 70px;
		  overflow: hidden;
		  border-radius: 50%;
		   margin: auto;
		}
		.thumbnail_home img {
			margin: auto;
		  position: absolute;
		  left: 50%;
		  top: 50%;
		  height:150%;
		  width: auto;
		  -webkit-transform: translate(-50%,-50%);
		      -ms-transform: translate(-50%,-50%);
		          transform: translate(-50%,-50%);
		}
		.thumbnail_home img.portrait {
		  width: 100%;
		  height: auto;
		}
		
		.thumbnail {
		  position: relative;
		  width: 200px;
		  height: 200px;
		  overflow: hidden;
		  border-radius: 50%;
		   margin: auto;
		}
		.thumbnail img {
			margin: auto;
		  position: absolute;
		  left: 50%;
		  top: 50%;
/*		  height: 100%;*/
		  width: auto;
		  -webkit-transform: translate(-50%,-50%);
		      -ms-transform: translate(-50%,-50%);
		          transform: translate(-50%,-50%);
		}
		.thumbnail img.portrait {
		  width: 100%;
		  height: auto;
		}
		
		.photo_box input[type=submit]
		{
			background-color: #ffffff;
			color: #000000;
			text-shadow:none !important;
			border:none !important;
			padding: 8px 40px 8px 40px;
			box-shadow: 2px 2px 2px #999999;
		}
		
		.photo_box input[type=file]
		{
			margin: auto;
		}
		
		.profile_edit_box {
			width: 70%;
			margin-left: 30%;
			min-height: 300px;
			background-color: #cee0c9;
			padding: 15px;
			box-shadow: 4px 4px 4px #bbbbbb;
			line-height: 3em;
		}
		
		.profile_edit_box input
		{
			width:100%;	
			box-shadow: 2px 2px 2px #999999;
			color: #000000;
		}
		
		.profile_edit_box button
		{
			background-color: #349cab;
			color: #ffffff;
			text-shadow:none !important;
			border:none !important;
			padding: 8px 60px 8px 60px;
			box-shadow: 2px 2px 2px #999999;
			padding: 
		}
		
		.my_button {
			background-color: #349cab;
			color: #ffffff;
			text-shadow:none !important;
			border:none !important;
			box-shadow:none !important;
		}
		
		.valError {
			color: #fc7275;
			line-height: 100%;
			margin: 10px 0px 10px 0px;
		}
		
		
		button {
			line-height: normal;
			padding: 6px 20px 6px 20px;
		}
		
		input {
			border:1px solid #dddddd;
			line-height: normal;
			padding: 6px;
		}
		
		hr {
			/*color: #999999;
			border-width: 1.5px;*/
		}
		
		.separator {
			width: 100%;
			border-bottom: 2px solid #cccccc;
			margin: 10px 0px 10px 0px;
		}
		
        .fa-btn {
            margin-right: 6px;
        }
    </style>
    <title>Laravel</title>
</head>
<body>
	<div class="header">Twitter Application</div>
	@yield('menubar')
	
	@yield('content')
	
</body>