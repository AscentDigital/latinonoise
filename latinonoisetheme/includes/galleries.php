<?php $temp_query = $wp_query; ?>
<?php 
query_posts(array(
    // 'tax_query' => array(
    //     array (
    //         'taxonomy' => 'location',
    //         'field' => 'slug',
    //         'terms' => array($option, 'general'),
    //     )
    // ),
    'post_type' =>'galleries',
    'posts_per_page'=>'1',
    'order' => 'DESC',
    'orderby' => 'post_date'                 
)); 
while ( have_posts() ) : the_post();
$thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(), '', false);
?>
<div class="one_third_column" data-appear-animation="fadeInDown" data-appear-animation-delay="1150">
    <div class="scale_image_container">
        <div class="button banner_button banner-title blue">GALERIAS</div>
        <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumb_url[0]; ?>"
                 alt="" class="scale_image" /></a>
    </div>
</div>
<?php endwhile; ?>
<?php $wp_query = $temp_query; ?>