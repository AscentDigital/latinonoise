<?php  
	get_header();
	$thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(), '', false);
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
<!--==============================content================================-->
		<div class="content">
			<div class="container">
				<div class="row">





					<!-- CHICA POST -->
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
						                        <h2><?php echo get_field('chicas_details'); ?></h2>
												<small class="text-primary"><?php echo get_the_date(); ?></small>
											</a>
										</li>
									</ul> 
								</div>
							</div> 

							<div class="row">
								<div class="col-md-12">
									<div class="text_post_section">
										<div class="img_position_left scale_width_250">
											<div>
												<img src="<?php echo get_field('main_image'); ?>" alt="">
											</div>
											<div class="blockquotes">
												<div class="text-primary">“<?php echo get_field('chicas_quote'); ?>”</div>
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
										<?php the_content(); ?>
										<p>
					                      <b>Official Website</b><br>
					                      <a class="" href="<?php echo get_field('website'); ?>"
					                       target="_blank"><?php echo get_field('website'); ?></a></p>
					                    <p>
					                      <b>Twitter</b><br>
					                      <a class="" href="<?php echo get_field('twitter'); ?>"
					                         target="_blank"><?php echo get_field('twitter'); ?></a></p>
					                    <p>
					                      <b>Facebook</b><br>
					                      <a class="" href="<?php echo get_field('facebook'); ?>"
					                          target="_blank"><?php echo get_field('facebook'); ?></a></p>
					                    <p>
					                      <b>Instagram</b><br>
					                      <a class="" href="<?php echo get_field('instagram'); ?>"
					                         target="_blank"><?php echo get_field('instagram'); ?></a></p>
									</div>
								</div>
							</div>


							<div class="row">
								<div class="col-md-12">
									<div class="section read_post_list gallery_list">
										<h2 class="section_title text-primary">FOTOS</h2>
										<ul class="row">
											<!--Post-->
											
											<?php 
											$images = get_field('gallery');
											foreach ($images as $image) {
											?>
											<li class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
												<div class="section_post_left">
													<div class="scale_image_container with_buttons">
														<a href="#"><img src="<?php echo $image['url']; ?>" alt="" class="scale_image"></a>
														<div class="open_buttons clearfix">
															<div class="f_left"><a href="<?php echo $image['url']; ?>" target = "_blank" role="button"
																   class="jackbox jackbox_button button button_grey_light"
																   data-group="gallery_1"><i class="fa fa-search-plus"></i></a></div>
														</div>
													</div>
												</div>
											</li>
											<?php } ?>
										</ul> 
										 
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


									</div>
								</div>
							</div>


						</div>
					</div>
					<!-- END CHICA POST  -->






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
<?php endwhile; endif;  
	get_footer();
?>