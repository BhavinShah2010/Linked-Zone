// JavaScript Document


function newvalidate2()
{
	var flag = false;
	var schoolname = document.eduForm.school_name;
	var streams  = document.eduForm.stream;
    var collegename= document.eduForm.college_name;
	
	var batchyear = document.getElementById('b_year');

	
	var error_place = document.getElementById ('error');	


	if (isNameCheck (schoolname))
		if (isNameCheck (streams))

		//		if (isNameCheck (collegename))
			
								if ( year_check (batchyear))

									if (reg_auth(schoolname.value , streams.value , collegename.value,batchyear.options[batchyear.selectedIndex].value ))
										return true;
									 else
									 	return false;//show_error ("This Id Has Already Registered");
										
									
								 else
								 	return show_error ("Please Select Batch Year");
								/*
									else
								 	return show_error ("Please enter college name 5 to 6 letter Properly");*/
							
		else
			return show_error ("Please Enter valid Stream");
	 
	else
		return show_error ("Please Enter School Name (Atleast 5-6 Letters) ");
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
		//var alphaExp = /^[ a-zA-Z ]+$/;	
		var alphaExp = /^[a-zA-Z ]+$/;	
		//alert(element.value.length);
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

function year_check (ele)
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
 
 
 function reg_auth (schoolname , streams , batchyear )
 {
		 	$.ajax({
			url: 'scripts_php/educationinfo.php',
			data:{school_name:schoolname ,
				  stream:streams , 
				college_name:collegename, 
				 batch_year:batchyear },
			type: "post",
			dataType:"html",
			error: function()
				{

				},
			success: function(text){
				if (text == 0)
					return false;
				else
					 window.location.replace ('securityinformation.php');
					//alert (text);
			}
			});

 }	

//emailid , firstname , lastname , rollno , password , gender , dob