<?php $temp_query = $wp_query; ?>
<?php 
global $ciudad;
query_posts(array(
    'post_type' =>'noticias',
    'tax_query' => array(
        array (
            'taxonomy' => 'location',
            'field' => 'term_id',
            'terms' => array($ciudad),
        )
    ),
    'posts_per_page'=>'4',
    'order' => 'DESC',
    'orderby' => 'post_date'                 
)); 
while ( have_posts() ) : the_post();
$thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(), '', false);
?>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
    <div class="scale_image_container" style = "margin-bottom: 0px;">
        <a href="<?php the_permalink();?>"><img
                 src="<?php echo get_field('main_image'); ?>"
                 alt="" class="scale_image noticias-list-image" /></a>
    </div>
    <a href="#">
        <h4 class="text-accent"><?php echo get_the_title(); ?>
        </h4>
    </a>
    <div class="event_date"><?php echo get_the_date(); ?></div>
</div>
<?php endwhile; ?>
<?php $wp_query = $temp_query; wp_reset_query(); ?>