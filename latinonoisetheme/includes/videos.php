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
    'post_type' =>'videos',
    'posts_per_page'=>'1',
    'order' => 'DESC',
    'orderby' => 'post_date'               
)); 
while ( have_posts() ) : the_post();
$thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(), '', false);
?>
<div class="section" data-appear-animation="fadeInDown" data-appear-animation-delay="1150">
    <h3 class="section_title text-primary">Featured Video</h3>
    <div class="t_align_c">
        <div class="iframe_video_container">
            <?php echo get_field('video'); ?>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php $wp_query = $temp_query; wp_reset_query(); ?>