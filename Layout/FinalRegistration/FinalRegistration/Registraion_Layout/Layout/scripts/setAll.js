// JavaScript Document
var mySet = (function () {
//	var sW = window.innerWidth;
//	var sH = window.innerHeight;
	return {
			setWH : function (pEle , ele , perW , perH)
			 {
				sW = pEle.style.width;
				sH = pEle.style.height;
				ele.style.width  = parseInt (sW) * perW / 100 + "px";
				ele.style.height = parseInt (sH) * perH / 100 + "px";
			 } ,
			setW : function (ele , perW)
			 {
				 	ele.style.width = sW * perW / 100 + "px";
			 } ,
			
			iterate : function (Pele , ele , val , flag)
			 {
				width = parseFloat (Pele.style.width);
				height = parseFloat (Pele.style.height);

				if (flag == 'W')
					for (i = 0 ; i < ele.length ; i++)	 
						ele[ i ].style.width = width * val / 100 + "px";

				else
					for (i = 0 ; i < ele.length ; i++)	 
						ele[ i ].style.height = height * val / 100 + "px";
				
					
		 	 } 
			 
		}
	
	}) ();

	
$(document).ready(function(e) {
	bodyCt = document.getElementsByTagName('body')[0];
	bodyCt.style.width = window.innerWidth + "px";
	bodyCt.style.height = window.innerHeight + "px";

//	logoCt = document.getElementById('logo');
	mainCt = document.getElementById('mainContainer');	// mainContainer
	mySet.setWH (bodyCt , mainCt , 60 , 72);	
	boxPn  = document.getElementById('boxPanel');	//boxPanel
	mySet.setWH (bodyCt , boxPn ,60 , 1);	
	formCt = document.getElementById('formContainer');	// formContainer
	mySet.setWH (mainCt , formCt , 80 , 75);		
	formNode = document.getElementsByClassName('node');	// node
	mySet.iterate (formCt , formNode , 40 , 'W');
	mySet.iterate (formCt , formNode , 15 , 'H');	
	formNodeDet = document.getElementsByClassName('nodeDet');	// node details
	mySet.iterate (formCt , formNodeDet , 90 , 'W');	
/*	btmPn = document.getElementById('bottomPanel');
	btm = document.getElementById('bottom');
	mySet.setWH (bodyCt , logoCt , 10 , 17);



	mySet.setWH (btmPn , 80 , 20);
	mySet.setWH (btm , 80 , 5);	
	
   */
	$('#boxPanel').animate({marginTop:'3%'} , 600);

});
	
	