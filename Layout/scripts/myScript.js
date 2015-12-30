// JavaScript Document
// JavaScript Document

var nmfFlag = true;	// right slider flag

var files;
var report_type = 0;
var for_which_year_report = 0;
function $id(id) 
 {
		return document.getElementById(id);
 }
 
function FileSelectHandler(e) 
 {
	//		alert ('h');
	files = e.target.files || e.dataTransfer.files;
}

/*				For Report Add by Admin */
function select_report_type (ele)
 {
	 report_type = ele.value;
	// alert ("report_type" +report_type);
 }
function for_year (ele)
 {
	 for_which_year_report = ele.value;
	 alert (for_which_year_report);
 }
function File_report_Handler(e) 
 {
//	alert ('h');
	files_report = e.target.files || e.dataTransfer.files;
}
//-------------------------------------------
function prc_files (type_side)
 {

		if (typeof (type_side) == 'undefined' )
			type_side = 'user';
		for (var i = 0, f; f = files[i]; i++) {
			if (f.type == "image/jpeg")
				 add_doc_post (f , 2 , $id('upload').action , type_side);
			else if (f.type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" || f.type == "application/msword")
				 add_doc_post (f , 3 , $id('upload').action , type_side);
			else if (f.type == "application/vnd.ms-excel" || 
					 f.type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
				 add_doc_post (f , 4 , $id('upload').action , type_side);
			else if (f.type == "application/pdf")
				 add_doc_post (f , 5 , $id('upload').action , type_side);
			else if (f.type == "text/plain")
				 add_doc_post (f , 6 , $id('upload').action , type_side);
			else
				alert ("Only Document or xls or pdf or jpg files Allowed");
		}
 }
 
function prc_report_files ()
  {
	 if (report_type == 0)
	  {
	  	alert ('Select Report Type.');
		return;
	  }
	 if (for_which_year_report == 0)
	  {
		  alert ('Select Year.');
		  return;
	  }
		for (var i = 0, f; f = files_report[i]; i++) {
			if (f.type == "application/vnd.ms-excel" || 
					 f.type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
				 add_gen_report_post (f ,  $id('upload').action , report_type , for_which_year_report);
			else
				alert ("Only xls files Allowed");
		}

	  
  }
function UploadFile(file) {

		var xhr = new XMLHttpRequest();
		if (file.type == "image/jpeg" || file.type == "text/plain" || file.type == "application/pdf")
		 {
			//if (xhr.upload  && file.size <= $id("MAX_FILE_SIZE").value) {

			//file received/failed
			
			xhr.onreadystatechange = function(e) {
				alert (xhr.responseText);
				if (xhr.readyState == 4) 
				{
					progress.className = (xhr.status == 200 ? "success" : "failure");
					
				}
			};

			// start upload
			xhr.open("POST", $id("upload").action, true);
			xhr.setRequestHeader("X_FILENAME", file.name);
			xhr.send(file);

		 }

}



$(document).ready(function() {

	side_panel = $('#side_panel');
   $(side_panel).hover(function ()
		{
		//	alert ('h');
			if (side_panel.css('width')  == '50px')
				$(side_panel).animate({width:'16.5%'});	
	    },
	function () 
		{
//			alert ('a');
			$(side_panel).animate({width:'50px'});			
		});	
	scWidth = window.innerWidth;
	$('#hPulldwn').click(function ()
	{
		$('#pulldown').slideToggle(100);
		});
	rightSlider ();
//	post_type_change ();
}); 


function rightSlider ()
 {

    $('#bt1').click(function(e) {
		slider = $('#slider');
		if (nmfFlag == true)
		 {
				slider.animate({right:'0%'},500);	 
				$("#slider li .contentLi").animate({"padding-left":"0%"},50);				
				nmfFlag = false;	
	     }
		else
		 {
				if (slider.css('right') == '0px')
				{			 
				 slider.animate({right:'-30%'},500);
				 nmfFlag = true;
				}
		 }
		
	});
 }



/*------------------------------ POST TYPE CHANGE -------------------------------------*/
 
 
function text_post (type_side)
 {
	if (typeof (type_side) =='undefined')
		type_side = 'user'
 	icon_path = '';
 	if (type_side == 'admin')
	 {
		 icon_path = "../images/icons/";
	 }
	else
	 {
 		 icon_path = "images/icons/";
	 }
 
	var str;
    str =  '<form name="homepost" id="pst_chng">'+
           '<textarea name="postVal" rows="4" tabindex="1" cols="50" placeholder="ENTER YOUR POST"></textarea>'+
     	   '<div id="sel_opt">'+
           '<div class="opt_btn" id="text_content"  ></div>'+
		   '<span style="float:left; cursor:pointer;margin-top:7px; margin-right:5px;">Text</span>'+
           //'<div class="opt_btn" id="text_content" style="background:url('+icon_path+'post_text_icon.png)"></div>'+
           '<div class="opt_btn" id="image_content" onClick = "image_post (\''+type_side+'\')" style="background:url('+icon_path+'post_imgt_icon.png)"></div>'+
		   '<span style="float:left; margin-top:7px;cursor:pointer;" onClick = "image_post (\''+type_side+'\')">Document</span>'+
	       '</div>'+
           '<div id="post_cancel_btns">'+
		   '<input type="reset" value="Cancel" tabindex="3" name="CancelBtn"/>'+
           '<input type="button" value="Post" id="post_btn" tabindex="2" name="postBtn" onClick="add_text_post (1,\''+type_side+'\')" />'
 		   '</form>';
	//onClick = "text_post (\''+type_side+'\')" 
	//onClick = "image_post (\''+type_side+'\')
	$('#post_type').html (str);	 
 } 
 
function image_post (type_side)
 {
	 if (typeof (type_side) =='undefined')
	 	type_side = 'user'
	var str;
	if (type_side == 'admin')
	 {
		str = '<form name = "homepost" id="upload" action="../scripts_php/admin_addDoc.php" method="POST" enctype="multipart/form-data">';
		 icon_path = "../images/icons/";		
	 }
	else
	 {
		str = '<form name = "homepost" id="upload" action="scripts_php/addDoc.php" method="POST" enctype="multipart/form-data">';
		 icon_path = "images/icons/";		
	 }
		
		str+= '<textarea name="postVal" rows="4" tabindex="1" cols="50" maxlength = 50 placeholder="ENTER YOUR POST (50 Characters)"></textarea>'+   
		   '<input type="file" id="fileselect" name="fileselect[]" multiple onchange="FileSelectHandler (event)" /><br>'+
     	   '<div id="sel_opt">'+
           '<div class="opt_btn" id="text_content"  onClick = "text_post (\''+type_side+'\')" style="background:url('+icon_path+'post_text_icon.png)"></div>'+
		   '<span style="float:left; cursor:pointer;margin-top:7px; margin-right:5px;" onClick = "text_post (\''+type_side+'\')">Text</span>'+
           '<div class="opt_btn" id="image_content" " style="background:url('+icon_path+'post_imgt_icon.png)"></div>'+
		   '<span style="float:left; margin-top:7px;cursor:pointer;" >Document</span>'+
	       '</div>'+
           '<div id="post_cancel_btns">'+
		   '<input type="reset" value="Cancel" tabindex="3" name="CancelBtn"/>'+
           '<input type="button" value="Post" onclick = "prc_files (\''+type_side+'\')" tabindex="2" name="postBtn"  /></div>'
 		   '</form>';

			$('#post_type').html (str);	
 }


		   	
/*    str =  '<form name="form5" enctype="multipart/form-data" method="post" action="my_upload.php" >'+
		   '<textarea name="postVal" rows="4" tabindex="1" cols="50" maxlength = 50 placeholder="ENTER YOUR POST (50 Characters)"></textarea>'+   
           '<input type="file" size="32" name="my_field" value="" id="xhr_field" " />'+
     	   '<div id="sel_opt">'+
       	   '<div id="xhr_status"></div>'+
           '<p class="button"><input type="hidden" name="action" value="xhr" /></p>'+
		   
           '<div class="opt_btn" id="text_content"  onClick = "text_post ()"></div>'+
		   '<span style="float:left; cursor:pointer;margin-top:7px; margin-right:5px;">Text</span>'+
           '<div class="opt_btn" id="image_content" onClick = "image_post ()" style="background:url(images/icons/post_imgt_icon.png)"></div>'+
		   '<span style="float:left; margin-top:7px;cursor:pointer;">Image</span>'+
	       '</div>'+
           '<div id="post_cancel_btns">'+
		   '<input type="reset" value="Cancel" tabindex="3" name="CancelBtn"/>'+
           '<input type="button" value="Post" id="xhr_upload" tabindex="2" name="postBtn"  /></div>'
 		   '</form>';*/
//onClick="addPost(cuser,owner_name)"		   
/*		

	      function xhr_send(f, e) 
			  	{		
			        if (f) 
						{
				          xhr.onreadystatechange = function()
						  {
					            if(xhr.readyState == 4)
									{
									//	alert (xhr.responseText);
						              $('#user_activity_cont').after(xhr.responseText);
									  $('#xhr_field').val('');
						            }
				          }
				  xhr.open("POST", "my_upload.php?action=xhr");
				  xhr.setRequestHeader("Cache-Control", "no-cache");
				  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
				  xhr.setRequestHeader("X-File-Name", f.name);
				  xhr.send(f);
		        }	// xhr_send 
        }	// onload
	
      
		
      var xhr = new XMLHttpRequest();

      if (xhr) {

        // xhr example
        var xhr_file = null;
        document.getElementById("xhr_field").onchange = function () {
          xhr_file = this.files[0];
        }
        document.getElementById("xhr_upload").onclick = function (e) {
			
          e.preventDefault();
          xhr_send(xhr_file, "xhr_result");
        }
	  }
	
	 		   
 } 
 
function post_type_change ()
 {
	var str;
	post_ele = $('#post_type');
	$('#text_content').click(function(e) {
     /*str = '<form name="homepost" id="pst_chng">'+
           '<textarea name="postVal" rows="4" tabindex="1" cols="50" placeholder="ENTER YOUR POST"></textarea>'+
     	   '<div id="sel_opt">'+
           '<div class="opt_btn" id="text_content"  onClick = "text_post ()"></div>'+
           '<div class="opt_btn" id="image_content" onClick = "image_post ()" style="background:url(images/icons/post_imgt_icon.png)"></div>'+
	       '</div>'+
           '<div id="post_cancel_btns">'+
		   '<input  type="reset" value="Cancel" tabindex="3" name="CancelBtn"/>'+
           '<input type="button" value="Post" id="post_btn" tabindex="2" name="postBtn" onClick="addPost(cuser,owner_name)" />'
 		   '</form>';
		
		/*
	    str = '<form name="homePost"  action="scripts_php/addPost.php" method="post" id="pst_chng">';
		str += '<textarea name="postVal" rows="7" cols="50" placeholder="ENTER YOUR POST" style="resize:none;"></textarea></form>';
       	post_ele.html (str);
		str  = '<input  type="reset" value="Cancel" tabindex="3" name="CancelBtn"/>';	 
        str += '<input type="button" value="Post" id="post_btn" tabindex="2" name="postBtn" onClick="addPost(cuser,owner_name)" />';
		//$('#post_type').html (str);

    }); 
	
	$('#image_content').click(function(e) {
    /* str = '<form name="form5" enctype="multipart/form-data" method="post" action="my_upload.php" />'+
           '<input type="file" size="32" name="my_field" value="" id="xhr_field" " />'+
     	   '<div id="sel_opt">'+
       	   '<div id="xhr_status"></div>'+
           '<p class="button"><input type="hidden" name="action" value="xhr" />'+
           '<div class="opt_btn" id="text_content" onClick = "text_post ()></div>'+
           '<div class="opt_btn" id="image_content" onClick = "image_post () style="background:url(images/icons/post_imgt_icon.png)"></div>'+
	       '</div>'+
           '<div id="post_cancel_btns">'+
		   '<input  type="reset" value="Cancel" tabindex="3" name="CancelBtn"/>'+
           '<input type="submit" name="Submit" value="Post" id="xhr_upload" tabindex="2" />'+
 		   '</form>';
	$('#post_type').html(str);	   
/*        str  = '<form name="form5" enctype="multipart/form-data" method="post" action="my_upload.php" />';
        str += '<input type="file" size="32" name="my_field" value="" id="xhr_field" " />';
        str += '<div id="xhr_status"></div>';
        str += '<p class="button"><input type="hidden" name="action" value="xhr" />'*/

/*		str  = '<input  type="reset" value="Cancel" tabindex="3" name="CancelBtn"/>';	 
        str += '<input type="submit" name="Submit" value="Post" id="xhr_upload" tabindex="2" />';
		
		$('#chng_btns').html (str);
		
    
		      function xhr_send(f, e) 
			  	{		
			        if (f) 
						{
				          xhr.onreadystatechange = function()
						  {
					            if(xhr.readyState == 4)
									{
									//	alert (xhr.responseText);
						              $('#user_activity_cont').after(xhr.responseText);
									  $('#xhr_field').val('');
						            }
				          }
				  xhr.open("POST", "my_upload.php?action=xhr");
				  xhr.setRequestHeader("Cache-Control", "no-cache");
				  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
				  xhr.setRequestHeader("X-File-Name", f.name);
				  xhr.send(f);
		        }	// xhr_send 
        }	// onload
	
      
		
      var xhr = new XMLHttpRequest();

      if (xhr) {

        // xhr example
        var xhr_file = null;
        document.getElementById("xhr_field").onchange = function () {
          xhr_file = this.files[0];
        }
        document.getElementById("xhr_upload").onclick = function (e) {
			
          e.preventDefault();
          xhr_send(xhr_file, "xhr_result");
        }
	  }
		
    });

 }
 
function closeSlider ()
 {
	$('#mainOuter').click(function () {
		if ($('#slider').css(right) != '0px')
		 {
			 $('#slider').animate({right:'-30%'});
			 nmfFlag = true;
		 }
		
		});
 }
*/


