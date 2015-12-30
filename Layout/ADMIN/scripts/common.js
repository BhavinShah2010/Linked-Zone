//var flag = 1;
//var flag1=1;



$(document).ready(function(e) {
	
/*================================================  Up Down Slider   ================================================*/
   
   
   
	   /*==========================================For The DashBoard Slider ===================================*/
   
  		/*$('#dash_icon').click(function(e) {
     	    	$(".dashboard_dropdown_box").slideToggle('slow');
				$(".manage_user_dropdown_box ").hide('slow');
				$(".manage_report_dropdown_box").hide('slow');
				
   		 });
	
   
   	    $('#dash_text').click(function(e) {
     	    	$(".dashboard_dropdown_box").slideToggle('slow');
				$(".manage_user_dropdown_box ").hide('slow');
				$(".manage_report_dropdown_box").hide('slow');
				
  	  	});*/
	
	
	
		$('#dash_arrow_box').click(function(e) {
       			$(".dashboard_dropdown_box").slideToggle('slow');
				$(".manage_user_dropdown_box ").hide('slow');
				$(".manage_report_dropdown_box").hide('slow');
				$(".post_dropdown_box").hide('slow');
    	});
		
		
		
		
		
		
		
		/*==========================================For The Manage Report Slider ===================================*/
		
		
		
		/*$('#manage_report_icon').click(function(e) {
        		$(".dashboard_dropdown_box").hide('slow');
				$(".manage_report_dropdown_box").slideToggle('slow');
				$(".manage_user_dropdown_box ").hide('slow');
				
    	});
		
		
		$('#manage_report_text').click(function(e) {
        		$(".dashboard_dropdown_box").hide('slow');
				$(".manage_report_dropdown_box").slideToggle('slow');
				$(".manage_user_dropdown_box ").hide('slow');
    	});*/
		
		$('#manage_report_arrow_box').click(function(e) {
        		$(".dashboard_dropdown_box").hide('slow');
				$(".manage_report_dropdown_box").slideToggle('slow');
				$(".manage_user_dropdown_box ").hide('slow');
				$(".post_dropdown_box").hide('slow');
    	});
		
		
		
		$('#post_arrow_box').click(function(e) {
        		$(".dashboard_dropdown_box").hide('slow');
				$(".post_dropdown_box").slideToggle('slow');
				$(".manage_user_dropdown_box ").hide('slow');
				$(".manage_report_dropdown_box").hide('slow');
    	});
		
		
		
	/*==========================================For The Manage User Slider ===================================*/
	
	
		/*$('#manage_icon').click(function(e) {
        		$(".dashboard_dropdown_box").hide('slow');
				$(".manage_user_dropdown_box ").slideToggle('slow');
				$(".manage_report_dropdown_box").hide('slow');
    	});
		
		
		
		$('#manage_text').click(function(e) {
        		$(".dashboard_dropdown_box").hide('slow');
				$(".manage_user_dropdown_box ").slideToggle('slow');
				$(".manage_report_dropdown_box").hide('slow');
    	});*/
		
		
		
		$('#manage_user_arrow_box').click(function(e) {
        		$(".dashboard_dropdown_box").hide('slow');
				$(".manage_user_dropdown_box ").slideToggle('slow');
				$(".manage_report_dropdown_box").hide('slow');
				$(".post_dropdown_box").hide('slow');
				
    	});
		
	
	
	
	
	
	
	
	
		
			
			
			
			
		
	
	
	
	
	
/*====================================    Open Settings / Logout Slider  ================================================*/	



		$('.p_ow_name').click(function(e) {
       		$('#a_pull_down').slideToggle(100);
	   });
	   
	
	   
	   
	   
 /*===================================  Close Settings / Logout Slider  ======================================= */

			$("#main" ).click(function(e) {
                $('#a_pull_down').hide();
            });
			
			
			$("#left_slider" ).click(function(e) {
                $('#a_pull_down').hide();
            });
			
			
			$("#right_slider" ).click(function(e) {
                $('#a_pull_down').hide();
            });
			
			
			$(".logo" ).click(function(e) {
          	   $('#a_pull_down').hide();
            });
			
		
		
			
			
/*=========================================== Message Popup Window =======================================================*/


$("#open_window").click(function(e) {
				$("#popup_window").css("-webkit-transition","all 1s ease");
				$("#popup_window").css("-moz-transition","all 1s ease");
				$("#popup_window").css("-o-transition","all 1s ease");
				
				$("#popup_window").css("display","block");
				$(".manage_user_dropdown_box ").hide('slow');
				$(".dashboard_dropdown_box").hide('slow');
				$(".post_dropdown_box").hide('slow');
				$(".manage_report_dropdown_box").hide('slow');
				
				$("#main_box").css("display","block"); 
				$("#popup_window").animate({opacity:"1.0"});
				$('#send').prop("disabled",true);
				$('#send').css('background' , '#ccc');
				 
				          
		});
		$("#main_box").click(function(e) {
            $("#popup_window").animate({opacity:"0.0"});
			$("#popup_window").css("display","none");
			
			$("#main_box").css("display","none"); 
			$('#msg').val("");
			$('#select_tag').val("");
			
        });
		
		$('#close_popup').click(function(e) {
            $("#popup_window").css("display","none");
			$("#main_box").css("display","none");
			$('#msg').val(""); 
			$('#select_tag').val("");
        });
		
		
		$('#cancel').click(function(e) {
            $("#popup_window").css("display","none");
			$("#main_box").css("display","none"); 
			$('#msg').val("");
			$('#select_tag').val("");
        });
		
/*========================================Enable_Disable Send Button========================================================*/
		

				$('#msg').on('keyup',function() {

					if(($('#msg').val()==""))
					{ 
						$('#send').prop("disabled","true");
						$('#send').css('background' , '#ccc');
					}
					else
					{

		                $('#send').prop("disabled",false);
						$('#send').css('background' , '#82ab00');
					}
			    });
				
				
				
				$('#select_tag').on('keyup',function() {
                 	$('#send').prop("disabled",false);
					$('#send').css('background' , '#82ab00');
			    });
				
				if(($('#msg').val().length==0))
				{ 
					$('#send').prop("disabled","true");
					$('#send').css('background' , '#ccc');
				}
				
				
/*================================Close Message Popup Box on Esc.===========================================*/	
		
		$(document).on( 'keydown', function (e) {
    		if ( e.keyCode == 27 ) { // Esc.
		 		$("#popup_window").css('display','none');
				$("#main_box").css('display','none'); 
				$('#msg').val("");
    		}
		});
		
		
		
		
/*====================================Notification Slider=================================================== */		
		

		var noti_flag = true;
		
		$('#noti').click(function(e) {
          		if(noti_flag)
				{
					$('#notify_box').css('display' ,'block');
					$('#notify_box').animate({width:'99%'} );
					$('#notify_box').animate({height:'25em'});		
					//$('#mesgs').animate({marginLeft:'100%'});
					//$('#frnd_req').animate({marginLeft:'100%'});
					$('#mesgs').css('display' , 'none');
					$('#frnd_req').css('display' , 'none');
					$('#noti_back_btn').css('display' , 'block');
					noti_flag = false;
				}
				else
				{
					noti_flag = true;
				}
	    });
		
		
		
		$('#noti_back_btn').click(function(e) {
			
			$('#notify_box').animate({width:'0%'} );
			$('#notify_box').animate({height:'0em'});	
			$('#notify_box').css('display' , 'none');	
			//$('#mesgs').css('margin-left' , '0%');
			//$('#frnd_req').css('margin-left' , '0%');
			$('#mesgs').css('display' , 'block');
			$('#frnd_req').css('display' , 'block');
			$('#noti_back_btn').css('display' , 'none');
			$('#mesgs').css('margin-top' , '1%');	
			
        });
		
		
		var msg_flag = true;
		
		$('#mesgs').click(function(e) {
          		if(msg_flag)
				{
					$('#right_sli_mesg_box').css('display' ,'block');
					$('#right_sli_mesg_box').animate({width:'99%'} );
					$('#right_sli_mesg_box').animate({height:'25em'});		
					$('#noti').animate({marginLeft:'100%'});
					$('#frnd_req').animate({marginLeft:'100%'});
					$('#msg_back_btn').css('display' , 'block');
					$('#mesgs').css('margin-top' , '-10%');
					msg_flag = false;
				}
				else
				{
					msg_flag = true;
				}
	    });
		
		
		
		$('#msg_back_btn').click(function(e) {
			
			$('#right_sli_mesg_box').animate({width:'0%'} );
			$('#right_sli_mesg_box').animate({height:'0em'});	
			$('#right_sli_mesg_box').css('display' , 'none');	
			$('#noti').css('margin-left' , '0%');
			$('#frnd_req').css('margin-left' , '0%');
			$('#msg_back_btn').css('display' , 'none');	
			$('#mesgs').css('margin-top' , '1%');
			
        });
		
		
		
			var ch_flag = true;
		
		
			/*$('input:checkbox').change(function(e) {

				if(ch_flag)
				{
					$('.delete_btn').attr('disabled' , false);
					$('.delete_btn').css('background' , '#82ab00');
					ch_flag = false;
				}
				else
				{
					$('.delete_btn').attr('disabled' , true);
					$('.delete_btn').css('background' , '#ccc');
					
					ch_flag = true;
				}
            });*/
                
            				
				
              
            
		
/*======================================DELETE USER (SELECTION WISE)============================================*/
		
		$(".delete_btn").click(function(e) {
            
			users = document.getElementsByName("user");
			selected="";		
			for(i=0;i<users.length;i++)
			{
				if(users[i].checked)
				{
					selected +=users[i].value+"#";
					users[i].checked = false;
				}
			}
			if (selected == "")
			 {
				return;
			 }
//			$('#del_id_selected
			if(users!="")
			{
				
				$.ajax({
					url:'scripts_php/delete_user.php',
					type:'POST',
					data:{'users':selected},
					success:function(e)
					{
						//alert("User Deleted.");
					}
					});		
						
			}
			
			
			
					if (selected != "")
		{
				sel = selected.split ('#');	
				for (i = 0 ; i  < sel.length-1 ; i++)
				 {
					id = "#del_id_"+sel[i]; 
					$(id).remove();
				 }
		
		}
		

			
        });
		
		
		
	/*======================================BLOCK USER (SELECTION WISE)============================================*/
		
		$(".block_btn").click(function(e) {
            
			users = document.getElementsByName("user");
			selected="";
			//alert (users.length);		
			for(i=0;i<users.length;i++)
			{
				if(users[i].checked)
				{
					selected +=users[i].value+"#";
					users[i].checked = false;
					//alert ('select');
				}
			}
			if (selected == "")
			 {
				return;
			 }
//			$('#del_id_selected
			if(users!="")
			{
				
				$.ajax({
					url:'scripts_php/block_user.php',
					type:'POST',
					data:{'users':selected},
					success:function(e)
					{
						//alert("User Blocked.");
					}
					});		
						
			}
			
			
			
					if (selected != "")
		{
				sel = selected.split ('#');	
				//alert (sel.length);
				for (i = 0 ; i  < sel.length -1; i++)
				 {
					id = "#block_id_"+sel[i] ;//;
					//alert ($(id).html()); 
					$(id).css('background-color',"#ccc");
					$(id+ " td:nth-child(1)").css('background-color',"#ccc");
					
				 }
				 
		
		}
		

			
        });
		

		
		/*====================UNBLOCK USER (SELECTION WISE)===============================================*/
		
		
		
		$(".unblock_btn").click(function(e) {
            
			users = document.getElementsByName("user");
			selected="";
			//alert (users.length);		
			for(i=0;i<users.length;i++)
			{
				if(users[i].checked)
				{
					selected +=users[i].value+"#";
					users[i].checked = false;
					//alert ('select');
				}
			}
			if (selected == "")
			 {
				return;
			 }
//			$('#del_id_selected
			if(users!="")
			{
				
				$.ajax({
					url:'scripts_php/unblock_user.php',
					type:'POST',
					data:{'users':selected},
					success:function(e)
					{
						//alert("User UnBlocked.");
					}
					});		
						
			}
			
			
			
			if (selected != "")
				{
				sel = selected.split ('#');	
				//alert (sel.length);
				for (i = 0 ; i  < sel.length -1; i++)
				 {
					id = "#block_id_"+sel[i] ;//;
					if(sel[i] % 2 == 0)
					{
						
						$(id).css('background-color',"#82ab00");
						$(id+ " td:nth-child(1)").css('background-color',"#82ab00");
					
					}
					
					else
					{
						$(id).css('background-color',"#FFF");
						$(id+ " td:nth-child(1)").css('background-color',"#FFF");
					}
					
					
				 }
		
		}
		
        });
		
		
		
		
		
		
		
	/*=================APPROVE USERS SELECTION WISE=================================*/
		
			$(".approve_btn").click(function(e) {
            
			users = document.getElementsByName("user");
			selected="";		
			for(i=0;i<users.length;i++)
			{
				if(users[i].checked)
				{
					selected +=users[i].value+"#";
					users[i].checked = false;
				}
			}
			if (selected == "")
			 {
				return;
			 }
//			$('#del_id_selected
			if(users!="")
			{
				
				$.ajax({
					url:'scripts_php/approve_user.php',
					type:'POST',
					data:{'users':selected},
					success:function(e)
					{
						//alert("User Approved");
					}
					});		
						
			}
			
			
			
					if (selected != "")
		{
				sel = selected.split ('#');	
				for (i = 0 ; i  < sel.length ; i++)
				 {
					id = "#del_id_"+sel[i]; 
					$(id).remove();
				 }
		
		}
	
        });
		
		
		/*=================DISAPPROVE USERS SELECTION WISE=====================*/
		
		
		$(".disapprove_btn").click(function(e) {
            
			users = document.getElementsByName("user");
			selected="";		
			for(i=0;i<users.length;i++)
			{
				if(users[i].checked)
				{
					selected+=users[i].value+" ";
					users[i].checked = false;
				}
			}
			
			if(users!="")
			{
				
				$.ajax({
					url:'scripts_php/disapprove_user.php',
					type:'POST',
					data:{'users':selected},
					success:function(e)
					{
						//alert("success");
						//$('#main_container').load("block_user.php");
					}
					
					});		
			}
			
			if (selected != "")
		{
				sel = selected.split ('#');	
				for (i = 0 ; i  < sel.length ; i++)
				 {
					id = "#del_id_"+sel[i]; 
					//$(id).css('background-color',"#ccc");
					//$(id+ " td:nth-child(1)").css('background-color',"#ccc");
					$(id).remove();
					
				 }
		
		}
			
        });
		
		
				
	/*===============================On_Off Button For Account Settings=========================================== */		
			
	$('.onoffswitch-inactive').click(function(e) {
				
			 
			$('#old_password').attr('disabled' , true);
			$('#new_password').attr('disabled' , true);
			$('#conf_password').attr('disabled' , true);
			$('#first_name').attr('disabled', true);
			$('#last_name').attr('disabled', true);
			
			$('#save_change').attr('disabled' , true);
			$('#cancel_change').attr('disabled' , true);
			
			$('#save_change').css('background' , '#ccc');
			$('#cancel_change').css('background' , '#ccc');
			$('.on_off_btn_box').css('box-shadow','0px 0px 7px #999797');
   	});
	
	
	
	
		
    $('.onoffswitch-active').click(function(e) {
			
			$('#old_password').attr('disabled' , false);
			$('#new_password').attr('disabled' , false);
			$('#conf_password').attr('disabled' , false);
			//$('#first_name').attr('disabled', false);
			//$('#last_name').attr('disabled', false);
			//$('#lname').attr('disabled' , false);
			
			$('#save_change').attr('disabled' , false);
			$('#cancel_change').attr('disabled' , false);
			
			$('#save_change').css('background' , '#82ab00');
			$('#cancel_change').css('background' , '#82ab00');
			$('.on_off_btn_box').css('box-shadow','0px 0px 7px #82ab00');
    });
	
	
	

	
		
		
		
		
		
		
///$("#save_name").click(function(e) close
	
	
	
				var pass_flag = true;
				$('#show_pass').change(function(e) {
                    if(pass_flag)
					{
						$('#password').attr('type' , 'text');
						pass_flag = false;
					}
					
					else
					{
					
						$('#password').attr('type' , 'password');
						pass_flag = true;
					}
                });
	
	
	
}); // $(document).ready() close






/*============================================Send Message To a Particular User==============================================*/
		
function addmesg()
	{
		users="";
		last = $(".search-choice span:last").index(".search-choice span");
				
		for(i=0;i<=last;i++)
			{
				users+=$(".search-choice span:eq(" + i + ")").text()+"#";
			}

		mesg = $("#msg").val();
					
		$.ajax({
			url: 'scripts_php/send_msg.php',
			type: "post",
			
			data:{
					'msg':mesg,'users':users
				 },
			
			success:function(result)
			{
				//window.location.reload();
            
			$("#popup_window").animate({opacity:"0.0"});
			$("#popup_window").css("display","none");
			$('#msg').val("");
			$('#after_mesg_sent_box').css('display' , 'block');
			$('#after_mesg_sent_box').fadeOut(3000);		
			$("#main_box").fadeOut(2000);
			
			$("#receivers").val(result);
			$(".search-choice").css("display","none");
			//setTimeout(function(){ $("#img_frm").submit(); },3000);
			
			//location.reload(3000);
			
			}
			
			});
			
				
			//$('#send').prop("disabled",true);
			//	$('#msg').val("");
			
	}
	
	
	
	
	
	
	$('#cancel_name').click(function(e) {
        $('#old_password').val() = "";
		$('#new_password').val() = "";
		$('#conf_password').val() = "";
		
    });
	
	
	
	/*====================Update Admin' Id ,Password As Per Admin's Interest========================================*/
	
	
	
	
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


	var old_pass ;
	var new_pass;
	function validate()
	{
		admin_name = document.update.admin_name;
		old_pass = document.update.old_password;
		new_pass = document.update.new_password;
		conf_pass = document.update.conf_password;
		err_ele = $('#err_det');
//		
		if(!isEmpty(old_pass.value))
		{
			check_pass(call_back);
		}
		else
		 {
			err_ele.html("Please Fill Old Password First").fadeIn(500);
			old_pass.focus();
			 
		 }// isempty_old
		
		
	}
	
	/*
						if(!isEmpty(conf_pass.value))
					 {
						if(new_pass.value !=conf_pass.value)
						{
							err_ele.html("New Password And Confirm Password Must Be Matched!!!").fadeIn(500);
							return false;
						}	
						else
						{	
							 update_pass();
							 return true;
						}
					 }
					else
					 {
						err_ele.html("Please Fill Cofirm Password First").fadeIn(500);
						conf_pass.focus();
					 }//isempty_conf
					 

	*/
	
	
	function check_pass(call_back)
	{

//		return;
		err_ele = $('#err_det');
		
		fname = $("#first_name").val();
		lname = $("#last_name").val();
		// err_ele.hide();
		$.ajax({
				url: 'scripts_php/update_profile.php',
				data:{
						first_name:fname,
						last_name:lname,
						pass:old_pass.value ,
					 },
				type: "post",
				dataType:"html",
				error: function(){
						alert ('Something Gets Wrong!!!Please Try Again');
							},
				success:function (strData) {call_back(strData)},
				
				});		 
			
	}
function call_back (str)
 {
	 if (typeof (str) == 'undefined')
	 	str = 0;
		
	 if (str == 1)
	  {
		if(!isEmpty(new_pass.value))
		 {
			if(!isEmpty(conf_pass.value))
			 {
				 if (new_pass.value == conf_pass.value)
				  {
						err_ele.html("").fadeOut(1500);
						update_pass(conf_pass.value);
						
						$('#old_password').attr('disabled' , true);
						$('#new_password').attr('disabled' , true);
						$('#conf_password').attr('disabled' , true);
						//$('#first_name').attr('disabled', true);
						//$('#last_name').attr('disabled', true);
						
						$('#save_change').attr('disabled' , true);
						$('#cancel_change').attr('disabled' , true);
						
						$('#save_change').css('background' , '#ccc');
						$('#cancel_change').css('background' , '#ccc');
						$('.on_off_btn_box').css('box-shadow','0px 0px 7px #999797');
						$('#old_password').val("");
						$('#new_password').val("");
						$('#conf_password').val("");
									
						
						
						
						
				  }
				 else
				  {
						err_ele.html("Password Must Be Matched. ").fadeIn(500);
						new_pass.focus();
				  }
			 }				 
			else
			 {
				err_ele.html("Please Fill Confirm Password").fadeIn(500);
				new_pass.focus();
			 } //isempty_confPass

		 }				 
		else
		 {
			err_ele.html("Please Fill New Password ").fadeIn(500);
			new_pass.focus();
		 } //isempty_newPass

	  }
	  
	 else
	  {
			err_ele.html("Please Fill Right Old Password First").fadeIn(500);
			old_pass.focus();
	  }
 }	
	
	
	function update_pass(new_pass)
	{
		$.ajax({
			 url:"scripts_php/update_password.php",
			 data:{new_password:new_pass},
			 type: "post",
			 dataType:"html",
			 success: function(str){
					//alert(str);
			},
		 });
		
	}
	
	
	
	
		




