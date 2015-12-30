// JavaScript Document

function chg_img(name , image)
{
	ele = document.getElementById(name);
    ele.style.backgroundImage = image;
}

function resize ()
 {
	var ele = document.getElementById('right_container');
	var ele1 = document.getElementById('middle_container');	
	ele.style.height = ele1.offsetHeight - 1 + "px";
 }
 
function take_windowSize()
{
	var window_height = window.innerHeight;
	var window_width = window.innerWidth;
	
	var elePannel = document.getElementById('side_pannel');
	width = parseInt ((window_width * 2 )/100);
	elePannel.style.width = width + 'px';
}




