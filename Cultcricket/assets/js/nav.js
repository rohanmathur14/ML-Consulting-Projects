$(document).ready(function(){
	$(".menubar").click(function(){
		$(".mobile-nav-links").addClass("active");
	});

	$(".closeNav").click(function(){
		$(".mobile-nav-links").removeClass("active");
	});

	$(".dropdown").click(function(){
		// $(this).parent(".drop-con").show();
		$(this).children(".drop-con").animate({left: '0px'});
		$(this).children(".drop-con").css("opacity", "1");
	});

	$(".drop-con .top").click(function(){
		$(this).parent(".drop-con").animate({left: '-5000px'});
		$(this).parent(".drop-con").animate({opacity: '0'});
	});
});