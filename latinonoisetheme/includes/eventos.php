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
    'post_type' =>'eventos',
    'posts_per_page'=>'1',
    'order' => 'DESC',
    'orderby' => 'post_date'                 
)); 
while ( have_posts() ) : the_post();
$thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(), '', false);
?>
<div class="one_third_column" data-appear-animation="fadeInDown" data-appear-animation-delay="1150">
    <div class="scale_image_container">
        <div class="button banner_button banner-title orange">EVENTOS</div>
        <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumb_url[0]; ?>" alt=""
                 class="scale_image" /></a>
    </div>
</div>
<?php endwhile; ?>
<?php $wp_query = $temp_query;wp_reset_query(); ?>