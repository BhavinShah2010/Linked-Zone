// JavaScript Document

		/* ------------------------ Using Prototyping Object Oriented Conecept in Javascript -------------- */
		/* ------------------------------- Developed By : Adit , Bhavin , Harsh -------------------------- */
		
		
		
		/* --------------------------------- DEFINING POST CLASS IN JAVASCRIPT ---------------------------- */		

var cuser = 0;
var cusername = '';
var cuser_type = '';
function post(str , content , no_of_comments , comments, id )
 {

	var old_path; 
 	cont = content; 		
	
	// Setting content to different variable.
	
	if (no_of_comments != 0)
	 {
		comment_str = comments.split ("/;");
	 }
	 
	str = str.split (";");

	if (str[8] == 1 && cuser_type == 'user')
		return;
	if (str[3] == 2)
	{
		// Checking whether it is image or not?
		content = content.split ("IMAGE");
		cont  = content[0];
	}
	else if (str[3] == 3)
	{
		content = content.split ("DOC");
		cont = content[0];
	}	
	else if (str[3] == 4)
	{
		content = content.split ("XLS");
		cont = content[0];
	}	
	else if (str[3] == 5)
	{
		content = content.split ("PDF");
		cont = content[0];
	}
	else if (str[3] == 6)
	{
		content = content.split ("TXT");
		cont = content[0];
	}	
		
	// Setting The paths according to type of users (whether admin/user)		
	

	// For Like and Unlike construction of post.
	//alert (str[7]);
	if (str[7] == 1)
		this.construct_post(str[0] , str[1] , str[2] , str[3] , cont , str[4] , str[5] , --str[6] , true , no_of_comments);
	else
		this.construct_post(str[0] , str[1] , str[2] , str[3] , cont , str[4] , str[5] , ++str[6] , false , no_of_comments);	
		
	 old_path = this.post_img_path;
	if (cuser_type == 'admin')
	 {
		 this.post_img_path = "all_admin_img/user_";
		 profile_pic_path = "all_admin_img/user_";
		 dow_doc_path = "../scripts_php/";		 
	 }
	else if (cuser_type == 'admin_manage')
	 {
 		 this.post_img_path = "../all_user_img/user_";
  		 profile_pic_path = "../all_user_img/user_";
		 dow_doc_path = "../scripts_php/";		 
	 }
	else
	 {
 		 this.post_img_path = "all_user_img/user_";
  		 profile_pic_path = "all_user_img/user_";
		 dow_doc_path = "scripts_php/";		 
			 
	 }

	if (str[3] != 1)
		if (str[3] == 2)	
			this.post_img_path +=  this.post_owner_id + "/" + content[1];
		else
			this.post_img_path = old_path;

this.post_div = '<div class="main_post_container" id = "'+id+'">' +
				'	<div class="post_owner_pic" style="background-image:url('+profile_pic_path+this.post_owner_id +'/profile_pic.jpg)"></div>'+
				'	<div class="post_outer">'+
				'		<div class="post_owner_name">'+
 	   			'			<a href = "profile.php?user='+this.post_owner_id+'"">'+
				'				<span>'+ this.post_owner_name +'</span>'+
		    	'			</a>'+
				'		</div>'+
				'	<div class="post_content">'+
					this.post_content ;
					if (this.post_content != '')
						this.post_div += "<br><br>";
					if (this.post_type == 2)
						this.post_div += '<img height = 400 src = "'+this.post_img_path+'">';
					else if (this.post_type != 1)
						this.post_div += '<span style="text-decoration:none;color:#82ab00;">'+this.post_img_path+
										'&ensp;&ensp;</span>'+
										'<a href = "'+dow_doc_path+'file_download.php?filename='+this.post_img_path+'&owner='+this.post_owner_id+'&u_type='+cuser_type+'">(Click Here To Download)</a>';
this.post_div +='	</div>'+
			   	'	<div class="post_time_container">'+ this.post_date_time + '</div>';
				if (cuser_type != 'admin')
				 {
this.post_div +='	<div class="post_review">'+
		 		'		<div class="post_review_type">'+
							'<span onclick = "toggle_like ('+id+',this)">'+
								this.toggle_like (this.post_like_flag ,'Y' , id) +
						    '</span>'+
						'</div>'+
		   		'		<div class="post_review_type"><span>Comment ('+this.no_of_comments+') </span> </div>'+
		        ' 	</div>	<!-- post_review -->'+
				
				'	<div id="comment_container">'+
					
                        
				'	</div> <!-- comment_container -->'
				 }
this.post_div +='	</div><!-- post_outer -->'+
	                

				'<div class="post_modi">'+
				'	<div class="pulldown">';
				
/*
				'		<div class="p_e_btn">'+
				'			<div class="edit_option">'+
				'				<a href="#">'+
				'					<span>Edit Post</span>'+
				'				</a>'+
				'			</div>'+
				'		</div>'+
				'		<hr />'+
*/
				if (cuser == this.post_owner_id || cuser_type == 'admin_manage' )
				 {
this.post_div +='		<div class="p_e_btn">'+
				'			<div class="edit_option">'+
				'				<a href="#">'+
				'					<span onClick = "delete_post ('+id+')">Delete Post</span>'+
				'				</a>'+
				'			</div>'+
				'		</div>'+
				'		<hr />';
				 }
if (cuser_type == 'user')
 {				 
	this.post_div +='		<div class="p_e_btn">'+
					'			<div class="edit_option">'+
					'				<a href="#">'+
					'					<span onClick = "report_post ('+id+')">Report Post</span>'+
					'				</a>'+
					'			</div>'+
					'		</div>';
 }
 if (cuser_type == 'admin_manage')
 { 
	this.post_div +='		<div class="p_e_btn">'+
					'			<div class="edit_option">'+
					'				<a href="#">'+
					'					<span onClick = "report_post ('+id+')">Refuse Request</span>'+
					'				</a>'+
					'			</div>'+
					'		</div>';
  
 }
this.post_div +=	'	</div> <!-- edit_post_pulldown --> '+
					'</div>	<!-- post_modi -->'+
					'</div>	<!-- main_post_container -->';
				
	var d_html = $('#all_post').html();		
//	alert (this.set_post());
//	alert (d_html);			
	$('#all_post').html( this.set_post() + d_html );
			
//	$('#all_post').append(this.set_post());
	if (cuser_type != 'admin')
	 {
		for (k = 0 ; k < this.no_of_comments*3 ; k+=3)
		 {
			this.construct_comment(id , comment_str[k] , comment_str[k+1] , comment_str[k+2]);
		 }
		if (cuser_type != 'admin_manage') 
		this.new_comment(id);	//	Adding comment box for current user (first time)
	 }
 }
 			/*		Post Attributes		*/
 
 post.prototype.post_id = '';
 post.prototype.post_owner_id ='';
 post.prototype.post_owner_name = '';
 post.prototype.post_type ='';
 post.prototype.post_content='';
 post.prototype.post_img_path ='';
 post.prototype.post_date_time ='';
 post.prototype.post_likes ='';
 post.prototype.post_like_flag = 0;
 post.prototype.no_of_comments = 0;
 post.prototype.new_comment = function (id) {

	 	n_cmnt= '		<div class="comment_box">'+
				'			<div class="commenter_pic">'+
				'				<img src = "all_user_img/user_'+cuser+'/profile_pic.jpg"></div>'+
				'			<div class="comment_det_box">'+
				'			<div class="commenter_name">'+
			    '				<a href= "profile.php?user='+cuser+'"">'+
		   		'					<span>'+cusername+'</span>'+
		 		'				</a>'+
				'			</div>'+
				'			<div class="comment">'+
		 		'				<textarea onkeyup = "resize_comment ('+id+' , event ,this)" placeholder="Write a Comment..."></textarea>  '+
				'			</div> <!-- comment -->'+
		        '		</div>	<!-- comment_det_box -->'+
				'		<div class="clearfix"></div>'+
		  		'	</div> <!-- comment_box -->'+
				'	<hr />';

	 $("#"+id+" #comment_container").append(n_cmnt);

	 };
 
 post.prototype.construct_comment = function (id , commentor_id , commentor_name , comment_content) {

	 	n_cmnt= '		<div class="comment_box">'+
				'			<div class="commenter_pic">'+
				'				<img src = "all_user_img/user_'+commentor_id+'/profile_pic.jpg"></div>'+
				'			<div class="comment_det_box">'+
				'			<div class="commenter_name">'+
			    '				<a href= "profile.php?user='+commentor_id+'"">'+
		   		'					<span>'+commentor_name+'</span>'+
		 		'				</a>'+
				'			</div>'+
				'			<div class="comment">'+
		 		'				<textarea disabled="disabled" style = "background-color:#EEEEEE;">'+comment_content+'</textarea>  '+
				'			</div> <!-- comment -->'+
		        '		</div>	<!-- comment_det_box -->'+
				'		<div class="clearfix"></div>'+
		  		'	</div> <!-- comment_box -->'+
				'	<hr />';

	 $("#"+id+" #comment_container").append(n_cmnt);

	 };
  
			
 post.prototype.post_div = '';

 post.prototype.construct_post = function (post_id , uid , poname , ptype , po_cnt , po_img , po_time , po_likes , po_flag , no_of_comments)
 {

			this.post_id = post_id;
			this.post_owner_id = uid;
			this.post_owner_name = poname;
			this.post_type = ptype;
			this.post_content = po_cnt;
			this.post_img_path = po_img;
			this.post_date_time = po_time;
			this.post_likes = po_likes;
			this.post_like_flag = po_flag;
			this.no_of_comments = no_of_comments;
 };
 
 post.prototype.set_post = function () {
			return this.post_div;
	 };
		
 post.prototype.notification = function () {
//		alert (this.post_id +" " + cuser); 
/*		$.ajax({
				url: 'scripts_php/update_noti.php',
				data:{
						like_flag:this.post_like_flag ? 1 : 0, 
						u_type : cuser_type,
					 },
				type: "post",
				dataType:"html",
				context:this,
				error: function(){
						alert ('Something Gets Wrong!!!Please Try Again');
							},
				success: function( strData ){
						//alert (strData);
						//this.notification();
					},
				});
*/		

	};
 post.prototype.toggle_like = function (flag , par , id) {
	this.post_like_flag = !flag;
	if (par == "N")
	 {
		$.ajax({
				url: 'scripts_php/update_like_c.php',
				data:{
						post_id:this.post_id ,
						like_flag:this.post_like_flag ? 1 : 0, 
						post_likes:this.post_likes ,
						u_type : cuser_type,
					 },
				type: "post",
				dataType:"html",
				context:this,
				error: function(){
						alert ('Something Gets Wrong!!!Please Try Again');
							},
				success: function( strData ){
						//alert (strData);
						//this.notification();
					},
				});
	 }

	if (this.post_like_flag)
		return "Like ("+ --this.post_likes +")";
	else
		return "Unlike("+ ++this.post_likes +")";

 };

 post.prototype.fetch_comments = function (id) {
			 str = this.retrive_comment ();
	 };

post.prototype.retrive_comment = function () {
	$.ajax({
			url: 'scripts_php/fetch_comment.php',
			data:	{post_id:this.post_id ,
					 u_type:cuser_type,
			},	//have to add current user
			type: "post",
			dataType:"html",
			error: function(){
					alert ('Something Gets Wrong!!!Please Try Again');
						},
			success: function( strData ){
				//alert (strData);
				},
				
			});
	
		
	};	 



	/* ----------------------------------- DEFINING USER CLASS IN JAVASCRIPT ------------------------------- */

 function User (u_details , u_type)
  {
	 str = u_details.split (";");
	 cuser = str[0];
	 cusername = str[1];
	 cuser_type = u_type;
  }

 User.prototype.cusername = '';
 User.prototype.cuser_online_status = true || false;
 User.prototype.len ='';
 User.prototype.p = [];
 User.prototype.no_of_post = '';
 
 User.prototype.set_user_details = function () {


		if (cuser_type == 'user')
		 {
			$('#owner_name').html(cusername);			 	
			$('#holder_picture,#user_post_pic').css('background-image','url(all_user_img/user_'+cuser+'/profile_pic.jpg)');		
		 	$('#holder_picture , #user_post_pic').css('background-size','100% 100%');	 		
		 }
		else
		 {
			
		 }
	 }
 User.prototype.prepare_posts = function (cnt , str) {
	 j = 0;
	 for (i = 0  ; i < cnt ; i++ )
	  {
	  	this.p[i] = new post (str[j] , str[j+1] , str[j+2] , str[j+3] ,i);
//		this.p[i].fetch_comments(i);
		j+=4;

	  }
	this.no_of_post = i;
	 
	 };
 User.prototype.create_new_comment = function (id , content) {
	this.p[id].new_comment(id);
	this.process_comment (id , content);
  };
  
 User.prototype.process_comment = function (id , content) {

	$.ajax({
			url: 'scripts_php/add_new_comment.php',
			data:	{post_id:this.p[id].post_id ,
					 cmt_cnt:content ,
					 u_type :cuser_type,
					},	//have to add current user
			type: "post",
			dataType:"html",
			error: function(){
					alert ('Something Gets Wrong!!!Please Try Again');
						},
			success: function( strData ){
				//alert (strData);				
				},
				
			});
			
 };
 
 User.prototype.delete_reported_post = function (id)
 {

	 
		file_path = '../scripts_php/delete_report_post.php';
	alert (file_path);

	$.ajax({
			url: file_path,
			data:	{del_p_id:this.p[id].post_id,
					 type : this.p[id].post_type,
					 u_type : cuser_type,
					 user_id :this.p[id].post_owner_id,
			},
			type: "post",
			dataType:"html",
			error: function(){
					alert ('Something Gets Wrong!!!Please Try Again');
						},
			success: function( strData ){
				//alert (strData);				
				},
				
			});

 		 this.p.splice (id , 1);	 
		 $("#"+id).remove ();
 };

 User.prototype.reported_post_discard = function (id)
 {
//	 var arg = {del_p_id : this.p[id].post_id};

	 
//	 a = this.ajax_request ('scripts_php/delete_post.php' , arg , '');
	file_path = '../scripts_php/discard_report_post.php';

	$.ajax({
			url: file_path,
			data:	{del_p_id:this.p[id].post_id,
					 type : this.p[id].post_type,
					 u_type : cuser_type,
					 user_id:this.p[id].post_owner_id,
			},
			type: "post",
			dataType:"html",
			error: function(ts){
					alert ('Something Gets Wrong!!!Please Try Again' + ts.reponseText);
						},
			success: function( strData ){
				alert (strData);				
				},
				
			});

 		 this.p.splice (id , 1);	 
		 $("#"+id).remove ();

 };



 User.prototype.report_post = function (id)
 {
//	 var arg = {del_p_id : this.p[id].post_id};

	 
//	 a = this.ajax_request ('scripts_php/delete_post.php' , arg , '');
	if (cuser_type == 'admin')
		file_path = '../scripts_php/report_post.php';
	else
		file_path = 'scripts_php/report_post.php';

	$.ajax({
			url: file_path,
			data:	{del_p_id:this.p[id].post_id,
					 type : this.p[id].post_type,
					 u_type : cuser_type
			},
			type: "post",
			dataType:"html",
			error: function(){
					alert ('Something Gets Wrong!!!Please Try Again');
						},
			success: function( strData ){
				alert (strData);				
				},
				
			});

 		 this.p.splice (id , 1);	 
		 $("#"+id).remove ();

 };


 User.prototype.delete_post = function (id)
 {
//	 var arg = {del_p_id : this.p[id].post_id};

	 
//	 a = this.ajax_request ('scripts_php/delete_post.php' , arg , '');
	if (cuser_type == 'admin')
		file_path = '../scripts_php/delete_post.php';
	else
		file_path = 'scripts_php/delete_post.php';

	$.ajax({
			url: file_path,
			data:	{del_p_id:this.p[id].post_id,
					 type : this.p[id].post_type,
					 u_type : cuser_type
			},
			type: "post",
			dataType:"html",
			error: function(){
					alert ('Something Gets Wrong!!!Please Try Again');
						},
			success: function( strData ){
				//alert (strData);				
				},
				
			});

 		 this.p.splice (id , 1);	 
		 $("#"+id).remove ();

 };

 User.prototype.add_t_post = function (str , post_type , type_side) {
		var sdata;

		if (typeof (type_side) == 'undefined')
			type_side = 'user';
			
		if (type_side == 'admin')
		 {
			 file_url = '../scripts_php/addPost.php';
		 }
		else
		 {
			 file_url = 'scripts_php/addPost.php';
		 }		
	 	$.ajax({
			url: file_url,
			data:	{
						postVal:str ,
						type:post_type,
						img:'',
						u_type:type_side
					},
			type: "post",
			dataType:"html",
			error: function(){
				u_activity.html('Something Gets Wrong!!!Please Try Again');
						},
			context : this,
			success: function( strData ){
				//alert (strData);
				str = strData.split ("/*+-");
			  	this.p[this.no_of_post++] = new post (str[0] , str[1] , 0 , this.no_of_post);				
				
//				fetch_post(user_id, strData , uname);
				},
				
			});
		
	 };
User.prototype.add_d_post = function (str , file , post_type ,file_path , obj , type_side) {


		var xhr = new XMLHttpRequest();
		var ret_str;
		if (file.type == "image/jpeg" || file.type == "text/plain" || file.type == "application/pdf"
			|| file.type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
			|| file.type == "application/msword"
			|| file.type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
			|| file.type == "application/vnd.ms-excel")

		 {
//		alert (type_side);

			xhr.onreadystatechange = function(e) {

				if (xhr.readyState == 4) 
				{

					if (xhr.status == 200)
					alert (xhr.responseText);
//					 add (str , xhr.responseText , post_type  ,type_side);

					
				}
			};

			// start upload
			xhr.open("POST", file_path);
			xhr.setRequestHeader("X_FILENAME", file.name);
			xhr.send(file);
		 }

	};

User.prototype.add_gen_repo_post = function (str , file , file_path , report_type , report_year) {

//return;
		var xhr = new XMLHttpRequest();
		var ret_str;

//		alert (type_side);

			xhr.onreadystatechange = function(e) {

				if (xhr.readyState == 4) 
				{

					if (xhr.status == 200)
//						alert (xhr.responseText);
					 add_report (str , xhr.responseText , report_type , report_year);

					
				}
			};

			// start upload
			xhr.open("POST", file_path);
			xhr.setRequestHeader("X_FILENAME", file.name);
			xhr.send(file);

	};

function add_report (content , file_name , report_type , report_year)
{
//	alert (report_type);

	$.ajax({
			url: "../scripts_php/add_report.php",
			data:	{
				postVal:content ,
				file : file_name,
				report_type : report_type ,
				u_type : cuser_type,
				for_year : report_year,
			
			},

			type: "post",
			dataType:"html",
			error: function(ts){
					alert (ts.responseText + 'Something Gets Wrong!!!Please Try Again');
						},
			success: function( strData ){
				alert (strData);
				// str = strData.split ("/*+-");
				 //user.p[user.no_of_post++] = new post (str[0] , str[1] , 0 , user.no_of_post);							
				},

			});
alert ('k');
}


	
function add (content , file_name , post_type , type_side)
{
	if (typeof (type_side) == 'undefined')
		type_side = 'user';
		
	if (type_side == 'admin')
	 {
		 file_url = '../scripts_php/addDoc_1.php';
	 }
	else
	 {
		 file_url = 'scripts_php/addDoc_1.php';
	 }

	$.ajax({
			url: file_url,
			data:	{
				postVal:content ,
				file : file_name,
				p_type : post_type ,
				u_type : type_side
			
			},

			type: "post",
			dataType:"html",
			error: function(ts){
					alert (ts.responseText + 'Something Gets Wrong!!!Please Try Again');
						},
			success: function( strData ){
				//alert (strData);
				 str = strData.split ("/*+-");
				 user.p[user.no_of_post++] = new post (str[0] , str[1] , 0 , user.no_of_post);							
				},

			});

}
 
	//	'<div class="post_owner_pic"></div>'+
		'<div class="post_outer">'+
		'<div class="post_owner_name">'+
    	'<a href="#">'+
		'<span>Harsh Soni</span>'+
    	'</a>'+
		'</div>'+
		'<div class="post_content">'+
		'What is a RACE ???...........A real race is when you are trying to finish off the  Paani Poori,before the Paani Poori boy puts the next one into the plate!'+
        '</div>'+
	   	'<div class="post_time_container">11/10/2013 00:00</div>'+
		'<div class="post_review">'+
 		'<div class="post_review_type"><span>Like (50) </span> </div>'+
   		'<div class="post_review_type"><span>Comment (50) </span> </div>'+
        ' </div>	<!-- post_review -->'+
 		'<div id="comment_container">'+
 		'<div class="comment_box">'+
		'<div class="commenter_pic"></div>'+
		'<div class="comment_det_box">'+
		'<div class="commenter_name">'+
        '<a href="#">'+
   		'<span>Harsh Soni</span>'+
 		'</a>'+
		'</div>'+
		'<div class="comment">'+
 		'<textarea  onkeyup="textAreaAdjust(this)" onKeyPress="enterpressalert(event, this)" placeholder="Write a Comment..."></textarea>  '+
		'</div>'+
        '</div>'+
		'<div class="clearfix"></div>'+
  		'</div> <!-- comment_box -->'+
		'<hr />'+
		'<div class="comment_box">'+
		'<div class="commenter_pic"></div>'+
		'<div class="comment_det_box">'+
		'<div class="commenter_name">'+
		'<a href="#">'+
 		'<span>Harsh Soni</span>'
		'</a>'+
		'</div>'+
		'<div class="comment">'+
		'<textarea  onkeyup="textAreaAdjust(this)" onKeyPress="enterpressalert(event, this)" placeholder="Write a Comment..."></textarea>  '+
		'</div>'+
		'</div>'+
		'<div class="clearfix"></div>'+
		'</div> <!-- comment_box -->'+
		'<hr />'+
		'<div class="comment_box">'+
		'<div class="commenter_pic"></div>'+
		'<div class="comment_det_box">'+
		'<div class="commenter_name">'+
		'<a href="#">'+
		'<span>Harsh Soni</span>'+
		'</a>'+	
		'</div>'+
		'<div class="comment">'+
		'<textarea  onkeyup="textAreaAdjust(this)" onKeyPress="enterpressalert(event, this)" placeholder="Write a Comment..."></textarea>  '+
		'</div>'+
		'</div>'+
		'<div class="clearfix"></div>'+
		'</div> <!-- comment_box -->'+
                        
		'</div> <!-- comment_container -->'+
		'</div><!-- post_outer -->'+
	                
		'<div class="post_modi">'+
		'<div class="pulldown">'+
		'<div class="p_e_btn">'+
		'<div class="edit_option">'+
		'<a href="#">'+
		'<span>Edit Post</span>'+
		'</a>'+
		'</div>'+
		'</div>'+
		'<hr />'+
		'<div class="p_e_btn">'+
		'<div class="edit_option">'+
		'<a href="#">'+
		'<span>Delete Post</span>'+
		'</a>'+
		'</div>'+
		'</div>'+
		'<hr />'+
		'<div class="p_e_btn">'+
		'<div class="edit_option">'+
		'<a href="#">'+
		'<span>Report Post</span>'+
		'</a>'+
		'</div>'+
		'</div>'+
		'</div>'+
		'</div>	<!-- post_modi -->'+
		 		'		<div class="comment_box">'+
				'			<div class="commenter_pic"></div>'+
				'			<div class="comment_det_box">'+
				'			<div class="commenter_name">'+
			    '				<a href="#">'+
		   		'					<span>Harsh Soni</span>'+
		 		'				</a>'+
				'			</div>'+
				'			<div class="comment">'+
		 		'				<textarea id = "cmnt" onkeyup="add_cmnt()" placeholder="Write a Comment..."></textarea>  '+
				'			</div> <!-- comment -->'+
		        '		</div>	<!-- comment_det_box -->'+
				'		<div class="clearfix"></div>'+
		  		'	</div> <!-- comment_box -->'+
				'	<hr />'+
		'</div>	<!-- main_post_container -->'
            


