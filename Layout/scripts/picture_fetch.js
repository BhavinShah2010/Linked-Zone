// JavaScript Document
function picture_fetch ()
 {
		$.ajax({
			url: 'scripts_php/picture_fetch.php',
			type: "post",
			dataType:"html",
			error: function(){
						},
			success: function(strData){
//				alert (strData);
				$('#sub_pic_cnt').html(strData);
			}
			}); 

		


 }