<?php  
	function resources(){
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
		wp_enqueue_style('style-css', get_template_directory_uri() . '/css/style.css');
		wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
		wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css');
		wp_enqueue_style('owl', get_template_directory_uri() . '/css/owl.carousel.css');
		wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css');
		wp_enqueue_style('style-extended', get_template_directory_uri() . '/css/style-extended.css');
		wp_enqueue_style('style-name', get_stylesheet_uri());
		wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/jquery.modernizr.js');
		wp_enqueue_script('jquery-s', get_template_directory_uri() . '/js/jquery-2.1.0.min.js');
		wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js');
		wp_enqueue_script('query-loader', get_template_directory_uri() . '/js/jquery.queryloader2.min.js');
		wp_enqueue_script('jflickrfeed', get_template_directory_uri() . '/js/jflickrfeed.js');
		wp_enqueue_script('owl-js', get_template_directory_uri() . '/js/owl.carousel.min.js');
		wp_enqueue_script('retina', get_template_directory_uri() . '/js/retina.js');
		wp_enqueue_script('apear', get_template_directory_uri() . '/js/apear.js');
		wp_enqueue_script('circles', get_template_directory_uri() . '/js/circles.min.js');
		wp_enqueue_script('tweet', get_template_directory_uri() . '/plugins/twitter/jquery.tweet.min.js');
		wp_enqueue_script('plugins', get_template_directory_uri() . '/js/plugins.js');
		wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js');
	}

	add_action('wp_enqueue_scripts', 'resources');
?>