// JavaScript Document

function validText(x)
{
	if(!isNameCheck(x))
	{
		x.style.border = "1px #FF0000 solid";
	}
	else{
		x.style.border = "1px #00FF00 solid";
	}
}


function valid1Text(x)
{
	if(!isPassCheck (x))
	{
		x.style.border = "1px #FF0000 solid";
	}
	else{
		x.style.border = "1px #00FF00 solid";
	}
}



function valid2Text(x)
{
	if(!iscPassCheck (x))
	{
	//	x.style.border = "1px #00FF00 solid";
			x.style.border = "1px #FF0000 solid"
	}
	else{
		x.style.border = "1px #00FF00 solid"
	//	x.style.border = "1px #FF0000 solid";
		
		
	}
} 





function valid3Text(x)
{
	if(!isEmailCheck (x))
	{
		x.style.border = "1px #FF0000 solid";
	}
	else{
		x.style.border = "1px #00FF00 solid";
	}
}

function valid4Text(x)
{
	if(!isRollnumerCheck (x))
	{
		x.style.border = "1px #FF0000 solid";
	}
	else{
		x.style.border = "1px #00FF00 solid";
	}
}

function valid5Text(x)
{
	if(!isGenderCheck (x))
	{
		x.style.border = "1px #FF0000 solid";
	}
	else{
		x.style.border = "1px #00FF00 solid";
	}
}

function valid6Text(x)
{
	if(!isDobCheck (x))
	{
		x.style.border = "1px #FF0000 solid";
	}
	else{
		x.style.border = "1px #00FF00 solid";
	}
}


function valid7Text(x)
{
	if(!isNameCheck(x))
	{
		x.style.border = "1px #FF0000 solid";
	}
	else{
		x.style.border = "1px #00FF00 solid";
	}
}

function newvalidate()
{
	var flag = false;
	var firstname = document.regForm.first_name;
	var lastname  = document.regForm.last_name;
	var emailid = document.regForm.user_id;
	var rollno = document.regForm.enrollment_no;
	var password = document.regForm.password;
	var cpassword = document.regForm.cPass;
	var gender= document.regForm.gender;
	var dob= document.regForm.dob;
	var error_place = document.getElementById ('error');	
	//alert (firstname.value);
	if (isNameCheck (firstname))
		
											
		 if(isPassCheck  (password))
		 			if(iscPassCheck (cpassword))
							if (isEmailCheck (emailid))
		 		
		 						if(isRollnumerCheck (rollno))
		 						
						// 			if(isGenderCheck (gender))
						
									if(ismadeSelection(gender))
									
									 if(isDobCheck (dob))
									
									 if (isNameCheck (lastname))
									// 	 if(!ispCheck(password,cpassword))
									 	flag = true;
									
								 	
											
											
	if (flag == false)
	 {
			error_place.style.visibility = "visible";
			error_place.innerHTML = "PLEASE FILL MARK THE FIELD PROPERLY ";
			return false;			
	 }

	if(!ispCheck(password,cpassword))
	{
			error_place.style.visibility = "visible";
			error_place.innerHTML = "PASSWORD & CONFIRM PASSWORD MUST BE MATCHED ";
		return false;
		
	}
	
	
	return true;
					
}
	

/*
function formValidator()
{
	// Make quick references to our fields
	var firstname = document.regForm.fName;
if(isEmpty(firstname, "Please enter"))
 { 
/*if(isAlphabet(firstname, "Please enter only letters for your name"))
{
if(lengthRestriction(firstname, 6, 8))
{
return true;
    }
   }
 
 
 
 
 if (!isNameCheck (firstname))
	flag = false;
	if (flag == false)
	 {
			error_place.style.visibility = "visible";
			error_place.innerHTML = "PLEASE THE FIELD";
			return true;			
	 }
	 
 }
}



/*
	if(isEmpty(element))
	{
	if (!isNameCheck (firstname))
	flag = false;
	if (flag == false)
	 {
			error_place.style.visibility = "visible";
			error_place.innerHTML = "PLEASE THE FIELD";
			return true;			
	 }
	 
	}
*/
	
	
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



function isGenderCheck (element)
	 {
		var genExp = /^[a-zA-Z]+$/;	
		if (isEmpty (element))			
			if (element.value.match (genExp))
				return true;
		return false;
	 }




function isDobCheck (element)
		{	
		var dobExp = /^\d{1,2}\/\d{1,2}\/\d{4}$/; 
if (isEmpty (element))			
			if (element.value.match (dobExp))
				return true;
		return false;
	 }



function isEmpty(element){
	if(element.value.length <= 2){
		element.focus(); // set the focus to this input
		return false;
	}
	return true;
}	 

function ispCheck (pass,cPass)
		{	
			if (pass.value == cPass.value )
			{
				cPass.style.border = "1px #00FF00 solid";
				return true;
				
			}
			else
			{
		        cPass.style.border = "1px #FF0000 solid";
				return false;
			}
	 }
	 
	 

 /*TEMPORARY FOR CHANGE COLOR

function isp1Check (pass,cPass)
		{	
			if (pass.value == cPass.value )
			{
				cPass.style.border = "1px #FF0000 solid";
				
				
				return true;
				
			}
			else
			{
		        cPass.style.border = "1px #00FF00 solid";
				return false;
			}
	 }

*/


function ismadeSelection(element)
{
	if(element.value == "Please Choose")
	{
		
		elem.focus();
		return false;
	}
	else
	{
		return true;
	}
}


/*		
	 	if (element.value < 2 )	 
			if (element.value.match (alphaExp))
			return false;	 
		else
			return true;
	 }
	 /*
function formValidator(){
	// Make quick references to our fields
	alert ("harsh");
/*
	alert (firstname.value);
//	
//	alert (error_place.innerHTML);
	/*	if (!isAlphabet (firstname))
		 {
			 error_place.innerHTML = "ENTER FIRST NAME PROPER";
		 }*/


/*function isAlphabet(elem)
{
//	

/*	
	}else{
	//	alert(helperMsg);
		elem.focus();
		return false;
	}*/

/*function isAlphanumeric(elem, helperMsg)
{
	var alphaExp = /^[0-9a-zA-Z]+$/;
	alert (elem.value);
/*	if(elem.value.match(alphaExp))
	 {
		return true;
	 }
	else
	 {
		elem.focus();
		return false;
	}*/
		 
	/*document.getElementById('firstname');
	var lastname = document.getElementById('lastname');
	var password = document.getElementById('password');
	var cpassword = document.getElementById('cpassword');
	var gender = document.getElementById('gender');
	var username = document.getElementById('username');
	var email = document.getElementById('email');*/
	
	// Check each input in the order that it appears in the form!
/*	if(isAlphabet(firstname, " enter for First name")){
		if(isAlphanumeric(lastname, "Please enter only Letters for Last Name")){
			if(isAlphanumeric(password, "Please fill Password")){
				if(isAlphanumeric(cpassword, "Please match your Password")){
				if(madeSelection(gender, "Please Choose a Gender")){
					if(lengthRestriction(username, 6, 8)){
						if(emailValidator(email, "Please enter a valid email address")){
							return true;
						}
					}
				}
			}
		}
	}
	}
	
	return false;*/

/*


function isNumeric(elem, helperMsg){
	var numericExpression = /^[0-9]+$/;
	if(elem.value.match(numericExpression)){
		return true;
	}else{
		//alert(helperMsg);
		elem.focus();
		return false;
	}
}





function lengthRestriction(elem, min, max){
	var uInput = elem.value;
	if(uInput.length >= min && uInput.length <= max){
		return true;
	}else{
	//	alert("Please enter between " +min+ " and " +max+ " characters");
	
		elem.focus();
		return false;
	}
}

function madeSelection(elem, helperMsg){
	if(elem.value == "Please Choose"){
		//alert(helperMsg);
		elem.focus();
		return false;
	}else{
		return true;
	}
}

function emailValidator(elem, helperMsg){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(elem.value.match(emailExp)){
		return true;
	}else{
		// alert(helperMsg);
		elem.focus();
		return false;
	}
}*/