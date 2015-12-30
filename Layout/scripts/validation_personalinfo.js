// JavaScript Document


function newvalidate2()
{
	var flag = false;
	var nationaliti = document.regForm.nationality;
	var hobbie  = document.regForm.hobbies;
	var Relationship= document.getElementById('r_status');

	var skills = document.regForm.skill;
	var interests = document.regForm.interest;

	var error_place = document.getElementById ('error');	


	if (isNameCheck (nationaliti))
		if (isNameCheck (hobbie))

								if ( gender_check (Relationship))
									if (isNameCheck (skills))
										if (isNameCheck (interests))
									if (reg_auth(nationaliti.value , hobbie.value , emailid.value ,  Relationship.options[Relationship.selectedIndex].value , skills.value , interests.value))
										return true;
									 else
									 	return false;//show_error ("This Id Has Already Registered");
										
										 else
								 	return show_error ("Please Enter Valid Interest")
										
										 else
								 	return show_error ("Please Enter Valid Skill")
								 else
								 	return show_error ("Please Select Relationship Status")
							
		else
			return show_error ("Please Enter Valid Hobby ");
		 
	else
		return show_error ("Please Enter Valid Nationality");
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
	var rolExp = /^[0-9a-zA-Z]+$/;
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
 
 
 function reg_auth (nationaliti , hobbie , Relationship , skills , interests )
 {
		 	$.ajax({
			url: 'scripts_php/personalinformation.php',
			data:{nationality:nationaliti , hobbies:hobbie , skill:skills , interest:interests,
					 rel_status:Relationship },
			type: "post",
			dataType:"html",
			error: function()
				{

				},
			success: function(text){
				if (text == 0)
					return false;
				else
					 window.location.replace ('educationinformation.php');
					//alert (text);
			}
			});

 }	

//emailid , firstname , lastname , rollno , password , gender , dob