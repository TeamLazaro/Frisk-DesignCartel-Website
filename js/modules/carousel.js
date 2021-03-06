
/*
 *
 * This handles the interaction of the arrow buttons on either side of the
 * 	carousel.
 *
 */
$( document ).on( "click", ".js_carousel_container .js_pager", function ( event ) {

	/*
	 * 1. Get references to all the relevant elements
	 */
	var $carouselArrowButton = $( event.target ).closest( ".js_pager" );
	var domCarouselContent = $carouselArrowButton
				.closest( ".js_carousel_container" )
				.find( ".js_carousel_content" )
				.get( 0 );

	/*
	 * 2. Figure out the "current" carousel item, i.e. the one that's in the center
	 */
	var { top, left, width, height } = domCarouselContent.getBoundingClientRect();
	// We get the bottom padding of the carousel because we want it to be
	//  	carousable even when the carousel is just about off the screen.
	var carouselPaddingBottom = parseInt( getComputedStyle( domCarouselContent ).paddingBottom, 10 );
	var contentXMidpoint = left + width / 2;
	var contentYPoint = top + ( height - carouselPaddingBottom - 1 );
	var domCurrentItem = document.elementFromPoint( contentXMidpoint, contentYPoint );
	// This loop is for when the carousel items are of uneven heights
		// and sometimes the parent element gets selected
	for ( var _i = 1; _i <= 5; _i += 1 ) {
		if ( ! $( domCurrentItem ).hasClass( "js_carousel_content" ) )
			break;
		contentYPoint = ( 4 / 5 ) * contentYPoint;
		domCurrentItem = document.elementFromPoint( contentXMidpoint, contentYPoint );
	}
	var $currentItem = $( domCurrentItem ).closest( ".js_carousel_item" );

	/*
	 * 3. Get the "next" carousel item in the sequence
	 * 	This could be either the preceeding or the following item,
	 * 	depending on the arrow's direction.
	 */
	var $nextItem;
	var scrollDirection = $carouselArrowButton.data( "dir" );
	if ( scrollDirection == "left" )
		$nextItem = $currentItem.prev( ".js_carousel_item" );
	else
		$nextItem = $currentItem.next( ".js_carousel_item" );

	/*
	 * 4. Get the amount of scroll that has to be done to center the next item
	 */
	var scrollOffset;
	if ( $nextItem.length )
		scrollOffset = ( $nextItem.get( 0 ).offsetLeft + $nextItem.innerWidth() / 2 )
						- ( width / 2 );
	else	// there is no "next" item because the current one is at the boundary
		return;

	/*
	 * 5. Finally, scroll the carousel.
	 */
	try {
		domCarouselContent.scrollTo( { left: scrollOffset, behavior: "smooth" } );
	}
	catch ( e ) {
		domCarouselContent.scrollTo( scrollOffset, 0 );
	}

} );
