// JavaScript Document
function search_friends (str)
 {
	search_result = document.getElementById('search_result');
	str = str.replace (" " , "");
	if (str== '') 
	 {
		 search_result.innerHTML = '';
		 return;
	 }
	$.ajax({
			url: 'scripts_php/search_friend.php',
			data:{search_query:str},
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



