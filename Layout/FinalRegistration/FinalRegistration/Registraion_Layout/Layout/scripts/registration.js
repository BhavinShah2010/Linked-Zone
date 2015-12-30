// JavaScript Document
$(document).ready(function(e) {
	bodyCt = document.getElementsByTagName('body')[0];
	bodyCt.style.width = window.innerWidth + "px";
	bodyCt.style.height = window.innerHeight + "px";

//	logoCt = document.getElementById('logo');
	mainCt = document.getElementById('mainContainer');	// mainContainer
	mySet.setWH (bodyCt , mainCt , 65 , 85);	
	boxPn  = document.getElementById('boxPanel');	//boxPanel
	mySet.setWH (bodyCt , boxPn ,65 , 1);	
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
	$('#boxPanel').animate({marginTop:'5%'} , 600);

});
	
	