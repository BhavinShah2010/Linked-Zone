// JavaScript Document


function newvalidate()
{
	var flag = false;
	var firstname = document.regForm.first_name;
	var lastname  = document.regForm.last_name;
	var emailid = document.regForm.user_id;
	var rollno = document.regForm.enrollment_no;
	var password = document.regForm.password;
	var cpassword = document.regForm.cPass;
	var gender= document.getElementById('gen');
	var dob= document.regForm.dob;
	var error_place = document.getElementById ('error');	


	if (isNameCheck (firstname))
		if (isNameCheck (lastname))
			if (isEmailCheck (emailid))
				if(isRollnumerCheck (rollno))
					 if(isPassCheck  (password))								
						if(iscPassCheck (cpassword))
							if (match_pass(password , cpassword))
								if ( gender_check (gender))
									if (isDobCheck (dob))
										if (reg_auth(firstname.value , lastname.value , emailid.value , rollno.value , password.value,gender.options[gender.selectedIndex].value , dob.value))
											return true;
										else
											return  show_error ("This Id Has Already Registered"); 
										/*	 else
									 	return show_error ("This Id Has Already Registered");*/
									 else
									 	return show_error ("Please Enter Birthdate");
								 else
								 	return show_error ("Please Select Gender")
							else
								return show_error ("Password Should Match");
						else
							return show_error ("Please Enter Confirm Password Properly");
					else
						return show_error ("Please Enter Password Properly");
				else
					return show_error ("Please Enter Roll Number Properly");
			else
				return show_error ("Please Enter Email Id Properly");	
		else
			return show_error ("Please Enter Last Name Properly");
		 
	else
		return show_error ("Please Enter First Name Properly");
	function show_error (msg)
 {
			error_place.style.visibility = "visible";
			error_place.innerHTML = msg;
		 	return false;
 }	 
	return true;
					
}


// function validate ()


 

function isNameCheck (element)
	 {
		var alphaExp = /^[a-zA-Z]+$/;	
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
			// if (element.value.match (dobExp))
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
 
 
 function reg_auth (firstname , lastname , emailid , rollno , password , gender , dob)
 {
		 	$.ajax({
			url: 'scripts_php/registration.php',
			data:{user_id:emailid , first_name:firstname , last_name:lastname , enrollment_no:rollno ,
					 password:password , gender:gender , dob:dob},
			type: "post",
			dataType:"html",
			error: function(ts)
				{
					//alert(ts.responseText);
				},
			success: function(text){
				if (text == 0)
					return false;
				else
					window.location.replace ('personalinformation.php');
					//alert (text);
			}
			});

 }	

//emailid , firstname , lastname , rollno , password , gender , dob