$(document).ready(function(){
	
$("body").niceScroll({
cursorcolor:"#2c3e50",
cursorwidth:"11px"
});


	
	

	var scrollButton= $("#Scroll-top");

$(window).scroll(function()
	 {
	
	if($(this).scrollTop()>= 700)
		{
			scrollButton.show();
		}
	else
		{
			scrollButton.hide();
		}


   });
	
	

	scrollButton.click(function(){
	$("html,body").animate({scrollTop : 0},600);
		
		
	});	
	
		
});
	

