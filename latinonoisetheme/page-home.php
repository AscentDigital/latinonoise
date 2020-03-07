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
                <div class="clearfix">
                    <?php get_template_part('includes/galleries');?>
                    <?php get_template_part('includes/eventos');?>
                    <div class="one_third_column xs-full-width" data-appear-animation="fadeInDown"
                         data-appear-animation-delay="1150">
                        <div class="scale_image_container">
                            <?php echo do_shortcode('[adning id="184"]'); ?>
                        </div>
                    </div>
                </div>
                <!--Three column RowTHIS.row parent div by TEMPLATE DEFAULT IS ONE BIG BLOCK -- thread carefully.-->
                <div class="row">
                    </div>
                </div>
            </div>=
<?php
	get_footer();
?>