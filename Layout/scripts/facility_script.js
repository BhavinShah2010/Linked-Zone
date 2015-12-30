	// JavaScript Document

function delete_post (id)
 {
	if (cuser_type == 'admin_manage')
		user.delete_reported_post (id);
	else
		user.delete_post(id);
 }	
function report_post (id)
 {	
 	if (cuser_type == 'admin_manage')
		user.reported_post_discard (id);
  	user.report_post (id);
 }

function resize_comment (id , e , ele)
 {

	 if (e.which == 13)
	  {
		user.create_new_comment (id ,$(ele).val());
		$(ele).attr('disabled','disabled');
//		$(ele).css('border','none');
		$(ele).css('background-color','#EEEEEE');
	  }
    while($(ele).outerHeight() < ele.scrollHeight + parseFloat($(ele).css("borderTopWidth")) + parseFloat($(ele).css("borderBottomWidth"))) {
        $(ele).height($(ele).height()+1);
    }
 }

function toggle_like (id , ele)
 {
	obj = user.p[id];
	ele.innerHTML = obj.toggle_like (obj.post_like_flag , 'N' , id);
 }
 
function add_text_post (post_type , type_side)
 {
	String.prototype.trim = function() 
	{
		 return this.replace(/^\s+|\s+$/g,"");
	} 
	 
	str = document.homepost.postVal.value;
	if (str.trim () == '')
	 {
		return false;
	 }
	user.add_t_post (str , post_type , type_side);
	
	document.homepost.postVal.value = "";	 
 } 




function add_doc_post (file , post_type , file_path , type_side)
 {

	String.prototype.trim = function() 
	{
		 return this.replace(/^\s+|\s+$/g,"");
	} 
	 
	str = document.homepost.postVal.value;
	if (str.trim () == '')
	 {
//		return false;
	 }
//	alert (file.name); 
	user.add_d_post (str , file , post_type , file_path , user , type_side);
	document.homepost.postVal.value = "";	 
	document.homepost.fileselect.value = "";
 }


function add_gen_report_post (file , file_path ,report_type , report_year)
 {

	// return;
	String.prototype.trim = function() 
	{
		 return this.replace(/^\s+|\s+$/g,"");
	} 
	 
	str = document.homepost.postVal.value;

	if (str.trim () == '')
	 {
//		return false;
	 }

	user.add_gen_repo_post (str  , file , file_path , report_type  ,report_year);
	
	document.homepost.postVal.value = "";
	document.homepost.fileselect.value = "";
	document.homepost.type_of_report.options[0].selected= true;
	document.homepost.for_which_year.options[0].selected= true;	
 } 

