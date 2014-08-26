jQuery(document).ready(function($){
	// Put spans around H2 elements tu cut out background
	$('h2').html(function(){
		var title = "<span>" + $(this).html() + "</span>";
		$(this).html(title);
	});

	// Generic function to initialize prettyPhoto
	function init_prettyPhoto(target) {
		var gallery_name = 'prettyPhoto[' + target + ']';

		$(target + ' a').attr('rel', gallery_name);
		$("a[rel^='" + gallery_name + "']").prettyPhoto();
		$(target + ":first a[rel^='" + gallery_name + "']").prettyPhoto({
			animation_speed:'normal',
			slideshow:8000,
			social_tools:false,
			autoplay_slideshow: false,
			overlay_gallery:false,
			show_title: true,
			allow_resize: true,
			default_width: 320,
			wmode: 'opaque',
			theme: 'dark_rounded'
		});
	}

	init_prettyPhoto('.events');
});