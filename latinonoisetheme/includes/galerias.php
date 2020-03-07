<?php $temp_query = $wp_query; ?>
<?php 
global $ciudad;
query_posts(array(
    'post_type' =>'galleries',
    'tax_query' => array(
        array (
            'taxonomy' => 'location',
            'field' => 'term_id',
            'terms' => array($ciudad),
        )
    ),
    'posts_per_page'=>'3',
    'order' => 'DESC',
    'orderby' => 'post_date'                 
)); 
while ( have_posts() ) : the_post();
$thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(), '', false);
?>
<li>
    <div class="scale_image_container">
        <a href="<?php the_permalink();?>"><img src="<?php echo $thumb_url[0]; ?>"
                 alt="" class="scale_image" /></a>
        <div class="post_image_buttons"><a href="<?php the_permalink();?>"
               class="icon_box"><i class="fa fa-camera"></i></a></div>
    </div>
    <a href="<?php the_permalink();?>">
        <h4 class="text-accent"><?php echo get_the_title(); ?></h4>
    </a>
    <div class="event_date"><?php echo get_the_date(); ?></div>
</li>
<?php endwhile; ?>
<?php $wp_query = $temp_query; wp_reset_query(); ?>