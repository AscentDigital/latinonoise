<?php  
	get_header();
	$thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(), '', false);
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
<!--==============================content================================-->
		<div class="content">
			<div class="container">
				<div class="row">





					<!-- NOTICIAS POST -->
					<div class="col-md-9 col-sm-12 col-xs-12">
						<div class="section" data-appear-animation="fadeInDown"
								 data-appear-animation-delay="1150">
							<div class="tabs">
								<!--tabs navigation-->
								<div class="clearfix tabs_conrainer">
									<ul class="tabs_nav clearfix">
										<li class="">
											<a href="#tab-1">
												<h1 class="text-accent"><?php the_title(); ?></h1> 
											</a>
										</li>
									</ul> 
								</div>
							</div> 

							<div class="row">
								<div class="col-sm-1">
									<div class="vertical-text-wrapper">
										<h2 class="vertical-text text-primary"><?php echo get_field('side_title'); ?></h2>
									</div>
								</div>
								<div class="col-sm-11">
									<div class="text_post_section">
										<div class="img_position_left scale_width_250">
											<div>
												<img src="<?php echo get_field('main_image'); ?>" alt="">
											</div>
											<div class="blockquotes">
												<div class="text-primary">“<?php echo get_field('event_quote'); ?>”</div>
												<!-- <div>John Doe, New York</div> -->
											</div>

											<div class="text_post_section add_this">
												<span>Share this:</span>
												<div>
													<!-- AddThis Button BEGIN -->
													<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
														<a class="addthis_button_preferred_1"></a>
														<a class="addthis_button_preferred_2"></a>
														<a class="addthis_button_preferred_3"></a>
														<a class="addthis_button_preferred_4"></a>
														<a class="addthis_button_compact"></a>
														<a class="addthis_counter addthis_bubble_style"></a>
													</div>
													<!-- AddThis Button END -->
												</div>
											</div>
										</div>
										<h3 class="text-accent"><i class="fa fa-calendar"></i> <?php echo get_field('event_date'); ?></h3>
										<h3 class="text-muted"><i class="fa fa-clock-o"></i> <?php echo get_field('start_event_time'); ?> - <?php echo get_field('end_event_time'); ?></h3>
										<h3 class="text-accent"><i class="fa fa-map-marker"></i> <?php echo get_field('event_place'); ?></h3>
										<?php the_content(); ?>
											<br>
											<div>
												<?php 
												$location = get_field('map');
												if( !empty($location) ):
												?>
												<div class="acf-map gmap_canvas" style="height:150px;width:100%;"> 
													<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
												</div>
												<?php endif; ?>
												<script type="text/javascript"> 
							                  		function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(40.805478,-73.96522499999998),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(40.805478, -73.96522499999998)});infowindow = new google.maps.InfoWindow({content:"<b>Sample City</b><br/>2880 Broadway<br/> New York" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
							                  	</script>
							                  	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKgJAGBBrev_I8nHkMt8eTzvIeiVAXaME"></script>
											</div>
									</div>
								</div>
							</div>


							<div class="row">
								<div class="col-md-12">
									<div class="section read_post_list gallery_list">
										<h2 class="section_title text-primary">
											VIDEOS
										</h2><br>
										
										<!--  -->
										<?php if(count(get_field('videos')) > 1){ ?>
										<div id="owl-demo-3" class="owl-carousel">
										<?php
											// check if the flexible content field has rows of data
											if( have_rows('videos') ):
											 $counter = 0;
											     // loop through the rows of data
											    while ( have_rows('videos') ) : the_row();

											        if( get_row_layout() == 'video_layout' ): ?>
											        <div class="item">
														<div class="iframe_video_container">
															<?php the_sub_field('video');?>
														</div>
													</div>
											<?php
											        endif;

											    endwhile;

											else :

											    // no layouts found

											endif;

										?>
										</div>
										<?php }else if(count(get_field('videos')) == 1){ ?>
											<?php
											// check if the flexible content field has rows of data
											if( have_rows('videos') ):
											 $counter = 0;
											     // loop through the rows of data
											    while ( have_rows('videos') ) : the_row();

											        if( get_row_layout() == 'video_layout' ): ?>
											        <div class="item">
														<div class="iframe_video_container">
															<?php the_sub_field('video');?>
														</div>
													</div>
											<?php
											        endif;

											    endwhile;

											else :

											    // no layouts found

											endif;
											?>
										<?php } ?>
										<!--  -->


									</div>
								</div>
							</div>


						</div>
					</div>
					<!-- END EVENTO POST  -->






					<!-- SIDEBAR -->
                    <div class="col-md-3 col-sm- col-xs-12">
                        <div class="section" data-appear-animation="fadeInDown" data-appear-animation-delay="1150">
							<?php adzone('noticias'); ?>
                        </div>
                    </div>
                    <!-- END SIDEBAR -->



				</div> 


				
			</div>
		</div>

<script type="text/javascript">
(function($) {

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/

function new_map( $el ) {
	
	// var
	var $markers = $el.find('.marker');
	
	
	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
	
	
	// create map	        	
	var map = new google.maps.Map( $el[0], args);
	
	
	// add a markers reference
	map.markers = [];
	
	
	// add markers
	$markers.each(function(){
		
    	add_marker( $(this), map );
		
	});
	
	
	// center map
	center_map( map );
	
	
	// return
	return map;
	
}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
// global var
var map = null;

$(document).ready(function(){

	$('.acf-map').each(function(){

		// create map
		map = new_map( $(this) );

	});

});

})(jQuery);
</script>			
<?php endwhile; endif;  
	get_footer();
?>