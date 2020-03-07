<?php  
	get_header();
?>
<!--==============================content================================-->
		<div class="content">
			<div class="container">
				<div class="row">
					
					<!-- NOTICIAS LIST -->
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
								</div>
								<!--tabs content-->
								<div class="tabs_content post_var_inline small_post_list ">
									<div id="tab-1">
										<ul class="vertical_list">
											<?php  
            									if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
												elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
												else { $paged = 1; }
										        $args = array(
										            'post_type' => 'noticias',
											        'paged' => $paged,
											        'page' => $paged,
											        'posts_per_page' => 1,
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
											?>
											<!-- ITEM -->
											<li class="clearfix">
												<div class="scale_image_container scale_285">
													<a href="<?php the_permalink(); ?>"><img
																 src="<?php echo get_field('main_image'); ?>"
																 alt=""
																 class="scale_image "></a>
													<div class="post_image_buttons"><a href="<?php the_permalink(); ?>"
															 class="icon_box"><i class="fa fa-plus"></i></a>
													</div>
												</div>
												<div class="wrapper">
													<div class="post_text">
														<h2 class="post_title"><a class="text-accent" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														</h2><br>
														<div class="clearfix">
															<div class="f_left">
																<div class="event_date text-primary"><b>July 01, 2014</b></div>
															</div>
														</div> 
														<small><?php echo substr($con,0,250); ?> […]</small>
															<div class="clearfix">
																<a href="<?php the_permalink(); ?>" class="btn-custom button button_type_icon_small button_orange">LEER MAS<i
																		 class="fa fa-chevron-right"></i></a>
															</div>
													</div>
												</div>
											</li>
											<?php } } wp_reset_query(); ?>
											
											<!-- Divider -->
											<li class="clearfix">
												<div class="section t_align_c">
													<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/728x90.jpg" alt=""></a>
												</div>
											</li>


										</ul>
										<ul class="more_news"></ul>
									</div>
									<?php get_template_part('pagination'); ?>
								</div>
							</div>
						</div>
					</div>
					<!-- END NOTICIAS LIST  -->






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