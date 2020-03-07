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
    'posts_per_page'=>'4',
    'order' => 'DESC',
    'orderby' => 'post_date'                 
)); 
while ( have_posts() ) : the_post();
$thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(), '', false);
?>
<li class="clearfix">
    <div class="scale_image_container">
        <a href="<?php the_permalink(); ?>"><img
                 src="<?php echo get_field('main_image'); ?>"
                 alt="" class="scale_image eventos-list-image" /></a>
        <div class="post_image_buttons"><a href="<?php echo get_field('ticket_link') ?>"
               class="icon_box"><i class="fa fa-ticket"></i></a>
        </div>
    </div>
    <div class="wrapper">
        <div class="clearfix">
            <div class="f_left"><b
                   class="event_date text-primary"><?php echo date('F d, Y',strtotime(get_field('event_date'))); ?></b></div>
        </div>
        <div class="post_text">
            <!--<div class="post_theme">Exlusive</div>-->
            <h3 class="post_title"><a class="text-accent"
                   href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
            <br /><small><?php echo get_field('texto_adicional') ?></small>
        </div>
    </div>
</li>
<?php endwhile; ?>
<?php $wp_query = $temp_query; wp_reset_query(); ?>