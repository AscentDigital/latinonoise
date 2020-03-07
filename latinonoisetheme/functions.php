<?php  
	function is_registered_ganatelo($ganatelo_id, $user_id){
		global $wpdb;
		$count = $wpdb->get_var('SELECT COUNT(*) FROM ' . $wpdb->prefix . 'ganatelo WHERE ganatelo_id = ' . $ganatelo_id . ' AND user_id = ' . $user_id);
		return $count;
	}
	function get_registered_count($ganatelo_id){
		global $wpdb;
		$count = $wpdb->get_var('SELECT COUNT(*) FROM ' . $wpdb->prefix . 'ganatelo WHERE ganatelo_id = ' . $ganatelo_id . ' AND status = "active"');
		return $count;
	}
	function register_session(){
		global $ciudad;
	    if( !session_id() )
	        session_start();
	    if(isset($_GET['ciudad']) && $loc = get_term_by('slug', $_GET['ciudad'], 'location')){
	    	$ciudad = $loc->term_id;
	    }else if(isset($_COOKIE['ciudad'])){
	    	$ciudad = $_COOKIE['ciudad'];
	    }else if(is_user_logged_in()){
	    	$ciudad = get_the_author_meta('location', get_current_user_id());
	    }
	    if(empty($ciudad)){
	    	$ciudad = 3;
	    }
	    setcookie("ciudad", $ciudad, time()+3600);
	}
	add_action('init','register_session');
	function auto_redirect_after_logout(){
	  wp_redirect(home_url());
	  exit();
	}
	add_action('wp_logout','auto_redirect_after_logout');
	function template_redirect_fn(){
	    if((is_page(80) || is_page(78)) && is_user_logged_in ()){
	        wp_redirect(home_url());
	        exit(); 
	    }
	}
	add_action( 'template_redirect', 'template_redirect_fn' );
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
		wp_enqueue_style('style-extended-2', get_template_directory_uri() . '/css/style-extended-2.css');
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
	  $api['key'] = 'AIzaSyBzpKkWCt5gHxG3QatQ-D-Rxy3HQ51zr8c';
	  return $api;
	} 
	add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
	
	if ( function_exists('register_sidebar') ) {
	   register_sidebar(array(
	   'name' => 'Location Feed',
	   'id'            => 'location_feed',
	   'before_widget' => '<div id="%1$s" class="widget %2$s">',
	   'after_widget' => '</div>',
	   'before_title' => '<h2>',
	   'after_title' => '</h2>'
	    ));
	}

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
		  'menu_position' => 2,
		  'supports' => array( 'title', 'editor', 'author', 'thumbnail' )
		));
	}
	add_action( 'init', 'noticias_cpt' );
	function musicas_cpt() {
		register_post_type( 'musicas', array(
		  'labels' => array(
		    'name' => 'Musics',
		    'singular_name' => 'Music',
		   ),
		  'description' => 'Musics Custom Post Type',
	      'menu_icon' => 'dashicons-format-audio',
		  'public' => true,
		  'publicly_queryable' => true,
		  'menu_position' => 3,
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
		  'menu_position' => 4,
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
		  'menu_position' => 5,
		  'supports' => array( 'title', 'editor', 'author', 'thumbnail' )
		));
	}
	add_action( 'init', 'videos_cpt' );
	function ganatelos_cpt() {
		register_post_type( 'ganatelos', array(
		  'labels' => array(
		    'name' => 'WinZones',
		    'singular_name' => 'WinZone',
		  	'add_new_item' => 'Add New WinZone',
		   ),
		  'description' => 'WinZones Custom Post Type',
		  'public' => true,
		  'publicly_queryable' => true,
	      'menu_icon' => 'dashicons-tickets',
		  'menu_position' => 6,
		  'supports' => array( 'title', 'author', 'thumbnail' )
		));
	}
	add_action( 'init', 'ganatelos_cpt' );
	function favoritos_cpt() {
		register_post_type( 'favoritos', array(
		  'labels' => array(
		    'name' => 'Directories',
		    'singular_name' => 'Directory',
		   ),
		  'description' => 'Directories Custom Post Type',
		  'public' => true,
	      'menu_icon' => 'dashicons-calendar',
		  'publicly_queryable' => true,
		  'menu_position' => 7,
		  'supports' => array( 'title', 'editor', 'author', 'thumbnail' )
		));
	}
	add_action( 'init', 'favoritos_cpt' );
	function eventos_cpt() {
		register_post_type( 'eventos', array(
		  'labels' => array(
		    'name' => 'Events',
		    'singular_name' => 'Event',
		   ),
		  'description' => 'Events Custom Post Type',
		  'public' => true,
	      'menu_icon' => 'dashicons-cart',
		  'publicly_queryable' => true,
		  'menu_position' => 8,
		  'supports' => array( 'title', 'editor', 'author', 'thumbnail' )
		));
	}
	add_action( 'init', 'eventos_cpt' );
	function chicas_cpt() {
		register_post_type( 'chicas', array(
		  'labels' => array(
		    'name' => 'Girls',
		    'singular_name' => 'Girl',
		   ),
		  'description' => 'Girls Custom Post Type',
		  'public' => true,
	      'menu_icon' => 'dashicons-star-empty',
		  'publicly_queryable' => true,
		  'menu_position' => 9,
		  'supports' => array( 'title', 'editor', 'author', 'thumbnail' )
		));
	}
	add_action( 'init', 'chicas_cpt' );
	function add_custom_taxonomies() {
	  // Add new "Categories" taxonomy to Posts
	  register_taxonomy('categories', array('noticias','musicas','galleries','videos','ganatelos','eventos','chicas','favoritos'), array(
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
	  register_taxonomy('location', array('noticias','musicas','galleries','videos','ganatelos','eventos','chicas','favoritos'), array(
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
	  register_taxonomy('business-type', array('favoritos'), array(
	    // Hierarchical taxonomy (like categories)
	    'show_ui'                    => true,
	    'meta_box_cb'                => 'drop_cat',
	    'hierarchical' => false,
	    // This array of options controls the labels displayed in the WordPress Admin UI
	    'labels' => array(
	      'name' => _x( 'Business Types', 'taxonomy general name' ),
	      'singular_name' => _x( 'Business Type', 'taxonomy singular name' ),
	      'search_items' =>  __( 'Search Business Types' ),
	      'all_items' => __( 'All Business Types' ),
	      'parent_item' => __( 'Parent Business Type' ),
	      'parent_item_colon' => __( 'Parent Business Type:' ),
	      'edit_item' => __( 'Edit Business Type' ),
	      'update_item' => __( 'Update Business Type' ),
	      'add_new_item' => __( 'Add New Business Type' ),
	      'new_item_name' => __( 'New Location Business Type' ),
	      'menu_name' => __( 'Business Types' ),
	    ),
	    // Control the slugs used for this taxonomy
	    'rewrite' => array(
	      'slug' => 'business-types', // This controls the base slug that will display before each term
	      'with_front' => false, // Don't display the category base before "/locations/"
	      'hierarchical' => false // This will allow URL's like "/locations/boston/cambridge/"
	    ),
	  ));
	}
	add_action( 'init', 'add_custom_taxonomies', 0 );
function add_business_type_box() {
    add_meta_box('business_type_box_ID', __('Business Type'), 'drop_cat', 'favoritos', 'side', 'core');
}   
 
function add_business_type_menus() {
 
    if ( ! is_admin() )
        return;
 
    add_action('admin_menu', 'add_business_type_box');
    add_action('save_post', 'save_business_type_data');
}
 
add_business_type_menus();
//function below re-purposed from wp-admin/includes/meta-boxes.php - post_categories_meta_box()
function drop_cat( $post, $box ) {
 
    echo '<input type="hidden" name="taxonomy_noncename" id="taxonomy_noncename" value="' . 
            wp_create_nonce( 'taxonomy_business-type' ) . '" />';
 
     
    // Get all theme taxonomy terms
    $business_types = get_terms('business-type', 'hide_empty=0'); 
    $names = wp_get_object_terms($post->ID, 'business-type'); 
    ?>
	<select name='post_business_type' id='post_business_type'>
	    <!-- Display business_types as options -->
	        <option class='theme-option' value=''
	        <?php if (!count($names)) echo "selected";?>>None</option>
	        <?php
	    foreach ($business_types as $business_type) {
	        if (!is_wp_error($names) && !empty($names) && !strcmp($business_type->slug, $names[0]->slug)) 
	            echo "<option class='theme-option' value='" . $business_type->slug . "' selected>" . $business_type->name . "</option>\n"; 
	        else
	            echo "<option class='theme-option' value='" . $business_type->slug . "'>" . $business_type->name . "</option>\n"; 
	    }
	   ?>
	</select>    
    <?php
}
function save_business_type_data($post_id) {
// verify this came from our screen and with proper authorization.
 
    if ( !wp_verify_nonce( $_POST['taxonomy_noncename'], 'taxonomy_business-type' )) {
        return $post_id;
    }
 
    // verify if this is an auto save routine. If it is our form has not been submitted, so we dont want to do anything
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
        return $post_id;
 
   
    // Check permissions
    if ( 'page' == $_POST['favoritos'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) )
            return $post_id;
    } else {
        if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;
    }
 
    // OK, we're authenticated: we need to find and save the data
    $post = get_post($post_id);
    if ($post->post_type == 'favoritos') { 
           // OR $post->post_type != 'revision'
           $business_type = $_POST['post_business_type'];
       wp_set_object_terms( $post_id, $business_type, 'business-type' );
        }
    return $business_type;
 
}
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
	<?php echo do_shortcode('[adning id="224"]'); ?>
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
    	$thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(), '', false);
	?>
	<div class="col-md-12 col-sm-6 col-xs-12">
			<div class="scale_image_container">
				<div class="button banner_button banner-title orange"><?php echo get_the_date(); ?></div>
				<a href="<?php the_permalink(); ?>"><img
							 src="<?php echo get_field('main_image'); ?>" style = "height: 280px;" alt=""
							 class="scale_image" /></a>
				<!--caption-->
				<div class="caption_type_1 scale_less">
					<div class="caption_inner">
						<a href="<?php the_permalink(); ?>">
							<h3><small><?php echo substr($title,0,20); ?>...</small> </h3>
							<p class="text-white">
								<?php echo substr($content,0,50); ?>...
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
<?php function adzone_home(){ ?>
	<span><?php echo do_shortcode('[adning id=190]'); ?></span>
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
	<span><?php echo do_shortcode('[adning id="221"]'); ?></span>
</div>
<?php } ?>
<?php  
function adzone_double(){
?>
<div class="scale_image_container push">
    <?php echo do_shortcode('[adning id="224"]'); ?>
</div>
<div class="scale_image_container push">
    <span><?php echo do_shortcode('[adning id="221"]'); ?></span>
</div>
<?php 
	} 
	function custom_user_profile_fields($user){
?>
	    <table class="form-table">
	        <tr>
	            <th><label for="age">Age</label></th>
	            <td>
	                <input type="text" class="regular-text" name="age" value="<?php echo esc_attr( get_the_author_meta( 'age', $user->ID ) ); ?>" id="age" /><br />
	            </td>
	        </tr>
	        <tr>
	            <th><label for="gender">Gender</label></th>
	            <td>
	                <select name="gender" id="gender">
	                	<option value="male" <?php if(esc_attr( get_the_author_meta( 'gender', $user->ID ) ) == 'male'){ echo 'selected'; } ?>>Male</option>
	                	<option value="female" <?php if(esc_attr( get_the_author_meta( 'gender', $user->ID ) ) == 'female'){ echo 'selected'; } ?>>Female</option>
	                </select>
	            </td>
	        </tr>
	        <tr>
	            <th><label for="location">Ciudad</label></th>
	            <td>
	                <select name="location" id="location">
	                	<?php  
	                		$locations = get_terms('location', array('hide_empty' => false,));
	                		foreach ($locations as $location) {
	                	?>
	                	<option value="<?php echo $location->term_id ?>" <?php if(esc_attr( get_the_author_meta( 'location', $user->ID ) ) == $location->term_id){ echo 'selected'; } ?>><?php echo $location->name; ?></option>
	                	<?php } ?>
	                </select>
	            </td>
	        </tr>
	    </table>
	  <?php
	}
	add_action( 'show_user_profile', 'custom_user_profile_fields' );
	add_action( 'edit_user_profile', 'custom_user_profile_fields' );
	add_action( "user_new_form", "custom_user_profile_fields" );
	function save_custom_user_profile_fields($user_id){
	    # again do this only if you can
	    if(!current_user_can('manage_options'))
	        return false;
	    # save my custom field
	    update_usermeta($user_id, 'age', $_POST['age']);
	    update_usermeta($user_id, 'gender', $_POST['gender']);
	    update_usermeta($user_id, 'location', $_POST['location']);
	}
	add_action('user_register', 'save_custom_user_profile_fields');
	add_action('profile_update', 'save_custom_user_profile_fields');
	function register_user_form(){
		$errors = array();
		$required = array(
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Email Address',
			'age' => 'Age',
			'gender' => 'Gender',
			'username' => 'Username',
			'password' => 'Password',
			'confirm_password' => 'Confirm Password',
			'location' => 'Ciudad',
		);
		foreach ($required as $key => $value) {
			if(!isset($_POST[$key]) || empty($_POST[$key])){
				$errors[] = $value . ' is required.';
			}
		}
		if((isset($_POST['username']) && !empty($_POST['username'])) && username_exists($_POST['username'])){
			$errors[] = 'Username already exists.';
		}
		if((isset($_POST['email']) && !empty($_POST['email'])) && email_exists($_POST['email'])){
			$errors[] = 'Email address already exists.';
		}
		if((isset($_POST['email']) && !empty($_POST['email'])) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errors[] = 'Invalid Email address.';
		}
		if((isset($_POST['password']) && !empty($_POST['password'])) && (isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])) && $_POST['password'] != $_POST['confirm_password']){ 
			$errors[] = 'Passwords does not match.';
		}
		if(!isset($_POST['terms'])){
			$errors[] = 'Please agree to the terms of service.';
		}
		$return_url = '';
		if(isset($_POST['return_url']) && !empty($_POST['return_url'])){
			$return_url = '?return_url=' . $_POST['return_url'];
		}
		
		if($errors){
			$_SESSION['errors'] = $errors;
			$_SESSION['inputs'] = $_POST;
			wp_redirect(get_permalink($_POST['page_id']) . $return_url);
			exit();
		}
		$result = wp_insert_user(array(
			'user_pass' => $_POST['password'],
			'user_login' => $_POST['username'],
			'user_email' => $_POST['email'],
			'first_name' => $_POST['first_name'],
			'last_name' => $_POST['last_name'],
			'role' => 'subscriber',
		));
		if(isset($result->errors)){
			foreach ($result->errors as $key => $value) {
				$errors[] = $value[0];
				$_SESSION['errors'] = $errors;
				$_SESSION['inputs'] = $_POST;
				wp_redirect(get_permalink($_POST['page_id']) . $return_url);
				exit();
			}
		}else{
			update_usermeta($result, 'age', $_POST['age']);
		    update_usermeta($result, 'gender', $_POST['gender']);
		    update_usermeta($result, 'location', $_POST['location']);
			$_SESSION['success'] = 'Your new account has been created. You may now login';
			$_SESSION['input']['username'] = $_POST['username'];
			wp_redirect(get_permalink(80) . $return_url);
		}
	}
	add_action( 'admin_post_nopriv_registration_form', 'register_user_form' );
	add_action( 'admin_post_registration_form', 'register_user_form' );	
	function login_user_form(){
		$errors = array();
		$required = array(
			'username' => 'Username',
			'password' => 'Password',
		);
		foreach ($required as $key => $value) {
			if(!isset($_POST[$key]) || empty($_POST[$key])){
				$errors[] = $value . ' is required.';
			}
		}
		$return_url = '';
		if(isset($_POST['return_url']) && !empty($_POST['return_url'])){
			$return_url = '?return_url=' . $_POST['return_url'];
		}
		if($errors){
			$_SESSION['errors'] = $errors;
			$_SESSION['inputs'] = $_POST;
			wp_redirect(get_permalink($_POST['page_id']) . $return_url);
			exit();
		}
		$creds = array(
	        'user_login'    => $_POST['username'],
	        'user_password' => $_POST['password'],
	        'remember'      => (isset($_POST['remember']) ? true : false)
	    );
	 
	    $user = wp_signon( $creds, false );
	 
	    if ( is_wp_error( $user ) ) {
	        $errors[] = $user->get_error_message();
	        $_SESSION['errors'] = $errors;
			$_SESSION['inputs'] = $_POST;
			wp_redirect(get_permalink($_POST['page_id']) . $return_url);
	    }else{
	    	setcookie("ciudad", get_the_author_meta('location', get_current_user_id()), time()+3600);
	    	if(isset($_POST['return_url']) && !empty($_POST['return_url'])){
	    		wp_redirect($_POST['return_url']);
	    	}else{
	    		wp_redirect(home_url());
	    	}
	    	
    		exit();
	    }
	}
	add_action( 'admin_post_nopriv_login_form', 'login_user_form' );
	add_action( 'admin_post_login_form', 'login_user_form' );
	function ganatelo_form(){
		global $wpdb;
		$errors = array();
		$required = array(
			'page_id' => 'Ganatelo',
		);
		foreach ($required as $key => $value) {
			if(!isset($_POST[$key]) || empty($_POST[$key])){
				$errors[] = $value . ' is required.';
			}
		}
		if('publish' != get_post_status($_POST['page_id']) || get_post_type($_POST['page_id']) != 'ganatelos') {
		    $errors[] = 'Ganatelo does not exist.';
		}
		if(!is_user_logged_in()){
			$errors[] = 'Please login to register.';
		}
		if(is_user_logged_in() && is_registered_ganatelo($_POST['page_id'], get_current_user_id())){
			$errors[] = 'You are already registered.';
		}
		if($errors){
			$_SESSION['errors'] = $errors;
			wp_redirect(get_permalink($_POST['page_id']));
			exit();
		}
 		$result = $wpdb->insert($wpdb->prefix . 'ganatelo', array(
            'ganatelo_id' => $_POST['page_id'],
            'user_id'  =>   get_current_user_id(),
            'created' => date('Y-m-d H:i:s'),
           	'modified' => date('Y-m-d H:i:s'),
        ));
        if($result){
        	$_SESSION['success'] = 'You have been registered succesfully.';
        }else{
        	$errors[] = 'Something went wrong. Please try again later.';
        }
        wp_redirect(get_permalink($_POST['page_id']));
		exit();
	}
	add_action( 'admin_post_nopriv_ganatelo_form', 'ganatelo_form' );
	add_action( 'admin_post_ganatelo_form', 'ganatelo_form' );	
	/** Step 2 (from text above). */
	add_action( 'admin_menu', 'ganatelo_menu' );
	/** Step 1. */
	function ganatelo_menu() {
		add_menu_page( 'Ganatelo', 'Ganatelo', 'manage_options', 'ganatelo-list', 'ganatelo_list' );
	}
	/** Step 3. */
	function ganatelo_list() {
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		if(isset($_GET['ganatelo_id'])){
			if(!isset($_GET['draw'])){
				require_once( get_template_directory() . '/ganatelo/ganatelo-registrants.php' );
			}else{
				require_once( get_template_directory() . '/ganatelo/ganatelo-draw.php' );
			}
		}else{
			require_once( get_template_directory() . '/ganatelo/ganatelo-list.php' );
		}
	}

	function wpdocs_selectively_enqueue_admin_script( $hook ) {
	    if ( 'toplevel_page_ganatelo-list' != $hook ) {
	        return;
	    }
	    wp_enqueue_style( 'ganatlo_css', get_template_directory_uri() . '/css/ganatelo.css', array(), '1.0' );
	    wp_enqueue_script( 'ganatlo_script', get_template_directory_uri() . '/js/ganatelo.js', array(), '1.0' );
	    wp_localize_script('ganatlo_script', 'the_ajax_script', array('ajaxurl' =>admin_url('admin-ajax.php')));
	}

	add_action( 'admin_enqueue_scripts', 'wpdocs_selectively_enqueue_admin_script' );

	function ganatelo_winner_ajax(){
		global $wpdb;

		$wpdb->query($wpdb->prepare('UPDATE ' . $wpdb->prefix . 'ganatelo SET winner = 1 WHERE user_id = ' . $_POST['id']));
	}

	add_action('wp_ajax_nopriv_ganatelo_winner_ajax', 'ganatelo_winner_ajax');
	add_action('wp_ajax_ganatelo_winner_ajax', 'ganatelo_winner_ajax');
?>