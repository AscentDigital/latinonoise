<?php
	get_header();
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
												<h2 class="text-accent">MÚSICA</h2> 
											</a>
										</li>
									</ul> 
								</div>
							</div> <br>

							<!-- Rows -->
							<div class="row">
								<?php  
									if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
									elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
									else { $paged = 1; }
							        $args = array(
							            'post_type' => 'musicas',
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
								?>
								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="scale_image_container">
										<div class="button banner_button banner-title orange"><?php echo get_field('artist_name'); ?></div>
										<a href="<?php the_permalink(); ?>"><img
												 src="<?php echo get_field('main_image'); ?>" alt=""
												 class="scale_image" /></a>
										<!--caption-->
										<div class="caption_type_1">
											<div class="caption_inner">
												<a href="<?php the_permalink(); ?>">
													<h2><small><?php the_title(); ?></small></h2>
												</a>
											</div>
										</div>
									</div>
								</div>
								<?php } } wp_reset_query(); ?>
							</div>

							 
							

							<!-- ADvertisement -->
							<div class="row">
								<div class="col-md-12">
									<div class="section t_align_c">
										<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/728x90.jpg" alt=""></a>
									</div><br><br><br>
								</div>
							</div>

							<?php get_template_part('pagination'); ?>

						</div>
					</div>
					<!-- END NOTICIAS POST  -->






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
<?php
	get_footer();
?>