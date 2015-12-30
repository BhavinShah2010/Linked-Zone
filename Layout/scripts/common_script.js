/*=======================For The Change Of User First Name And Last Name===========================*/

$(document).ready(function(e) {
	
	$('.onoffswitch-inactive').click(function(e) {
        $('#fname').attr('disabled' , true);
		$('#lname').attr('disabled' , true);
		
		$('#save_name').attr('disabled' , true);
		$('#cancel_name').attr('disabled' , true);
		
		$('#save_name').css('background' , '#ccc');
		$('#cancel_name').css('background' , '#ccc');
		$('.on_off_btn_box').css('box-shadow','0px 0px 7px #999797');
    });
	
    $('.onoffswitch-active').click(function(e) {
        $('#fname').attr('disabled' , false);
		$('#lname').attr('disabled' , false);
		
		$('#save_name').attr('disabled' , false);
		$('#cancel_name').attr('disabled' , false);
		
		$('#save_name').css('background' , '#82ab00');
		$('#cancel_name').css('background' , '#82ab00');
		$('.on_off_btn_box').css('box-shadow','0px 0px 7px #82ab00');
		 $('#fname').focus();
    });
	

	
});

$(document).ready(function(e) {
    $('.onoffswitch-inactive_email').click(function(e) {
       $('#email').attr('disabled' , true);
	   $('.on_off_btn_email').css('box-shadow','0px 0px 7px #999797');
    });
	
	$('.onoffswitch-active_email').click(function(e) {
       $('#email').attr('disabled' , false);
	   $('.on_off_btn_email').css('box-shadow','0px 0px 7px #82ab00');
	   $('#email').focus();
    });
	
	/*$('select').change(function() {
    $('option').css('background', 'none');
    $('option:selected').css('backgroundColor', 'red');
}).change();*/
});




/*===============For The Change Of User Privacy Status=============================*/



$(document).ready(function(e) {
    $('.onoffswitch-inactive_ena_dis').click(function(e) {
		
		$('#privacy_ena_dis_det').text("Your profile is currently hidden");
		 $('.on_off_privacy_btn_box').attr("disabled" , true);
		 $('#myonoffswitch_privacy').attr("disabled" , "disabled");
		 $('#privacy_edit_box').css('opacity' , 0.3);
		 
		$('#select_opt').attr("disabled" , "disabled");
		 $('.on_off_ena_dis_btn_profile_box').css('box-shadow','0px 0px 7px #999797');
    });
	
	$('.onoffswitch-active_ena_dis').click(function(e) {
		
	  $('#privacy_ena_dis_det').text("Your profile is currently visible");
	  $('#privacy_edit_box').attr("disabled" , false);
	   $('#myonoffswitch_privacy').removeAttr("disabled");
	    $('#privacy_edit_box').css('opacity' , 1);
		 
		 $('#select_opt').removeAttr("disabled");
		$('.on_off_ena_dis_btn_profile_box').css('box-shadow','0px 0px 7px #82ab00');
	   
    });
	
	
	$('#cancel_name').click(function(e) {
        window.history.back();
    });
	
	
	
	
});
    
	
	
	
	

	
		
    




/*For edit user name */


$(document).ready(function(e) {
    $("#save_name").click(function(e) {
        if($("#fname").val()!=""&& $("lname").val()!="")
       {
			fname = $("#fname").val();
			lname = $("#lname").val();
		
			$.ajax({
				url:'scripts_php/update_profile.php',
				data:{'fname':fname,'lname':lname },
				type:"POST",
				success:function(res)
				{
					if(res=="success")
					$(".fname").text(fname);
					$(".lname").text(lname);
					$('#owner_name').html(fname + " " + lname);
					
					$('#fname').attr('disabled' , true);
					$('#lname').attr('disabled' , true);
				
					$('#save_name').attr('disabled' , true);
					$('#cancel_name').attr('disabled' , true);
					
					$('#save_name').css('background' , '#ccc');
					$('#cancel_name').css('background' , '#ccc');
					//$('.onoffswitch').attr('disabled' , true);
					//$('.onoffswitch-inactive').attr('disabled' , true);
					
					
				}
			});

       } // if close
    });
	
	
	
	
});







function on_select(val)
{	
	//alert (val);
	$.ajax({
		url:"scripts_php/profile_privacy.php",
		data:{value:val},
		type:"POST",
		success: function(res)
		{
			//alert (res);
		$('#privacy_edit_box').css('opacity' , 0.3);
		$('#select_opt').attr("disabled" , "disabled");
		 $('#onoffswitch-switch_ena_dis').reload();
		}
	});
}

// JavaScript Document




/*==============================Enable Disable Text Box Of Personal Information=============================*/


	

function per_info_enable ()
 {
			//alert ('en');
			
		$('#skill').attr('disabled' , true);
		$('#hobby').attr('disabled' , true);
		$('#nationality').attr('disabled' , true);
		$('#interest').attr('disabled' , true);
		$('#dob').attr('disabled' , true);
		$('#sel_gen').attr('disabled' , true);
		$('#sel_rel').attr('disabled' , true);
			
			
		$('#per_save_btn').attr('disabled' , true);
		$('#per_save_btn').css('background' , '#ccc');
			
		$('#cancel_per_info').attr('disabled' , true);
		$('#cancel_per_info').css('background' , '#ccc');
				$('.on_off_per_info_btn_box').css('box-shadow','0px 0px 7px #999797');
		


    }
	
	
	
	function per_info_disable ()
	
	 {
	
	
		
			$('#skill').attr('disabled' , false);
			$('#hobby').attr('disabled' , false);
			$('#nationality').attr('disabled' , false);
			$('#interest').attr('disabled' , false);
			$('#dob').attr('disabled' , false);
			$('#sel_gen').attr('disabled' , false);
			$('#sel_rel').attr('disabled' , false);		 
		 
		 
		 
		
		
		
		$('#per_save_btn').removeAttr("disabled");
			$('#per_save_btn').css('background' , '#82ab00');
			
			$('#cancel_per_info').removeAttr("disabled");
			$('#cancel_per_info').css('background' , '#82ab00');
		
			$('.on_off_per_info_btn_box').css('box-shadow','0px 0px 7px #82ab00');
		
		 }
		 
		 
		 


/*==============================Enable Disable Text Box Of Educational Information=============================*/
		 
		 
		 
		 
		 
		 function edu_info_enable ()
 {
	 
	 
	 
	 
	 
		$('#roll_no').attr('disabled' , true);
		$('#school').attr('disabled' , true);
		$('#college').attr('disabled' , true);
		$('#clg_year').attr('disabled' , true);
		$('#stream').attr('disabled' , true);		
		
		
		
		
		$('#edu_save_btn').attr('disabled' , true);
		$('#edu_save_btn').css('background' , '#ccc');
			
		$('#cancel_edu_info').attr('disabled' , true);
		$('#cancel_edu_info').css('background' , '#ccc');
		$('.on_off_edu_info_btn_box').css('box-shadow','0px 0px 7px #999797');
			
			
			

    }
	
	
	
	function edu_info_disable ()
	 {
		 $('#roll_no').attr('disabled' , false);
		 $('#school').attr('disabled' , false);
		$('#college').attr('disabled' , false);
		$('#clg_year').attr('disabled' , false);
		$('#stream').attr('disabled' , false);
		
		
		
		
		
		$('#edu_save_btn').removeAttr("disabled");
			$('#edu_save_btn').css('background' , '#82ab00');
			
			$('#cancel_edu_info').removeAttr("disabled");
			$('#cancel_edu_info').css('background' , '#82ab00');
		
		

		$('.on_off_edu_info_btn_box').css('box-shadow','0px 0px 7px #82ab00');
		
		
		
		 }
		 
		 
		 
		 
		 
		 
		 /*==============================Enable Disable Text Box Of Contact Information=============================*/
		 
		 
		 
		 
		 
		 function cont_info_enable ()
 {
			//alert ('en');
			$('#contact').attr('disabled' , true);
			
			
			$('#save_cont_info').attr('disabled' , true);
		$('#save_cont_info').css('background' , '#ccc');
			
		$('#cancel_cont_info').attr('disabled' , true);
		$('#cancel_cont_info').css('background' , '#ccc');
		
		$('.on_off_cont_info_btn_box').css('box-shadow','0px 0px 7px #999797');			

    }
	
	
	
	function cont_info_disable ()
	 {
		 $('#contact').attr('disabled' , false);
		
		
		
		$('#save_cont_info').removeAttr("disabled");
			$('#save_cont_info').css('background' , '#82ab00');
			
			$('#cancel_cont_info').removeAttr("disabled");
			$('#cancel_cont_info').css('background' , '#82ab00');
		
		

		$('.on_off_cont_info_btn_box').css('box-shadow','0px 0px 7px #82ab00');
		
		 }
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
/*AJAX Validation For Perosonal Information */








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


	var skill ;
	var hobby;
	var nationality;
	var dob;

	var marital_status;
	function get_per_gender (ele)
	 {
		 gen_val = ele.value;
		 //alert (gen_val);
	 }
	function get_per_rel(ele)	 
	 {
		 rel_val = ele.value;
	 }


	function per_info_validate()
	{
//		alert("asasf");
//		return;
		skill = document.per_info.skill;
		hobby = document.per_info.hobby;
		nationality = document.per_info.nationality;
		dob  = document.per_info.dob
		
	//	marital_status = document.per_info.marital;
		per_info_err_ele = $('#per_info_err_det');
//		
		if(!isEmpty(skill.value))
		{
			if(!isEmpty(hobby.value))
			{
				
				if(!isEmpty(nationality.value))
				{
					if(!isEmpty(interest.value))
					{
						if(!isEmpty(dob.value))
						{
							if(gen_val != -1)
							{
								if(rel_val != -1)
								{
									update_per_info();
									$('#skill').attr('disabled' , true);
									$('#hobby').attr('disabled' , true);
									$('#nationality').attr('disabled' , true);
									$('#interest').attr('disabled' , true);
									$('#dob').attr('disabled' , true);
									$('#sel_gen').attr('disabled' , true);
									$('#sel_rel').attr('disabled' , true);
			
									$('#per_save_btn').attr('disabled' , true);
						     		$('#per_save_btn').css('background' , '#ccc');
			
									$('#cancel_per_info').attr('disabled' , true);
									$('#cancel_per_info').css('background' , '#ccc');
									$('.on_off_per_info_btn_box').css('box-shadow','0px 0px 7px #999797');
									//$('#personal_info_bx').removeClass('per_on_off');
									//$('#personal_info_bx').addClass('per_on_off');
									per_info_err_ele.fadeOut(1000);
									//alert("Thai Gayu...");
								}
								
								else
								{
									per_info_err_ele.html("Please Select Marital Status First").fadeIn(500)	;
									marital_status.focus();
								}
							}
							else
							{
								per_info_err_ele.html("Please Select Gender First").fadeIn(500)	;
								gender.focus();
							}
						}
						else
						{
							per_info_err_ele.html("Please Fill Date of Birth First").fadeIn(500)	;
							dob.focus();
						}
					}
					else
					{
						per_info_err_ele.html("Please Fill Interest First").fadeIn(500)	;
						interest.focus();
						
					}
				}
				else
				{
					per_info_err_ele.html("Please Fill Nationality First").fadeIn(500)	;
					nationality.focus();
					
				}
			}
			else
			{
				per_info_err_ele.html("Please Fill Hobby First").fadeIn(500)	;
				hobby.focus();
			}
		}
		else
		 {
			per_info_err_ele.html("Please Fill Skills First").fadeIn(500);
			skill.focus();
			 
		 }
		 
	}
	
	
	
	
	/*===================Validation For Educational Information ===============*/			  
	
	
	
	
	
	var roll_no ;
	var school;
	var college;
	var stream;
	var clg_year;
	
	function edu_info_validate()
	{
		
		roll_no = document.edu_info.roll_no;
		school = document.edu_info.school;
		college = document.edu_info.college;
		stream  = document.edu_info.stream;
		clg_year = document.edu_info.clg_year;
		edu_info_err_ele = $('#edu_info_err_det');
			
		if(!isEmpty(roll_no.value))
		{
			if(!isNaN(roll_no.value))
			{
			if(!isEmpty(school.value))
			{
				
				if(!isEmpty(college.value))
				{
					if(!isEmpty(stream.value))
					{
						
						if(!isEmpty(clg_year.value))
						{
							if(!isNaN(clg_year.value))
							{
							update_edu_info();
							
							$('#roll_no').attr('disabled' , true);
							$('#school').attr('disabled' , true);
							$('#college').attr('disabled' , true);
							$('#clg_year').attr('disabled' , true);
							$('#stream').attr('disabled' , true);		
																			
							$('#edu_save_btn').attr('disabled' , true);
							$('#edu_save_btn').css('background' , '#ccc');
			
							$('#cancel_edu_info').attr('disabled' , true);
							$('#cancel_edu_info').css('background' , '#ccc');
							$('.on_off_edu_info_btn_box').css('box-shadow','0px 0px 7px #999797');
							edu_info_err_ele.fadeOut(1000);
						}
						else
						{
							edu_info_err_ele.html("Please Enter Only Numeric Value").fadeIn(500)	;
						}
						}
						else
						{
							edu_info_err_ele.html("Please Fill College Year First").fadeIn(500)	;
							clg_year.focus();
						}
					}
					else
					{
						edu_info_err_ele.html("Please Fill Stream First").fadeIn(500)	;
						stream.focus();
					}
				}
				else
				{
					edu_info_err_ele.html("Please Fill College Name First").fadeIn(500)	;
					college.focus();
					
				}
			}
			else
			{
				edu_info_err_ele.html("Please Fill School Name First").fadeIn(500)	;
				school.focus();
			}
		}
			else
			{
				edu_info_err_ele.html("Please Enter Only Numeric Value").fadeIn(500)	;
				roll_no.focus();
			}
		}
		else
		 {
			edu_info_err_ele.html("Please Fill Roll Number First").fadeIn(500);
			roll_no.focus();
			 
		 }
		
		
	}
	
	
	
	/*================= Validation For Contact Information ===============*/		
	
	var contact;
	
	function cont_info_validate()
	{
		contact = document.contact_info.contact;
		cont_info_err_ele = $('#cont_info_err_det');
		
		if(!isEmpty(contact.value))
		{
			
			if(!isNaN(contact.value))
			{
				$('#contact').attr('disabled' , true);
				update_cont_info();
				$('#save_cont_info').attr('disabled' , true);
				$('#save_cont_info').css('background' , '#ccc');
			
				$('#cancel_cont_info').attr('disabled' , true);
				$('#cancel_cont_info').css('background' , '#ccc');
		
				$('.on_off_cont_info_btn_box').css('box-shadow','0px 0px 7px #999797');
				cont_info_err_ele.fadeOut(1000);	
				
				//$('.onoffswitch-inner_cont_info').load("aboutme1.php .onoffswitch-inner_cont_info");
			}
			else
			{
				cont_info_err_ele.html("Please Enter Only Numbers").fadeIn(500);
			}
		}
		else
		{
			cont_info_err_ele.html("Please Enter Contact Information").fadeIn(500);
		}
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

	

	
	
	
	
	
	
	
	
	/*=========================Update Personal Information================================*/
	
	
	    /*skill_val = document.per_info.skill.value;
		hobby_val = document.per_info.hobby.value;
		nationality_val = document.per_info.nationality.value;
		dob_val  = document.per_info.dob.value;
		gender_val = document.per_info.gender.value;
		marital_status_val = document.per_info.marital.value;*/
		

		function update_per_info()
		{

//			alert ('h');

			$.ajax({
				url:"scripts_php/update_per_info.php",
				data:{
					skill:document.per_info.skill.value,
					hobby:document.per_info.hobby.value,
					nationality:document.per_info.nationality.value,
					interest:document.per_info.interest.value,
					dob:document.per_info.dob.value,
					gender:gen_val, 
					marital_status:rel_val,
				    },
					type:"post",
					dataType:"html",
					error: function()
					{
						//alert("Kaik Dakha Thaya");
					},
					success:function(res)
					{
						//alert("Thai Gyu Update..." +res); 
					}
					
					
			});
		}
		
		
		
		
		
		
		
/*=======================Update Educational Information==================*/




function update_edu_info()
{
		$.ajax({
				url:"scripts_php/update_edu_info.php",
				data:{
					roll_no:document.edu_info.roll_no.value,
					school_name:document.edu_info.school.value,
					clg_name:document.edu_info.college.value,
					stream:document.edu_info.stream.value,
					clg_year:document.edu_info.clg_year.value,
				    },
					type:"post",
					dataType:"html",
					error: function()
					{
						//alert("Kaik Dakha Thaya");
					},
					success:function(res)
					{
						//alert("Thai Gyu Update..." +res); 
					}
					
					
			});
}



/*====================Update Contact Information============*/


function update_cont_info()
{
	$.ajax({
				url:"scripts_php/update_cont_info.php",
				data:{
						contact:document.contact_info.contact.value,
				    },
					type:"post",
					dataType:"html",
					error: function()
					{
						//alert("Kaik Dakha Thaya");
					},
					success:function(res)
					{
						//alert("Thai Gyu Update..." +res); 
					}
					
					
			});
	
}


