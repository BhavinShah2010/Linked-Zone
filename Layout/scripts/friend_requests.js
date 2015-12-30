// JavaScript Document

function send_friend_request (id)
 {
	 	if ($('#add_frnd_btn span').html () == 'Request Sent')
			return false;
	 		$.ajax({
			url: 'scripts_php/make_friend_request.php',
			data:	{friend_id : id},			
			type: "post",
			dataType:"html",
			error: function(){
				alert ("Friend Request is not send, Try Again later!!!");
						},
			success: function(){
				$('#add_frnd_btn span').html ('Request Sent');
				}
			});
	 
	 
 }