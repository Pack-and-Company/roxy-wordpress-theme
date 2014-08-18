jQuery(document).ready(function($){
	// Put spans around H2 elements tu cut out background
	$('h2').html(function(){
		var title = "<span>" + $(this).html() + "</span>";
		$(this).html(title);
	});
});