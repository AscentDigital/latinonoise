<?php  
	global $wpdb;
	$ganatelo = get_post($_GET['ganatelo_id']);
	$registrants = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'ganatelo WHERE ganatelo_id = ' . $_GET['ganatelo_id'] . ' ORDER BY RAND()');
	$registrants_array = array();
	foreach ($registrants as $registrant) {
		$user = get_userdata($registrant->user_id);
		$registrants_array[] = array(
			$registrant->user_id,
			$user->display_name,
		);
	}
?>
<div class="wrap">
	<h1 class="wp-heading-inline"><?php _e('Draw winner for '); echo '<b><i>' . $ganatelo->post_title . '</b></i>';?></h1>
	<div class="container">
		<div class="row topbox">
			<div class="col-md-6 col-md-offset-3 rollbox">
				<div class="line"></div>
				<table id="loadout-table"><tr id="loadout">
					
				</tr></table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<button id="roll" class="btn btn-success form-control">Roll</button>
			</div>
		</div>
		<div class="row">	
			<div class="col-md-12" style="text-align:center">
				<div id="log"></div>
			</div>
		</div>
	</div>
</div>
<input type="hidden" id="registrants" value="<?php echo htmlspecialchars(json_encode($registrants_array)); ?>">