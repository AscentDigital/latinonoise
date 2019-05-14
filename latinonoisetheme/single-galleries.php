<?php  
	get_header();
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
<!--==============================content================================-->
		<div class="content">
			<div class="container">
				<div class="row">





					<!-- GALLERIES POST -->
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
												<small class="text-primary"><?php echo get_the_date(); ?></small>
											</a>
										</li>
									</ul> 
								</div>
                            </div>   
                            
                            <!-- Gallery row -->
							<div class="row">
								<div class="col-md-12">
									<div class="read_post_list gallery_list"> 
										<ul class="row">
											<!--Post-->
											<?php  
											$images = get_field('gallery');
											foreach ($images as $image) {
											?>
											<li class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
												<div class="section_post_left">
													<div class="scale_image_container with_buttons">
														<a href="#"><img src="<?php echo $image['url']; ?>" alt="" class="scale_image" style = "width:100%;"></a>
														<div class="open_buttons clearfix">
															<div class="f_left"><a href="<?php echo $image['url']; ?>" role="button"
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
                            

                            <!-- ADvertisement -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section t_align_c">
                                        <a href="#"><img src="https://ascentdigital.github.io/latinonoise/2017/images/papasitos.jpg" alt=""></a>
                                    </div><br><br><br>
                                </div>
                            </div>
                            
                            <!-- ADvertisement -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section t_align_c">
                                        <a href="#"><img src="https://ascentdigital.github.io/latinonoise/2017/images/bacardi.jpg" alt=""></a>
                                    </div><br><br><br>
                                </div>
                            </div>

						</div>
					</div>
					<!-- END GALLERIES POST  -->



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
<?php endwhile; endif;
	get_footer();
?>