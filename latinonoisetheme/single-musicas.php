<?php  
	get_header();
	if ( have_posts() ) : while ( have_posts() ) : the_post();
	$temp_id = get_the_id();
?>
 <!--==============================content================================-->
        <div class="content">
            <div class="container">
                <div class="row">





                    <!-- MUSICAS POST -->
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="section" data-appear-animation="fadeInDown"
                             data-appear-animation-delay="1150">
                            <div class="tabs">
                                <!--tabs navigation-->
                                <div class="clearfix tabs_conrainer">
                                    <ul class="tabs_nav clearfix">
                                        <li class="">
                                            <a href="#tab-1">
                                                
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="music-player">
                                        <div class="cover">
                                            <img src="<?php echo get_field('main_image'); ?>" alt="">
                                    
                                        </div>
                                        <div class="titre">
                                            <h3><?php echo get_field('artist_name'); ?></h3>
                                            <h1><?php the_title(); ?></h1>
                                        </div>
                                        <div class="lecteur">
                                            <audio style="width: 100%;" class="fc-media fc-audio">
                                                <source src="<?php echo get_field('music'); ?>" type="audio/mp3" />
                                                </audio>
                                        </div>
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
                                <div class="col-md-6"><br>
                                    <h2 class="text-accent"><?php the_title(); ?></h2>
                                    <h3 class="text-primary"><?php echo get_field('artist_name'); ?></h3>
                                    <h6 class="text-secondary"><?php echo get_field('artist_detail'); ?></h6>
                                    <div class="text_post_section">
                                        <?php the_content(); ?>
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
                                        	<?php endwhile;wp_reset_query(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            


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
<script>
var a = {

        extend: function () { },
        addons: function () { },
        init: function () {
            var $that = this;
            $(function () {
                $that.components.media();
            });
        },
        components: {
            media: function (target) {
                var media = $('audio.fc-media', (target !== undefined) ? target : 'body');
                if (media.length) {
                    media.mediaelementplayer({
                        audioHeight: 40,
                        features: ['playpause', 'current', 'duration', 'progress', 'volume', 'tracks', 'fullscreen'],
                        alwaysShowControls: true,
                        timeAndDurationSeparator: '<span>  </span>',
                        iPadUseNativeControls: true,
                        iPhoneUseNativeControls: true,
                        AndroidUseNativeControls: true
                    });
                }
            },
        },

    };

    a.init();</script>        
<?php endwhile; endif; 
	get_footer();
?>