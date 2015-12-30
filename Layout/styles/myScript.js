// JavaScript Document
// JavaScript Document

	


$(document).ready(function() {
	scWidth = window.innerWidth;
/*//	scHeight = window.innerHeight;
	
    mainOuterCt = document.getElementById('mainOuter');
	sidePanelCt = document.getElementById('sidePannel');
	header_panel = document.getElementsByClassName('btnPanel')[0];	//header_panel
	header_panel_btn = document.getElementsByClassName('btn');		//header_panel button
	
//	mainOuterCt.style.width = (scWidth)+ 'px';
//	mainOuterCt.style.height = (scHeight-2)+ 'px';

	mySet.iterate (header_panel , header_panel_btn , 14.5 , 'W');	//Setting width of button
	mySet.iterate (header_panel , header_panel_btn , 80 , 'H');		//setting height of button
	*/

	rightSlider ();
	leftSlider ();

	//sidePanelCt.style.width = mySet.setWH (mainOuterCt , sidePanelCt , 4.5 , 100);
}); 

function rightSlider ()
 {
	btFlag = true;
    $('#bt1').click(function(e) {
		slider = $('#slider');
		//slider.css("right","0%");
		
		if (btFlag == true)
		 {
			 slider.animate({right:"0%"},500);
			 $("#slider li .contentLi").animate({"padding-left":"0%"},50);
			if (slider.css('right') == '-30%')
			 { 
				// slider.animate({width:'25%'});
				
				$('#slider span').fadeIn(200);				
				$('#slider span').animate({left:'1%'},500);			
				$('#slider hr').fadeIn(50);
				$('li').animate({left:'0%'});
				$('li').fadeIn(900);
		
	
			 }
			 			btFlag = false;
			 		
			 
		 }
		else
		 {
			 
			// slider.css("visibility","hidden");
	        slider.animate({right:'-30%'},500);
			$("#slider li .contentLi").animate({"padding-left":"7%"},1000);
			/*$('#slider span').fadeOut(200);
			$('#slider hr').fadeOut(50);	
			$('li').animate({left:'3%'});					
			$('li').fadeOut(100);			
			$('#slider span').animate({left:'7%'},500);*/								
			btFlag = true;			
			 
		 }
	});
 }

function leftSlider ()
 {
	scWidth = document.getElementById('mainOuter').offsetWidth;
	ele = $('#sidePannel'); 
	size = ((scWidth) * 5 / 100) + 'px';
	$(ele).hover(
		function () {

			if (ele.css('width') == size+1)				
			 {
				 ele.animate({width:'15%'});
			 }

		},
		
		function () {
 				 ele.animate({width:'5%'});			
		}
	 ); 
 } 
