<?php

function add_registrations_menu_page(){
	add_menu_page('Registered Users', 'Registered Users', 'manage_options', 'registration-users-single', 'function_view_registered_users_single', 'dashicons-id-alt', '50');
	add_submenu_page('registration-users-single', 'Single Delegation', 'Single Delegation', 'manage_options', 'registration-users-single', 'function_view_registered_users_single');
	add_submenu_page('registration-users-single', 'Double Delegation', 'Double Delegation', 'manage_options', 'registration-users-double', 'function_view_registered_users_double');
	add_submenu_page('registration-users-single', 'IP Registrations', 'IP Registrations', 'manage_options', 'registration-users-ip', 'function_view_registered_users_ip');
}

add_action('admin_menu', 'add_registrations_menu_page');

function function_view_registered_users_single(){ ?>
	<div class="wrap">
		<h1 class="wp-heading-inline">Single Delegation Registration List</h1>
		<br/><br/>
		<?php 
		global $wpdb;
		$results = $wpdb->get_results('SELECT * FROM registration_single_delegation');
		foreach ($results as $r) { ?>
			<button class="accordion"><?php echo $r->id; ?>. Name: <?php echo $r->Name; ?></button>
			<div class="panel">
				<?php 
				foreach ($r as $key=>$value) {
					?><h4><?php echo $key; ?>: <?php echo $value; ?></h4><?php 
				} ?>
			</div>
		<?php }
		?>
	</div>
<?php }

function function_view_registered_users_ip(){ ?>
	<div class="wrap">
		<h1 class="wp-heading-inline">International Press Registration List</h1>
		<br/><br/>
		<?php 
		global $wpdb;
		$results = $wpdb->get_results('SELECT * FROM registration_ip');
		foreach ($results as $r) { ?>
			<button class="accordion"><?php echo $r->id; ?>. Name: <?php echo $r->Name; ?></button>
			<div class="panel">
				<?php 
				foreach ($r as $key=>$value) {
					?><h4><?php echo $key; ?>: <?php echo $value; ?></h4><?php 
				} ?>
			</div>
		<?php }
		?>
	</div>
<?php }

function function_view_registered_users_double(){ ?>
	<div class="wrap">
		<h1 class="wp-heading-inline">International Press Registration List</h1>
		<br/><br/>
		<?php 
		global $wpdb;
		$results = $wpdb->get_results('SELECT * FROM registration_double_delegation');
		foreach ($results as $r) { ?>
			<button class="accordion"><?php echo $r->id; ?>. Name1: <?php echo $r->Name1; ?>. Name2: <?php echo $r->Name2; ?></button>
			<div class="panel">
				<?php 
				foreach ($r as $key=>$value) {
					?><h4><?php echo $key; ?>: <?php echo $value; ?></h4><?php 
				} ?>
			</div>
		<?php }
		?>
	</div>
<?php }