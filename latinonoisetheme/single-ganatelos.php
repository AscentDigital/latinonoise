<?php  
	get_header();
	if ( have_posts() ) : while ( have_posts() ) : the_post();
    $thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(), '', false);
    $mon = date('M' , strtotime(get_the_date()));
    $day = date('d' , strtotime(get_the_date()));
?>
<!--==============================content================================-->
        <div class="content">
            <div class="container">
                <div class="row">
                    <!-- GANATELOS POST -->
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="section" data-appear-animation="fadeInDown"
                             data-appear-animation-delay="1150">
                            <div class="tabs">
                                <!--tabs navigation-->
                                <div class="clearfix tabs_conrainer">
                                    <ul class="tabs_nav clearfix">
                                        <li class="">
                                            <a href="#tab-1">
                                                <h1 class="text-accent">GANATELO</h1> 
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="scale_image_container" style = "margin-bottom: 10px;">
                                        <div class="text-top text-light text-uppercase text-right text-big"><?php the_title(); ?></div>
                                                    <a href="<?php the_permalink(); ?>"><img
                                                             src="<?php echo $thumb_url[0]; ?>" alt=""
                                                             class="scale_image" /></a>
                                                    <div class="text-bottom text-light text-uppercase text-left text-smol">REGISTRATE YA</div>
                                    </div>
                                    <div style = "text-align: center;">
                                    <small>Al dar click al boton "Registrame Ahora" estas aceptando los <a href="#">Terminos y Condiciones</a> de la rifa.</small>
                                        <div class="clearfix">
                                            <?php if(isset($_SESSION['errors'])){ ?>
                                              <div class="alert alert-error">
                                                <ul>
                                                  <?php foreach ($_SESSION['errors'] as $error) { ?>
                                                    <li><i class="fa fa-exclamation-circle"></i> <?php echo $error; ?></li>
                                                  <?php } ?>
                                                </ul>
                                              </div>
                                            <?php } ?>
                                            <?php if(isset($_SESSION['success'])){ ?>
                                              <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
                                            <?php 
                                                }
                                                 
                                                if(is_user_logged_in()){
                                                    $count = is_registered_ganatelo($post->ID, get_current_user_id());
                                                    if(!$count){
                                            ?>
                                                        <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="POST">
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
                                </div>
                                <div class="col-md-7"> 
                                    <div class="text_post_section" style="margin-top: 0;">
                                        <h2 class="text-accent"><?php echo get_field('titulo'); ?></h2>
                                        <div class="event_date text-primary" style = "font-size: 18px;"><b>Registrate Antes Del <?php echo $day; ?> <?php echo $mon; ?></b></div>
                                        <h3 class="text-muted">
                                        <?php echo get_field('premio'); ?>
                                        </h3>
                                        <p>
                                        <?php echo get_field('texto'); ?>
                                        </p>
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
    unset($_SESSION['success']);
?>