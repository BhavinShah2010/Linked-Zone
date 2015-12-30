// JavaScript Document


function newvalidate3()
{
	var flag = false;
	var secque = document.getElementById('s_que');
	var seqqueans  = document.seqForm.seq_que_ans;
	var phoneno = document.seqForm.phone_no;
	
	
	var error_place = document.getElementById ('error');	


	if ( gender_check (secque))

	if (isNameCheck (seqqueans))
	
		if (isRollnumerCheck (phoneno))
										if (reg_auth (secque.options[secque.selectedIndex].value ,seqqueans.value , phoneno.value  ))
										return true;
									 else
									 	return false;//show_error ("This Id Has Already Registered");
										
								
								 else
								 	return show_error ("Please Enter Valid Mobile Number");
									
					
				else
			return show_error ("Please Enter Valid Answer");
		else
			return show_error ("Please Enter Sequrity Question ");
		 

function show_error (msg)
 {
			error_place.style.visibility = "visible";
			error_place.innerHTML = msg;
		 	return false;
 }	 
	return true;
					
}




function isNameCheck (element)
	 {
		var alphaExp = /^[a-zA-Z ]+$/;	
		if (isEmpty (element))			
			if (element.value.match (alphaExp))
				return true;
				
			else
				return false;
	 }
function isEmailCheck  (element)
	{
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(isEmpty (element))
		if(element.value.match(emailExp))
			return true;
	
		//elem.focus();
		return false;
	}	 

function isRollnumerCheck  (element)
{
	<!--var rolExp = /^[0-9a-zA-Z]+$/; -->
	        var rolExp = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
	if(isEmpty (element))
		if(element.value.match(rolExp))
			return true;
		
		return false;
}

function isPassCheck  (element)
{
	var pasExp = /^[0-9a-zA-Z]+$/;
	if(isEmpty (element))
		if(element.value.match(pasExp))
			return true;
		
		return false;
}

function iscPassCheck  (element)
{
	var cpasExp = /^[0-9a-zA-Z]+$/;
	
	if(isEmpty (element))
		if(element.value.match(cpasExp))
			return true;
		
		return false;
}

function isDobCheck (element)
		{	
		var dobExp = /^\d{1,2}\/\d{1,2}\/\d{4}$/; 
		if (isEmpty (element))			
			if (element.value.match (dobExp))
				return true;
			else
				element.focus ();
		return false;
	 }

function isEmpty(element){
	if(element.value.length <= 2){
		element.focus(); // set the focus to this input
		return false;
	}
	return true;
}	 

function gender_check (ele)
 {
	if (ele.selectedIndex != 0)
		return true;
	else
		ele.focus ();
		return false;
 }
function match_pass (pass , cpass)
 {
	if (pass.value == cpass.value)
		return true;
	else	
		pass.focus ();
		return false;	 
 }
 
 
 function reg_auth (secque , seqqueans , phoneno)
 {
		 	$.ajax({
			url: 'scripts_php/security_info.php',
			data:{sec_que:secque , seq_que_ans:seqqueans, 
					 phone_no:phoneno },
			type: "post",
			dataType:"html",
			error: function()
				{

				},
			success: function(text){
				if (text == 0)
					return false;
				else
					 window.location.replace ('imageupload1.php');
					//alert (text);
			}
			});

 }	

//emailid , firstname , lastname , rollno , password , gender , dob