<?php  
	get_header();
?>
<!--==============================content================================-->
		<div class="content">
			<div class="container">
				<div class="row">





					<!-- FAVORITOS LIST -->
					<div class="col-md-9 col-sm-12 col-xs-12">
						<div class="section" data-appear-animation="fadeInDown"
								 data-appear-animation-delay="1150">
							<div class="tabs">
								<!--tabs navigation-->
									<div class="clearfix tabs_conrainer">
										<ul class="tabs_nav clearfix">
											<li class="">
												<a href="#tab-1">
													<h3 class="text-primary">LATEST</h3>
												</a>
											</li>
										</ul><a href="#" id="sort_button" class="f_right color_grey_2"><i
												 class="fa fa-bars f_size_medium"></i> <small>SORT</small></a>
										<ul class="sort_list">
											<li><a href="./noticias.html?sort=latest">Latest</a></li>
											<li><a href="./noticias.html?sort=oldest">Oldest</a></li>
										</ul>
	                				</div><br>

					                <!-- 1 row -->
					                <div class="row">
                                	<?php  
									if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
									elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
									else { $paged = 1; }
							        $args = array(
							            'post_type' => 'favoritos',
								        'paged' => $paged,
										'page' => $paged,
								        'posts_per_page' => 12,
							            'order' => 'DESC',
							            'orderby' => 'post_date'
							        );
							        $query = new WP_Query($args);
							        if($query->have_posts()){
							        	$counter = 1;
							        	while($query->have_posts()){
							        		$query->the_post();
							        		$thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(), '', false);
							        		$con = get_the_content();
							        		$mon = date('M' , strtotime(get_the_date()));
							        		$day = date('d' , strtotime(get_the_date()));
									?>
					                  <div class="col-lg-6 col-md-12 col-sm-12 clearfix">
					                    <div class="scale_image_container favoritos-thumb">
					                      <a href="<?php the_permalink(); ?>"><img
					                             src="<?php echo get_field('main_image') ?>"
					                             alt=""
					                             class="scale_image "></a>
					                      <div class="fav fav-salud"></div>
					                    </div>
					                    <div class="wrapper">
					                      <div class="post_text">
					                        <h2 class="post_title"><a class="text-accent" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					                        </h2><br>
					                        <div class="clearfix">
					                          <div class="f_left">
					                            <div class="event_date"><b><span class="text-primary"><i class="fa fa-clock-o"></i> <?php echo get_the_date(); ?></span> <br> <span class="text-accent"><i class="fa fa-map-marker"></i> <?php echo get_field('direction_1') ?></span> </b></div>
					                          </div>
					                        </div>
					                        <div class="clearfix">
					                          <a href="<?php the_permalink(); ?>" class="btn-custom button button_type_icon_small button_orange">Mas
					                            Infromation<i
					                               class="fa fa-chevron-right"></i></a>
					                        </div>
					                      </div>
					                    </div>
					                  </div>
					            	  <?php } } wp_reset_query(); ?>
					                
					                
					                  <!--  -->
					                </div>
                 
					                <!-- ADrow -->
					                <div class="row">
					                  <div class="col-md-12">
					                    <div class="section t_align_c">
					                      <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/728x90.jpg" alt=""></a>
					                    </div><br><br>
					                  </div>
					                </div>
					                
					                  <!--  -->
					                </div>

					                <?php get_template_part('pagination'); ?>

							</div>
						</div>
					<!-- END FAVORITOS LIST  -->






          		 	<!-- SIDEBAR -->
					<div class="col-md-3 col-sm- col-xs-12">
						<div class="section" data-appear-animation="fadeInDown" data-appear-animation-delay="1150">
							<?php adzone_bottom('musicas'); ?>
						</div>
					</div>
					<!-- END SIDEBAR -->



				</div> 


				
			</div>
		</div>
<?php  
	get_footer();
?>