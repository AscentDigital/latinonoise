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
    'post_type' =>'noticias',
    'posts_per_page'=>'1',
    'order' => 'DESC',
    'orderby' => 'post_date'                 
)); 
while ( have_posts() ) : the_post();
$thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(), '', false);
?>
<div class="half_column image-card blue" data-appear-animation="fadeInDown"
     data-appear-animation-delay="1150">
    <div class="scale_image_container">
        <a href="<?php the_permalink();?>"><img src="<?php echo $thumb_url[0]; ?>" alt=""
                 class="scale_image" /></a>
        <!--caption-->
        <div class="caption_type_1">
            <div class="caption_inner">
                <div class="clearfix"><a href="#" role="button"
                       class="button banner_button orange">NOTICIAS</a>
                    <div class="event_date"><?php echo get_the_date(); ?></div>
                </div>
                <a href="<?php the_permalink();?>">
                    <h2><?php echo get_the_title(); ?></h2>
                </a>
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php $wp_query = $temp_query; ?>