<?php  
	get_header();
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
                            </div><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="scale_image_container">
                                        <div class="button banner_button banner-title orange"><?php _e('Registrate antes del'); ?> <?php echo get_field('fecha_limite'); ?></div>
                                        <a href="./la-rifa.html"><img
                                                 src="<?php echo get_field('main_image'); ?>" width="100%" alt=""
                                                 class="scale_image" /></a>
                                        <!--caption-->
                                        <div class="caption_type_1 scale_less">
                                            <div class="caption_inner">
                                                <a href="./la-rifa.html">
                                                    <p class="text-white text-right">
                                                        <?php echo get_field('premio'); ?>
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12"> 
                                    <div class="text_post_section">
                                        <h1 class="text-accent"><?php echo get_field('titulo'); ?></h1> <br>
                                        <h3 class="text-muted"><?php _e('Fecha limite de registro'); ?>: <?php echo get_field('fecha_limite'); ?>
                                        <br>
                                        <?php echo get_field('premio'); ?></h3>
                                        <p>
                                        <?php echo get_field('texto'); ?>
                                        </p>
                                        <div class="clearfix">
                                            <?php 
                                                if(is_user_logged_in()){
                                                    $count = is_registered_ganatelo($post->ID, get_current_user_id());
                                                    if(!$count){
                                            ?>
                                                        <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="POST">
                                                            <?php if(isset($_SESSION['errors'])){ ?>
                                                              <div class="alert alert-error">
                                                                <ul>
                                                                  <?php foreach ($_SESSION['errors'] as $error) { ?>
                                                                    <li><i class="fa fa-exclamation-circle"></i> <?php echo $error; ?></li>
                                                                  <?php } ?>
                                                                </ul>
                                                              </div>
                                                            <?php } ?>
                                                            <input type="hidden" name="action" value="ganatelo_form">
                                                            <input type="hidden" name="page_id" value="<?php echo $post->ID; ?>">
                                                            <button type="submit" class="btn-custom button button_type_icon_medium button_orange"><?php _e('REGíSTRAME ahora'); ?><i class="fa fa-chevron-right"></i></button>
                                                        </form>
                                            <?php
                                                    }else{
                                            ?>
                                                         <a href="#" class="btn-custom button button_type_icon_medium button_orange"><?php _e('Ya está registrado'); ?></a>
                                            <?php            
                                                    } 
                                                }else{ 
                                            ?>
                                            <a href="<?php echo get_permalink(198) . '?return_url=' . get_permalink(); ?>" class="btn-custom button button_type_icon_medium button_orange"><?php _e('INICIE SESIÓN PARA REGISTRARSE'); ?><i class="fa fa-chevron-right"></i></a><br><br>

                                            <a href="<?php echo get_permalink(196) . '?return_url=' . get_permalink(); ?>" class="btn-custom button button_type_icon_medium button_orange"><?php _e('¿AÚN NO TIENES UNA CUENTA? REGÍSTRATE AHORA'); ?><i class="fa fa-chevron-right"></i></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="text_post_section add_this">
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
    endwhile; 
    endif; 
	get_footer();
    unset($_SESSION['errors']);
?>