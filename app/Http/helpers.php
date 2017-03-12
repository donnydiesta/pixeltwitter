<?php

function getLoggedUser()
{
	if (!empty(session('logged_user')))
	{
		return session('logged_user');
	}
	else
	{
		return false;
	}
}
?>