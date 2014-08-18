(function( $ ){
	$.fn.fixToViewport = function(margins) {
   
		//outerHeight() does not include element margins so cater for that
		var marginHeight = margins

		return this.each(function(index) { 
			
			// Init Properties
			var self = $(this);
		
			// Set position on Init
			_setPositioning();
		
			// Bind Events
			$.Window.bind('resize', function() {
			    _setPositioning();
			});
		
			// Functions
			function _setPositioning(){
			
				winHeight = $.Window.height();
				headerHeight = $.Header.outerHeight();
				contentHeight = $.Content.outerHeight();
				footerHeight = self.outerHeight();
			

				if(winHeight > (contentHeight+footerHeight+headerHeight+marginHeight)){
					self.removeClass('relative');
					self.addClass('fixed');
				}else{
					self.removeClass('fixed');
					self.addClass('relative');
				}
			
			}
		
	
			return this;
		});
	  
	} // searchBox
})( jQuery );