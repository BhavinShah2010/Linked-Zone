/*Admin Post*/

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
 
 
 
 
 
 /*Post Done By Admin Will Get Fetched...*/
 
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