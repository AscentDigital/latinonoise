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
    'post_type' =>'ganatelos',
    'posts_per_page'=>'3',
    'order' => 'DESC',
    'orderby' => 'post_date'                 
)); 
while ( have_posts() ) : the_post();
$thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(), '', false);
?>
<div class="scale_image_container">
    <div class="text-top text-light text-uppercase text-right text-big"><?php the_title(); ?></div>
    <a href="<?php the_permalink(); ?>"><img
             src="<?php echo $thumb_url[0]; ?>" alt=""
             class="scale_image" /></a>
    <div class="text-bottom text-light text-uppercase text-left text-smol">REGISTRATE YA</div>
</div>
<?php endwhile; ?>
<?php $wp_query = $temp_query; wp_reset_query(); ?>