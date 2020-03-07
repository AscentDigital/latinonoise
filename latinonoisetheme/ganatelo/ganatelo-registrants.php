<?php
	require_once( get_template_directory() . '/classes/class-wp-ganatelo-registrants.php' );
?>
			<div class="wrap">
			<div id="icon-users" class="icon32"></div>
			<h1 class="wp-heading-inline"><?php _e('Registrants'); ?></h1>
			<a href="<?php echo admin_url() . '?page=ganatelo-list&ganatelo_id=' . $_GET['ganatelo_id']; ?>&draw=true" class="page-title-action">Draw Winner</a>
<?php
			$wp_ganatelo_table = new Ganatelo_Registrants_Table();
			$wp_ganatelo_table->prepare_items();
			$wp_ganatelo_table->display();
?>
			</div>