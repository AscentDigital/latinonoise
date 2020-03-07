<?php $temp_query = $wp_query; ?>
<?php 
global $ciudad;
query_posts(array(
    'tax_query' => array(
        array (
            'taxonomy' => 'location',
            'field' => 'term_id',
            'terms' => array($ciudad),
        )
    ),
    'post_type' =>'musicas',
    'posts_per_page'=>'1',
    'order' => 'DESC',
    'orderby' => 'post_date'               
)); 
while ( have_posts() ) : the_post();
$thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(), '', false);
?>
<div class="half_column image-card orange" data-appear-animation="fadeInDown"
     data-appear-animation-delay="1150">
    <div class="scale_image_container">
        <a href="<?php the_permalink();?>"><img src="<?php echo $thumb_url[0]; ?>" alt=""
                 class="scale_image home-main-images" /></a>
        <!--caption-->
        <div class="caption_type_1">
            <div class="caption_inner">
                <div class="clearfix"><a href="./musica.html"
                       class="button banner_button blue">MUSICA</a>
                    <div class="event_date"><?php echo get_the_date(); ?></div>
                </div>
                <a href="<?php the_permalink();?>">
                    <h2><?php the_title(); ?></h2>
                </a>
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php $wp_query = $temp_query; wp_reset_query(); ?>