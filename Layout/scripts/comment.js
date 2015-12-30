// JavaScript Document

function add_comment (str , id)
 {
	 alert (str);
		$.ajax({
			url: 'scripts_php/add_comment.php',
			type: "post",
			data : {cmnt:str,post_id:id},
			dataType:"html",
			error: function(){
						},
			success: function(strData){
				}
				
			}).done (alert ('ys')); 
	 
 }