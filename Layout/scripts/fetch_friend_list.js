// JavaScript Document
function fetch_friend_list (id)
 {
	$.ajax({
			url: 'scripts_php/friend_list_fetch.php',
			data:	{user_id : id},
			type: "post",
			dataType:"html",
			error: function(){
				search_result.innerHTML =  "<p>Page Not Found!!</p>" ;
						},
			success: function( strData ){
//				alert (strData);
				search_result.innerHTML = strData;
				},
				
			});
 }

function  fetch_friend_req_list(id)
 {
	$.ajax({
			url: 'scripts_php/friend_request_list_fetch.php',
			data:	{user_id : id},
			type: "post",
			dataType:"html",
			error: function(){
				search_result.innerHTML =  "<p>Page Not Found!!</p>" ;
						},
			success: function( strData ){
//				alert (strData);
				search_result.innerHTML = strData;
				},
				
			});
 }

function  req_fun(flag , u_id, f_id)
 {
	$.ajax({
			url: 'scripts_php/friend_request_c_ig.php',
			data:	{val : flag , user:u_id , fuser:f_id},
			type: "post",
			dataType:"html",
			error: function(){
				search_result.innerHTML =  "<p>Page Not Found!!</p>" ;
						},
			success: function( strData ){
				//alert (strData);

//				search_result.innerHTML = strData;
				},
				
			});
 }

