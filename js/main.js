 jQuery(document).ready(function($){
	
	$.Window = $(window);
	$.Page 	 = $('#page');
	
	$.Header = $('#header');
	$.Content = $('#main');
	$.Footer = $('#footer');
	
	$.Footer.fixToViewport(50);
	
	//------------
	//ROXY Sign
	var flashvars = {};
	var params = {};
		params.quality = "high";
		params.wmode = "transparent";
	var attributes = {};
	swfobject.embedSWF(  Drupal.settings.basePath + "sites/all/themes/roxy/flash/sign_v2.swf", "roxy-sign", "215", "661", "9.0.0", '', flashvars, params, attributes);
	//------------
	$('.page-container').each( function() { $(this).addHeadingLine() } );
	$('.pane-content').each( function() { $(this).addHeadingLine() } );
	//------------
	if( $('.main-left').height() > $('.main-right').height() ){
		$('.main-right').css( "height", $('.main-left').height() );
	}else{
		$('.main-left').css( "height", $('.main-right').height() );
	}
	//------------
});

(function($) {
 /* -------------Page Headings, extra lines------------- */
  $.fn.addHeadingLine = function() {
	//---
	if( $(this).find('.title').length ){
		//---
		var $self = $(this)
			$pageTitle = $(this).find('.title');
			$leftMargin = ( ($self.width() + 5) - $pageTitle.width() )/2;
		//---
	}else if( $(this).find('.pane-title').length ){
		//---
		var $self = $(this)
			$pageTitle = $(this).find('.pane-title');
			$leftMargin = ( ($self.width() - 60) - $pageTitle.width() )/2;
		//---
	}
	//--- 
	$pageTitle.css( { 'margin-left': $leftMargin } );
  }
})(jQuery);