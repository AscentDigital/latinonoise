<?php  
	get_header();
?>
<!--==============================content================================-->
        <div class="content">
            <div class="container">
                <!--banners-->
                <div class="clearfix">
                    <?php get_template_part('includes/noticias');?>
                    <?php get_template_part('includes/musicas');?>
                </div>
                <div class="clearfix one_third_banner_box">
                    <?php get_template_part('includes/galleries');?>
                    <?php get_template_part('includes/eventos');?>
                    <div class="one_third_column xs-full-width" data-appear-animation="fadeInDown"
                         data-appear-animation-delay="1150">
                        <div class="scale_image_container">
                            <span class="f_right"><?php echo do_shortcode('[adning id="190"]'); ?> </span>
                        </div>
                    </div>
                </div>
                <!--Three column RowTHIS.row parent div by TEMPLATE DEFAULT IS ONE BIG BLOCK -- thread carefully.-->
                <div class="row">
                    <!-- PARENT COLUMN 2/3 -->
                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">

                        <!-- THIRD ROW CHILD OF PARENT-2/3 -->
                        <div class="row">
                            <!-- GALERIAS -->
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="section">
                                    <h3 class="section_title text-primary">Galleries</h3>
                                    <ul class="small_post_list m-push xs-flex-list">
                                        <?php get_template_part('includes/galerias');?>
                                    </ul>
                                </div>
                            </div>
                            <!-- END GALERIAS -->
                            <!-- EVENTOS -->
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                <div class="section" data-appear-animation="fadeInDown"
                                     data-appear-animation-delay="1150">
                                    <div class="tabs">
                                        <!--tabs navigation-->
                                        <div class="clearfix tabs_conrainer">
                                            <ul class="tabs_nav clearfix">
                                                <li class="">
                                                    <a href="#tab-1">
                                                        <h3 class="text-primary">Events</h3>
                                                    </a>
                                                </li>
                                                <!--<li class=""><a href="#tab-2"><h3>Popular</h3></a></li>-->
                                            </ul><a href="#" id="sort_button" class="f_right color_grey_2"><i
                                                   class="fa fa-bars f_size_medium"></i></a>
                                            <ul class="sort_list">
                                                <li><a href="#">Latest</a></li>
                                                <li><a href="#">Oldest</a></li> 
                                            </ul>
                                        </div>
                                        <!--tabs content-->
                                        <div class="tabs_content post_var_inline small_post_list ">
                                            <div id="tab-1">
                                                <ul>
                                                    <?php get_template_part('includes/eventos-list');?>
                                                </ul>
                                                <ul class="more_news"></ul>
                                            </div>
                                            <div class="load_more_wrapper">
                                                <h3 class="section_title"><a href="/eventos" class="more_news_button">SHOW
                                                        ALL EVENTS</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END EVENTORS -->
                        </div>

                        <!-- SECOND ROW CHILD OF PARENT--2/3 -->
                        <div class="row">
                            <!-- COLUMN 1/2:LA CHICA DE LA SEMANA -->
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="section" data-appear-animation="fadeInDown"
                                     data-appear-animation-delay="1150">
                                    <div class="scale_image_container push">
                                        <span class="f_right"><?php echo do_shortcode('[adning id="200"]'); ?> </span>
                                    </div>
                                </div>
                            </div>
                            <!-- COLUMN 2/2:NOTICIAS-->
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="section" data-appear-animation="fadeInDown"
                                     data-appear-animation-delay="1150">
                                    <!-- -->
                                    <div class="scale_image_container push">
                                        <span class="f_right"><?php echo do_shortcode('[adning id="201"]'); ?> </span>
                                    </div>
                                    <!-- -->
                                </div>
                            </div>
                        </div>

                        <!-- FIRST ROW CHILD OF PARENT-2/3 -->
                        <div class="row">
                            <!-- COLUMN 1/2:GANATELO -->
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="section" data-appear-animation="fadeInDown"
                                     data-appear-animation-delay="1150">
                                    <h3 class="section_title text-primary">GANATELO</h3>
                                    <?php get_template_part('includes/ganatelos');?>
                                </div>
                            </div>
                            <!-- COLUMN 2/2:NOTICIAS-->
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="section" data-appear-animation="fadeInDown"
                                     data-appear-animation-delay="1150">
                                    <h3 class="section_title text-primary">NOTICIAS</h3>
                                    <div class="row">
                                    <?php get_template_part('includes/noticias-list');?>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="scale_image_container push">
                                                <span class="f_right"><?php echo do_shortcode('[adning id="193"]'); ?> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END NOTICIAS -->
                        </div>
                    </div>
                    <!-- PARENT COLUMN 3/3 -->
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <!--Featured video-->
                            <?php get_template_part('includes/videos');?>
                        <!-- -->
                        <div class="scale_image_container push">
                            <span class="f_right"><?php echo do_shortcode('[adning id="199"]'); ?> </span>
                        </div>
                        <!-- REDES SOCIALES -->
                        <div class="section" data-appear-animation="fadeInDown" data-appear-animation-delay="1150">
                            <h3 class="section_title text-primary">REDES SOCIALES</h3>
                            <ul class="social_media_list">
                                <li><a href="#" class="you_tube"><i class="fa fa-youtube-play"></i>
                                        <div>7,820</div>
                                        <p>Subscribers</p>
                                    </a></li>
                                <li><a href="#" class="fb"><i class="fa fa-facebook"></i>
                                        <div>3,794</div>
                                        <p>Fans</p>
                                    </a></li>
                                <li><a href="#" class="pint"><i class="fa fa-instagram"></i>
                                        <div>1,310</div>
                                        <p>Followers</p>
                                    </a></li>
                            </ul>
                            <!-- -->
                            <div class="scale_image_container push">
                                <span class="f_right"><?php echo do_shortcode('[adning id="202"]'); ?> </span>
                            </div>
                            <!-- -->
                        </div>
                        <!-- DIRECTORIO -->
                        <div class="section" data-appear-animation="fadeInDown" data-appear-animation-delay="1150">
                            <h3 class="section_title text-primary">DIRECTORIO</h3>
                            <div class="scale_image_container">
                                <div class="button banner_button banner-title orange">DIRECTORIO</div>
                                <a href="./directorio.html"><img src="<?php echo get_template_directory_uri(); ?>/media/015.jpg"
                                         alt="" class="scale_image" /></a>
                            </div>
                        </div>
                        <!-- DE COMPRAS -->
                        <div class="section" data-appear-animation="fadeInDown" data-appear-animation-delay="1150">
                            <h3 class="section_title text-primary">DE COMPRAS</h3>
                            <div class="scale_image_container">
                                <div class="button banner_button banner-title blue">DE COMPRAS</div>
                                <a href="./de-compras.html"><img src="<?php echo get_template_directory_uri(); ?>/media/014.jpg"
                                         alt="" class="scale_image" /></a>
                            </div>
                        </div>
                        <!-- -->
                        <div class="scale_image_container push">
                            <span class="f_right"><?php echo do_shortcode('[adning id="203"]'); ?> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
	get_footer();
?>