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
    'post_type' =>'chicas',
    'posts_per_page'=>'1',
    'order' => 'DESC',
    'orderby' => 'post_date'               
)); 
while ( have_posts() ) : the_post();
$thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(), '', false);
?>
<div class="scale_image_container">
    <div class="button banner_button banner-title orange">CHICAS</div>
    <a href="<?php the_permalink();?>"><img
             src="<?php echo $thumb_url[0]; ?>" alt=""
             class="scale_image" /></a>
    <!--caption-->
    <div class="caption_type_1">
        <div class="caption_inner">
            <a href="<?php the_permalink();?>">
                <h2><?php the_title(); ?></h2>
            </a>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php $wp_query = $temp_query; wp_reset_query(); ?>