$(document).ready(function(){
	$('#cat_key_form').submit(function(){
		var x;
		var r = confirm("Delete this?");
		var process_link = '';
		var redirect_link = '';
		if (r == true)
		{
			$.ajax({
	            type: 'POST',
	            url: BASE_URL + 'category/del_cat_key/',
	            data: $(this).serialize(),
	            success: function (msg) {
	              	location.href = BASE_URL + 'category/detail/' + msg + '';
	            }
	        });
	        
	        return false;
		}
	});

});

function ahai()
{
	alert(this.value);
	return false;
}

function del(id, typ)
{
	var x;
	var r = confirm("Delete this?");
	var process_link = '';
	var redirect_link = '';
	if (r == true)
	{
		if (typ == 'redis_key')
		{
			process_link = BASE_URL + 'key/delete_process/';
			redirect_link = BASE_URL + 'key/';
		}
		else if (typ == 'category')
		{
			process_link = BASE_URL + 'category/delete_process/';
			redirect_link = BASE_URL + 'category/';
		}
		else if (typ == 'telco')
		{
			process_link = BASE_URL + 'telco/delete_process/';
			redirect_link = BASE_URL + 'telco/';
		}
		else if (typ == 'admin_menu')
		{
			process_link = BASE_URL + 'admin/delete_menu_process/';
			redirect_link = BASE_URL + 'admin/menu/';
		}
		else if (typ == 'admin')
		{
			process_link = BASE_URL + 'admin/delete_process/';
			redirect_link = BASE_URL + 'admin/';
		}
		else if (typ == 'apk')
		{
			process_link = BASE_URL + 'apk/delete_process/';
			redirect_link = BASE_URL + 'apk/';
		}
		
	  	var idat = "id=" + id;
		$.ajax({
			type: "POST",
			url: process_link,
			data: idat,
			dataType: "json",
			success: function(msg)
			{
				window.location = redirect_link;
			}
		});
	}
}

function del_shortcode(shortcode_id, telco_id)
{
	var x;
	var r = confirm("Delete this shortcode?");
	var process_link = '';
	var redirect_link = '';
	if (r == true)
	{
		process_link = BASE_URL + 'telco/delete_shortcode_process/';
		redirect_link = BASE_URL + 'telco/shortcode/' + telco_id;
		
		var idat = "shortcode_id=" + shortcode_id;
		$.ajax({
			type: "POST",
			url: process_link,
			data: idat,
			dataType: "json",
			success: function(msg)
			{
				window.location = redirect_link;
			}
		});
	}
}

function del_wap(wap_id, telco_id)
{
	var x;
	var r = confirm("Delete this link?");
	var process_link = '';
	var redirect_link = '';
	if (r == true)
	{
		process_link = BASE_URL + 'wap/delete_process/';
		redirect_link = BASE_URL + 'wap/' + telco_id;
		
		var idat = "wap_id=" + wap_id;
		$.ajax({
			type: "POST",
			url: process_link,
			data: idat,
			dataType: "json",
			success: function(msg)
			{
				window.location = redirect_link;
			}
		});
	}
}

function del_shortcode_type(type_id, telco_id, section)
{
	var x;
	var r = confirm("Delete this type?");
	var process_link = '';
	var redirect_link = '';
	if (r == true)
	{
		process_link = BASE_URL + 'telco/delete_sc_type_process/';
		redirect_link = BASE_URL + 'telco/shortcode/' + telco_id + '#' + section;
		
		var idat = "type_id=" + type_id;
		$.ajax({
			type: "POST",
			url: process_link,
			data: idat,
			dataType: "json",
			success: function(msg)
			{
				window.location.reload();
			}
		});
	}
}

function del_shortcode_message(message_id, telco_id, section)
{
	var x;
	var r = confirm("Delete this keyword?");
	var process_link = '';
	var redirect_link = '';
	if (r == true)
	{
		process_link = BASE_URL + 'telco/delete_sc_message_process/';
		redirect_link = BASE_URL + 'telco/shortcode/' + telco_id + '#' + section;
		
		var idat = "message_id=" + message_id;
		$.ajax({
			type: "POST",
			url: process_link,
			data: idat,
			dataType: "json",
			success: function(msg)
			{
				window.location.reload();
			}
		});
	}
}

function open_app_redis(telco_id)
{
	var idat = "app_id=" + telco_id;
	var process_link = BASE_URL + 'redis_generator/app_redis_dialog_content/';
	$.ajax({
		type: "GET",
		url: process_link,
		data: idat,
		dataType: "json",
		success: function(msg)
		{
			$('#app_redis_dialog').html(msg.body);
			$("#app_redis_dialog").dialog({position: ['center',200]}, { title: msg.title }, { minWidth: 400 });
		}
	});
}

function open_icon_preview(icon_url)
{
	$('#app_redis_dialog').html('<img src="' + icon_url + '"/>');
	$("#app_redis_dialog").dialog({position: ['center',200]}, { title: '' }, { minWidth: 400 });
}

