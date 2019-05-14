<?php  
	get_header();
	if ( have_posts() ) : while ( have_posts() ) : the_post();
	$temp_id = get_the_id();
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
												<h1 class="text-accent"><?php the_title(); ?></h1> <br>
											</a>
										</li>
									</ul> 
								</div>
							</div> 

							       <div class="row">
						                <div class="col-md-5">
						                  <div class="scale_image_container favoritos-thumb full">
						                    <a href="./favoritos-item.html"><img
						                           src="<?php echo get_field('main_image'); ?>"
						                           alt=""
						                           class="scale_image "></a>
						                    <div class="fav fav-ropa"></div>
						                  </div>
						              
						              
						                  <div class="blockquotes">
						                    <div class="text-primary">“<?php echo get_field('additional_text'); ?>”</div>
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
						                <div class="col-md-7 text_post_section">
						                  <h3 class="text-accent"><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></h3>
						                  <h3 class="text-primary"><i class="fa fa-phone"></i> <a href="tel:(857) 706-1125" class="text-primary"><?php echo get_field('phone'); ?></a></h3>
						                  <h3 class="text-accent"><i class="fa fa-map-marker"></i> <?php echo get_field('direction_1'); ?></h3>
						                  <h3 class="text-primary"><i class="fa fa-globe"></i> <a class="text-primary"
						                       href="<?php echo get_field('website'); ?>">Visit Website</a></h3>
						                  <?php the_content(); ?>
						              
						                  <br>
						                  <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
						                    <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div>
						                    <script>(function () {
						                        var setting = { "height": 208, "width": "100%", "zoom": 9, "queryString": "Houston, Texas, USA", "place_id": "ChIJAYWNSLS4QIYROwVl894CDco", "satellite": false, "centerCoord": [29.8176089349092, -95.40129145000003], "cid": "0xca0d02def365053b", "id": "map-9cd199b9cc5410cd3b1ad21cab2e54d3", "embed_id": "29010" };
						                        var d = document;
						                        var s = d.createElement('script');
						                        s.src = 'https://1map.com/js/script-for-user.js?embed_id=29010';
						                        s.async = true;
						                        s.onload = function (e) {
						                          window.OneMap.initMap(setting)
						                        };
						                        var to = d.getElementsByTagName('script')[0];
						                        to.parentNode.insertBefore(s, to);
						                      })();</script><a href="https://1map.com/map-embed?embed_id=29010">Maps by 1Map</a>
						                  </div>
						                </div>
						              </div>
						</div>
					</div>
					<!-- END FAVORITO POST -->






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
<?php  endwhile; endif; 
	get_footer();
?>