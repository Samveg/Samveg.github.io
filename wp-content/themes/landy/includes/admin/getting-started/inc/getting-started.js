(function($) {

	gettingStartedTabs();
	gettingStartedScroll();
	gettingStartedToTop();
	gettingStartedLoading();

	function gettingStartedTabs() {
		// Tabs
		$( ".inline-list" ).each( function() {
			$( this ).find( "li" ).each( function(i) {
				$( this).click( function(){
					$( this ).addClass( "current" ).siblings().removeClass( "current" )
					.parents( "#wpbody" ).find( "div.panel-left" ).removeClass( "visible" ).end().find( 'div.panel-left:eq('+i+')' ).addClass( "visible" );
					return false;
				} );
			} );
		} );
	}

	function gettingStartedScroll() {
		// Scroll to anchor
		$( ".anchor-nav a, .toc a" ).click( function(e) {
			e.preventDefault();
			var href = $( this ).attr( "href" );
			$( "html, body" ).animate( {
				scrollTop: $( href ).offset().top - 50
			}, 'slow', 'swing' );
		} );
	}

	function gettingStartedToTop() {
		// Back to top links
		$( "#help-panel.panel-left h1, #help-panel.panel-left h4" ).append( $( "<a class='back-to-top' href='#panel'>Back to top</a>" ) );
		// Scroll to top
		$( ".back-to-top").on('click', function() {
		 	$("html, body").animate({ scrollTop: 0 }, "slow");
		 	return false;
		});
	}

	function gettingStartedLoading() {
		// Install Button
		$( ".install-now.button").on('click', function() {
			$(this).text('Installing');
		 	$(this).addClass('loading');
		});
	}

})(jQuery);