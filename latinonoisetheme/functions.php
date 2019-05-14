<?php  
	function resources(){
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
		wp_enqueue_style('style-css', get_template_directory_uri() . '/css/style.css');
		wp_enqueue_style('custom', get_template_directory_uri() . '/css/custom.css');
		wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
		wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css');
		wp_enqueue_style('owl', get_template_directory_uri() . '/css/owl.carousel.css');
		wp_enqueue_style('jackbox-css', get_template_directory_uri() . '/css/jackbox.min.css');
		wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css');
		wp_enqueue_style('style-extended', get_template_directory_uri() . '/css/style-extended.css');
		wp_enqueue_style('style-name', get_stylesheet_uri());
		wp_enqueue_script('jquery-s', get_template_directory_uri() . '/js/jquery-2.1.0.min.js');
		wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js');
		wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/jquery.modernizr.js');
		wp_enqueue_script('query-loader', get_template_directory_uri() . '/js/jquery.queryloader2.min.js');
		wp_enqueue_script('jflickrfeed', get_template_directory_uri() . '/js/jflickrfeed.js');
		wp_enqueue_script('jackbox-js', get_template_directory_uri() . '/js/jackbox-packed.min.js');
		wp_enqueue_script('owl-js', get_template_directory_uri() . '/js/owl.carousel.min.js');
		wp_enqueue_script('retina', get_template_directory_uri() . '/js/retina.js');
		wp_enqueue_script('apear', get_template_directory_uri() . '/js/apear.js');
		wp_enqueue_script('circles', get_template_directory_uri() . '/js/circles.min.js');
		wp_enqueue_script('tweet', get_template_directory_uri() . '/plugins/twitter/jquery.tweet.min.js');
		wp_enqueue_script('plugins', get_template_directory_uri() . '/js/plugins.js');
		wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js');
	}

	add_action('wp_enqueue_scripts', 'resources');

	define("THEME_DIR", get_template_directory_uri());
	function setup(){
	//Navigation Menus
		register_nav_menus(array(
			'primary' => __('Primary Menu'),
			'footer' => __('Footer Menu'),
		));
	//Add featured image support
		add_theme_support('post-thumbnails');
		add_theme_support('post-formats', array('aside', 'gallery', 'link'));
	}

	add_action('after_setup_theme', 'setup');

	function my_acf_google_map_api( $api ){
	  $api['key'] = 'AIzaSyBPab8zLQkkHznf2bwb8wwIn2yXFLKUhnE';
	  return $api;
	} 
	add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

	function noticias_cpt() {
		register_post_type( 'noticias', array(
		  'labels' => array(
		    'name' => 'Noticias',
		    'singular_name' => 'Noticia',
		   ),
		  'has_archive' => true,
		  'description' => 'Noticias Custom Post Type',
		  'public' => true,
		  'publicly_queryable' => true,
	      'menu_icon' => 'dashicons-list-view',
		  'menu_position' => 20,
		  'supports' => array( 'title', 'editor', 'author', 'thumbnail' )
		));
	}
	add_action( 'init', 'noticias_cpt' );

	function musicas_cpt() {
		register_post_type( 'musicas', array(
		  'labels' => array(
		    'name' => 'Musicas',
		    'singular_name' => 'Musica',
		   ),
		  'description' => 'Musicas Custom Post Type',
	      'menu_icon' => 'dashicons-format-audio',
		  'public' => true,
		  'publicly_queryable' => true,
		  'menu_position' => 20,
		  'supports' => array( 'title', 'editor', 'author', 'thumbnail' )
		));
	}
	add_action( 'init', 'musicas_cpt' );

	function galleries_cpt() {
		register_post_type( 'galleries', array(
		  'labels' => array(
		    'name' => 'Galleries',
		    'singular_name' => 'Gallery',
		   ),
		  'description' => 'Galleries Custom Post Type',
		  'public' => true,
	      'menu_icon' => 'dashicons-format-gallery',
		  'publicly_queryable' => true,
		  'menu_position' => 20,
		  'supports' => array( 'title', 'editor', 'author', 'thumbnail' )
		));
	}
	add_action( 'init', 'galleries_cpt' );

	function videos_cpt() {
		register_post_type( 'videos', array(
		  'labels' => array(
		    'name' => 'Videos',
		    'singular_name' => 'Video',
		   ),
		  'description' => 'Videos Custom Post Type',
		  'public' => true,
	      'menu_icon' => 'dashicons-format-video',
		  'publicly_queryable' => true,
		  'menu_position' => 20,
		  'supports' => array( 'title', 'editor', 'author', 'thumbnail' )
		));
	}
	add_action( 'init', 'videos_cpt' );

	function ganatelos_cpt() {
		register_post_type( 'ganatelos', array(
		  'labels' => array(
		    'name' => 'Ganatelos',
		    'singular_name' => 'Ganatelo',
		  	'add_new_item' => 'Add New Ganatelo',
		   ),
		  'description' => 'Ganatelos Custom Post Type',
		  'public' => true,
		  'publicly_queryable' => true,
	      'menu_icon' => 'dashicons-tickets',
		  'menu_position' => 20,
		  'supports' => array( 'title', 'author', 'thumbnail' )
		));
	}
	add_action( 'init', 'ganatelos_cpt' );

	function favoritos_cpt() {
		register_post_type( 'eventos', array(
		  'labels' => array(
		    'name' => 'Eventos',
		    'singular_name' => 'Evento',
		   ),
		  'description' => 'Eventos Custom Post Type',
		  'public' => true,
	      'menu_icon' => 'dashicons-calendar',
		  'publicly_queryable' => true,
		  'menu_position' => 20,
		  'supports' => array( 'title', 'editor', 'author', 'thumbnail' )
		));
	}
	add_action( 'init', 'favoritos_cpt' );

	function eventos_cpt() {
		register_post_type( 'favoritos', array(
		  'labels' => array(
		    'name' => 'Favoritos',
		    'singular_name' => 'Favorito',
		   ),
		  'description' => 'Favoritos Custom Post Type',
		  'public' => true,
	      'menu_icon' => 'dashicons-glass',
		  'publicly_queryable' => true,
		  'menu_position' => 20,
		  'supports' => array( 'title', 'editor', 'author', 'thumbnail' )
		));
	}
	add_action( 'init', 'eventos_cpt' );

	function chicas_cpt() {
		register_post_type( 'chicas', array(
		  'labels' => array(
		    'name' => 'Chicas',
		    'singular_name' => 'Chica',
		   ),
		  'description' => 'Chicas Custom Post Type',
		  'public' => true,
	      'menu_icon' => 'dashicons-user',
		  'publicly_queryable' => true,
		  'menu_position' => 20,
		  'supports' => array( 'title', 'editor', 'author', 'thumbnail' )
		));
	}
	add_action( 'init', 'chicas_cpt' );

	function add_custom_taxonomies() {
	  // Add new "Categories" taxonomy to Posts
	  register_taxonomy('categories', array('noticias','musicas','galleries','videos','ganatelos','eventos','chicas'), array(
	    // Hierarchical taxonomy (like categories)
	    'hierarchical' => true,
	    // This array of options controls the labels displayed in the WordPress Admin UI
	    'labels' => array(
	      'name' => _x( 'Categories', 'taxonomy general name' ),
	      'singular_name' => _x( 'Category', 'taxonomy singular name' ),
	      'search_items' =>  __( 'Search Categories' ),
	      'all_items' => __( 'All Categories' ),
	      'parent_item' => __( 'Parent Category' ),
	      'parent_item_colon' => __( 'Parent Category:' ),
	      'edit_item' => __( 'Edit Category' ),
	      'update_item' => __( 'Update Category' ),
	      'add_new_item' => __( 'Add New Category' ),
	      'new_item_name' => __( 'New Category Name' ),
	      'menu_name' => __( 'Categories' ),
	    ),
	    // Control the slugs used for this taxonomy
	    'rewrite' => array(
	      'slug' => 'categories', // This controls the base slug that will display before each term
	      'with_front' => false, // Don't display the category base before "/categories/"
	      'hierarchical' => true // This will allow URL's like "/categories/boston/cambridge/"
	    ),
	  ));
	  // Add new "Locations" taxonomy to Posts
	  register_taxonomy('location', array('noticias','musicas','galleries','videos','ganatelos','eventos','chicas'), array(
	    // Hierarchical taxonomy (like categories)
	    'hierarchical' => true,
	    // This array of options controls the labels displayed in the WordPress Admin UI
	    'labels' => array(
	      'name' => _x( 'Locations', 'taxonomy general name' ),
	      'singular_name' => _x( 'Location', 'taxonomy singular name' ),
	      'search_items' =>  __( 'Search Locations' ),
	      'all_items' => __( 'All Locations' ),
	      'parent_item' => __( 'Parent Location' ),
	      'parent_item_colon' => __( 'Parent Location:' ),
	      'edit_item' => __( 'Edit Location' ),
	      'update_item' => __( 'Update Location' ),
	      'add_new_item' => __( 'Add New Location' ),
	      'new_item_name' => __( 'New Location Name' ),
	      'menu_name' => __( 'Locations' ),
	    ),
	    // Control the slugs used for this taxonomy
	    'rewrite' => array(
	      'slug' => 'locations', // This controls the base slug that will display before each term
	      'with_front' => false, // Don't display the category base before "/locations/"
	      'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
	    ),
	  ));
	}
	add_action( 'init', 'add_custom_taxonomies', 0 );
?>
<?php  
function adzone($post_type){	
$args = array(
'post_type' => $post_type,
'orderby'   => 'rand',
'posts_per_page' => 2, 
);
query_posts($args);
?>
<div class="scale_image_container push">
	<a href="#"><img
			 src="<?php echo get_template_directory_uri(); ?>/media/progressive.jpg"
			 alt="" class="scale_image" /></a>
</div>
<div class="tabs standalone">
	<!--tabs navigation-->
	<div class="clearfix tabs_conrainer">
		<ul class="tabs_nav clearfix">
			<li class="">
				<a href="#tab-1">
					<h3 class="text-primary">NOTICIAS</h3>
				</a>
			</li>
		</ul>
		<a href="./noticias.html" id="" class="f_right smaller text-accent">
			<small>MAS NOTICIAS <i class="fa fa-chevron-right"></i></small></a>
	</div>
</div>
<div class="row">
	<?php  
	while ( have_posts() ) : the_post();
		$title = get_the_title();
		$content = get_the_content();
	?>
	<div class="col-md-12 col-sm-6 col-xs-12">
			<div class="scale_image_container">
				<div class="button banner_button banner-title orange"><?php echo get_the_date(); ?></div>
				<a href="<?php the_permalink(); ?>"><img
							 src="<?php echo get_field('main_image'); ?>" alt=""
							 class="scale_image" /></a>
				<!--caption-->
				<div class="caption_type_1 scale_less">
					<div class="caption_inner">
						<a href="<?php the_permalink(); ?>">
							<h3><small><?php echo substr($title,0,20); ?>...</small> </h3>
							<p class="text-white">
								<?php echo substr($content,0,100); ?>...
							</p>
						</a>
					</div>
				</div>
			</div>
	</div>
	<?php 
	endwhile;
	wp_reset_query();
	?>
</div>
<?php } ?>

<?php  
function adzone_bottom($post_type){
$args = array(
'post_type' => $post_type,
'orderby'   => 'rand',
'posts_per_page' => 2, 
);
query_posts($args);
?>
<div class="tabs standalone">
	<!--tabs navigation-->
	<div class="clearfix tabs_conrainer">
		<ul class="tabs_nav clearfix">
			<li class="">
				<a href="#tab-1">
					<h3 class="text-primary">LA MÚSICA NUEVA</h3>
				</a>
			</li>
		</ul><a href="./musica.html" id="" class="f_right smaller text-accent"><small>MAS MUSICA <i
					 class="fa fa-chevron-right"></i></small></a>
	</div>
</div>
<div class="row">
<?php  
while ( have_posts() ) : the_post();
	$title = get_the_title();
	$content = get_the_content();
?>
	<div class="col-md-12 col-sm-6 col-xs-12">
			<div class="scale_image_container">
				<div class="button banner_button banner-title orange"><?php echo get_field('artist_name'); ?></div>
				<a href="<?php the_permalink(); ?>"><img
							 src="<?php echo get_field('main_image'); ?>" alt=""
							 class="scale_image" /></a>
				<!--caption-->
				<div class="caption_type_1">
					<div class="caption_inner">
						<a href="<?php the_permalink(); ?>">
							<h2><small><?php echo $title; ?> </small></h2>
						</a>
					</div>
				</div>
			</div>
	</div>
<?php 
endwhile;
wp_reset_query();
?>
</div>
<div class="scale_image_container push">
	<a href="./galerias.html"><img
				 src="https://placehold.it/360x180/03345C/FFFFFF?text=ANUNCIO%20PUBLICIDAD"
				 alt="" class="scale_image" /></a>
</div>
<?php } ?>

<?php  
function adzone_double(){
?>
<div class="scale_image_container push">
    <a href="#"><img
             src="<?php echo get_template_directory_uri(); ?>/media/progressive.jpg"
             alt="" class="scale_image" /></a>
</div>
<div class="scale_image_container push">
    <a href="./galerias.html"><img
             src="https://placehold.it/360x180/03345C/FFFFFF?text=ANUNCIO%20PUBLICIDAD"
             alt="" class="scale_image" /></a>
</div>

<?php } ?>