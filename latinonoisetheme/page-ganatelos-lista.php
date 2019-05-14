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
                                </div><br>

                                <div class="row">
                                	<?php  
									if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
									elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
									else { $paged = 1; }
							        $args = array(
							            'post_type' => 'ganatelos',
								        'paged' => $paged,
								        'posts_per_page' => 6,
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
                                    <div class="col-md-12">
                                        <div class="scale_image_container">
                                            <div class="button banner_button banner-title orange"><?php the_title(); ?></div>
                                            <a href="<?php the_permalink(); ?>"><img
                                                     src="<?php echo get_field('main_image'); ?>" width="100%" alt=""
                                                     class="scale_image" /></a>
                                            <!--caption-->
                                            <div class="caption_type_1 scale_less">
                                                <div class="caption_inner">
                                                    <a href="<?php the_permalink(); ?>"> 
                                                        <p class="text-white text-right">
                                                            <?php echo substr(get_field('texto'), 0, 100) ?>...
                                                        </p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
									<?php } } wp_reset_query(); ?>
                                </div>

                                
                            	<?php get_template_part('pagination'); ?>



                            </div>
                        </div>
                    </div>
                    <!-- END NOTICIAS LIST  -->






                   <!-- SIDEBAR -->
					<div class="col-md-3 col-sm- col-xs-12">
						<div class="section" data-appear-animation="fadeInDown" data-appear-animation-delay="1150">
							<?php adzone_double(); ?>
						</div>
					</div>
					<!-- END SIDEBAR -->



                </div>



            </div>
        </div>
<?php  
	get_footer();
?>