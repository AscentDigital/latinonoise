<?php  
	get_header();
	if ( have_posts() ) : while ( have_posts() ) : the_post();
	$temp_id = get_the_id();
?>
<!--==============================content================================-->
        <div class="content">
            <div class="container">
                <div class="row">





                    <!-- VIDEO POST -->
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="section" data-appear-animation="fadeInDown"
                             data-appear-animation-delay="1150">
                            <div class="tabs">
                                <!--tabs navigation-->
                                <div class="clearfix tabs_conrainer">
                                    <ul class="tabs_nav clearfix">
                                        <li class="">
                                            <a href="#tab-1">
                                                <h1 class="text-primary"><?php the_title(); ?></h1> 
                                                <h3><?php echo get_field('video_details'); ?></h3>
                                                <h4><?php echo get_field('video_place'); ?></h4>
                                                
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-12">
                                  	<?php echo get_field('video'); ?>
                                </div>
                                <div class="col-md-12"> 
                                    <div class="text_post_section"> 
                                        <p><?php the_content(); ?>
                                        </p> 
                                    </div>
                                    <div class="text_post_section add_this">
                                        <span>Share this:</span>
                                        <div>
                                            <!-- AddThis Button BEGIN -->
                                            <div
                                                 class="addthis_toolbox addthis_default_style addthis_32x32_style">
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
 
                            </div> 
                            <div class="row">
                              <div class="col-md-12">
                                <div class="section read_post_list gallery_list">
                                  <h2 class="section_title text-primary">RECOMENDACIONES</h2><br>
                                  
                                  <div class="row">
                                	<?php 
									$args = array(
									'post__not_in' => array($temp_id),
									'post_type' => $post_type,
									'orderby'   => 'rand',
									'posts_per_page' => 2, 
									);
									query_posts($args);
									while ( have_posts() ) : the_post();
							        		$con = get_the_content();
									?> 
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <div class="scale_image_container">
                                        <div class="button banner_button banner-title orange"><?php echo get_field('video_place'); ?></div>
                                        <a href="<?php the_permalink(); ?>"><img
                                               src="<?php echo get_field('thumbnail'); ?>" alt=""
                                               class="scale_image" /></a>
                                        <div class="center-play"><i class="fa fa-play-circle"></i></div>
                                        <!--caption-->
                                        <div class="caption_type_1">
                                          <div class="caption_inner">
                                            <a href="<?php the_permalink(); ?>">
                                              <h2><small><?php the_title(); ?></small></h2>
                                              <p class="text-light">
                                                <?php echo substr($con,0,70); ?>...<br>
                                                <b>> Ver Show</b>
                                              </p>
                                            </a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <?php endwhile;wp_reset_query(); ?>
                                  </div>
                                  <!--  -->
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <!-- ADvertisement -->
                              <div class="col-md-6">
                                <div class="section t_align_c">
                                  <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/728x90.jpg" alt=""></a>
                                </div><br><br><br>
                              </div>
                              <div class="col-md-6">
                                <div class="section t_align_c">
                                  <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/728x90.jpg" alt=""></a>
                                </div><br><br><br>
                              </div>
                              <!--  -->
                            </div>


                        </div>
                    </div>
                    <!-- END VIDEO POST  -->






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