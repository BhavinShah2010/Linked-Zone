// JavaScript Document
on_off_flag;

/*------------------------------ WILL FETCH ONLINE USERS WHO ARE LOGGED USER'S FRIENDS -------------------------------------*/

function get_friends ()
{
	$.ajax({
			url: 'scripts_php/on_off_status.php',
			type: "post",
			dataType:"html",
			error: function(){
//				alert( "<p>Page Not Found!!</p>" );
						},
						
						
						
			success: function( strData )
				{

					$('#online_users').html(strData);
				},

			timeout : 60000
				
			});

}

/*------------------------------ WILL SET UPDATED ONLINE STATUS OF USER -------------------------------------*/

function set_on_off(flag)
{
	$.ajax({
			url: 'scripts_php/set_on_off.php',
			data:	{on_off_flag:flag},
			type: "post",
			dataType:"html",
			error: function(){
				alert( "<p>Page Not Found!!</p>" );
						},
						
						
	});
}

/*------------------------------ CHECK ONLINE STATUS WHEN USER LOGEED IN -------------------------------------*/

function check_online_status ()
 {

	 if (on_off_flag == '1')
	  {
		document.getElementById('on_off_btn').style.backgroundColor = '#82ba00';
		document.getElementById('on_off_text').style.color = '#82ba00';	//93ab08
		get_friends ();								
	
	  }
	 else
	  {
		document.getElementById('on_off_btn').style.backgroundColor = '#e5e5e5';
		document.getElementById('on_off_text').style.color = '#e5e5e5';	
		$('#online_users').html ('');	
		
	  }

}

/*------------------------------ WILL SET ONLINE STATUS OF USER-------------------------------------*/


function set_online_status ()
 {

	 if (on_off_flag)
	 {
		document.getElementById('on_off_btn').style.backgroundColor = '#e5e5e5';
		document.getElementById('on_off_text').style.color = '#e5e5e5';		
		on_off_flag = 0;
		$('#online_users').html ('');
		set_on_off (on_off_flag);
	 }
	else
	 {
		document.getElementById('on_off_btn').style.backgroundColor = '#82ba00';
		document.getElementById('on_off_text').style.color = '#82ba00';		
		on_off_flag = 1;
		set_on_off (on_off_flag);		
		get_friends ();
	 }

}
