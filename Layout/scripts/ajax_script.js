// JavaScript Document

function addPost (user_id ,uname)
 {
	 
	String.prototype.trim = function() 
	{
		 return this.replace(/^\s+|\s+$/g,"");
	} 
	u_activity = $('#user_activity_cont');
	str = document.homePost.postVal.value;

	if (str.trim () == '')
	 {
		return false;
	 }

	document.homePost.postVal.value = "";

	$.ajax({
			url: 'scripts_php/addPost.php',
			data:	{postVal:str},
			type: "post",
			dataType:"html",
			error: function(){
				u_activity.html( "<p>Page Not Found!!</p>" );
						},
			success: function( strData ){
				fetch_post(user_id, strData , uname);
				},
				
			});
 }

function update_likes ()
 {
		$.ajax({
			url: 'scripts_php/check_like.php',
			type: "post",
			dataType:"html",
			error: function(){
						},
			success: function(strData){
				ids = strData.split(' ');
				for (i = 0 ; i < ids.length-1 ; i++)
					check_likes (ids[i]);
				},
			timeout:60000
				
			}); 

		
 }

function check_likes (id)
 {
	 		$.ajax({
			url: 'scripts_php/update_like.php',
			data:	{post_id:id},			
			type: "post",
			dataType:"html",
			error: function(){
				//u_activity.html( "<p>Page Not Found!!</p>" );
						},
			success: function(strData){
				$('#like_cnt'+id).html(strData);
				//alert(strData);
						
				}
			}); 

	 
 }  
/*function addPost (uname , name)
 {
	String.prototype.trim = function() 
	{
 	 return this.replace(/^\s+|\s+$/g,"");
	} 
	u_activity = $('#user_activity_cont');
	str = document.homePost.postVal.value;

	if (str.trim () == '')
	 {
		return false;
	 }
	
	document.homePost.postVal.value = "";
	if (window.XMLHttpRequest)	 
	 {
		xml = new XMLHttpRequest();	 
     }
	else
	 {
		xml = new ActiveXObject ("Microsoft.XMLHTTP");
	 }

	 xml.onreadystatechange=function ()
	  {
		if (xml.readyState == 4 && xml.status == 200)
		 {
				fetch_post (xml.responseText , name);
		 }  
	  }
	xml.open("POST","scripts_php/addPost.php",true);	
	xml.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xml.send ("postVal="+str);
 }*/
 
//function post
/*------------------------------ WILL UPDATE LIKE COUNTER OF POSTS -------------------------------------*/
function like_cnt (id )
 {
	c_ele = '#like'+id; 

	 		$.ajax({
			url: 'scripts_php/like_post.php',
			data:	{post_id:id},			
			type: "post",
			dataType:"html",
			error: function(){
				//u_activity.html( "<p>Page Not Found!!</p>" );
						},
			success: function(strData){
				$(c_ele).html(strData);				
				}
			});
	
	
 }


/*------------------------------ WILL FETCH USER RELATED POSTS -------------------------------------*/

function fetch_post (post_user_id , post_id , name)
 {
	 		$.ajax({
			url: 'scripts_php/fetch_post.php',
			data:	{post_user_id:post_user_id,post_id:post_id , name:name},			
			type: "post",
			dataType:"html",
			error: function(){
				//u_activity.html( "<p>Page Not Found!!</p>" );
						},
			success: function(strData){
				$('#user_activity_cont').after(strData);
				}
			});
			
 }
/*------------------------------ WILL PROCESS FOR NOTIFICATION -------------------------------------*/

function notify (post_id ,str)
 {

	 
	 		$.ajax({
			url : 'scripts_php/notification.php',
			data: {post_id:post_id , string:str},			
			type: "post",
			dataType:"html",
			error: function(){
				//u_activity.html( "<p>Page Not Found!!</p>" );
					 	},
			success: function(strData){
				alert (strData);
//				$('#user_activity_cont').after(strData);
				}
			});			
 }
/*	if (window.XMLHttpRequest)	 
	 {
		xml = new XMLHttpRequest();	 
     }
	else
	 {
		xml = new ActiveXObject ("Microsoft.XMLHTTP");
	 }
	
	 xml.onreadystatechange=function ()
	  {
		if (xml.readyState == 4 && xml.status == 200)
		 {
			 //alert (xml.responseText);
			 $('#user_activity_cont').after(xml.responseText);				
		 }  
  }
	

	xml.open("POST","scripts_php/fetch_post.php",false);	 
	xml.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xml.send ("post_id="+id+"&name="+name);*/

 