<?php
	require_once( get_template_directory() . '/classes/class-wp-ganatelo-list.php' );
?>
			<div class="wrap">
			<div id="icon-users" class="icon32"></div>
			<h1 class="wp-heading-inline"><?php _e('Ganatelos'); ?></h1>
<?php
			$wp_ganatelo_table = new Ganatelo_List_Table();
			$wp_ganatelo_table->prepare_items();
			$wp_ganatelo_table->display();
?>
			</div>