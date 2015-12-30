// JavaScript Document


function validate_mail (i)
 {
	 	//var filter = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		var filter = /^[a-zA-Z0-9._-]/;
		if (!filter.test(i))
			 {
				 return false;
			 }
		else
			return true;
 }	

function isEmpty (str)
 {
	 String.prototype.trim = function() 
		{
			 return this.replace(/^\s+|\s+$/g,"");
		} 
	 if (str.trim () == '')
	 {
		return true;
	 }
	else
		return false;

 }	



function validate_all ()
 {
	 id = frm.admin_name;
	 pass = frm.admin_pass;
	 err_ele = $('#error');	
	 err_ele.hide();
	 
	 if (!isEmpty(id.value))
	  {
		  if (validate_mail (id.value))
	  	 	 {
				 if (!isEmpty(pass.value))
				  {
					 login_auth(id.value , pass.value);
					  
				  }
				 else
				  {
					 err_ele.html('Fill Password').fadeIn(500);
					 pass.focus();
					 return false;
				  }
			 }
		  else
		  	 {
					 err_ele.html('Fill Valid Email Id').fadeIn(500);
					 id.focus();
	 		 		 return false;
			 }
	  }
	 else
	  {
 
		 err_ele.html('Fill Email Id First').fadeIn(500);
		 id.focus();		 
		return false;
	  }
 }

function login_auth (id , pass)
 {
		 err_ele = $('#error');
		 err_ele.hide();

		 	$.ajax({
			url: 'scripts_php/admin_login_authorized.php',
			data:{admin_name:id , admin_pass : pass},
			type: "post",
			dataType:"html",
			error: function()
				{
					err_ele.html('<p>Page Not Found!!</p>').fadeIn(500);
				},
			success: function(text){
				if (text == '1')
					{
					 	err_ele.html('You Are Not Valid User').fadeIn(500);
						frm.admin_name.focus();
					 }
				else
					{
						err_ele.hide();
						window.location.replace('index.php');
					}

				}
			});

 }	