<?php

/*
=====================================================
Registrations Admin Panel 
=====================================================
*/

/*
=======================================
Adding or Updating a Field
=======================================
*/
if (isset($_POST['admin-registration-form-submit'])){

	$name = $_POST['admin-registration-form-field-name'];
	$propername = $_POST['admin-registration-form-field-proper-name'];
	$type = $_POST['admin-registration-form-field-type'];
	$label = $_POST['admin-registration-form-field-label'];
	$required = $_POST['admin-registration-form-field-required'];
	$placeholder = " ";
	$options = " ";
	$numberofrows = " "; 
	$delegation = $_POST['admin-registration-form-select-delegation-type'];

	if ($type === 'Text' || $type === 'Email' || $type === 'Number' || $type === 'Password'){
		$placeholder = $_POST['admin-registration-form-field-placeholder'];
	}else if ($type === 'Checkbox' || $type === 'Radio' || $type === 'Select'){
		$options = $_POST['admin-registration-form-field-select-options'];
	}else if ($type === 'Textarea'){
		$numberofrows = $_POST['admin-registration-form-field-number-of-rows'];
		$placeholder = $_POST['admin-registration-form-field-placeholder'];
	}
	if ($delegation === 'Both The Delegates Need To Fill This'){
		$delegation = 'double-double';
	}else if ($delegation === 'Common to both the Delegates'){
		$delegation = 'double-single';
	}

	global $wpdb;
	if (isset($_POST['admin-registration-form-fields-id'])){
		$id = $_POST['admin-registration-form-fields-id'];
		$wpdb->query( $wpdb->prepare(
			"
				UPDATE `registration_form` 
				SET `name`= %s, `propername`= %s, `label`= %s, `placeholder`= %s,`required`= %s, `options`=%s, `numberofrows`=%s 
				WHERE `id`= %d
			",
			$name, $propername, $label, $placeholder, $required, $options, $numberofrows, $id
		));
	}else{
		$id = $wpdb->get_var( 'SELECT id FROM registration_form ORDER BY id DESC LIMIT 1') + 1;
		$wpdb->query( $wpdb->prepare( 
			"
				INSERT INTO registration_form
				( id, name, propername, type, label, placeholder, required, options, numberofrows, delegation )
				VALUES ( %d, %s, %s, %s, %s, %s, %s, %s, %s, %s )
			", 
		        array(
				$id,
				$name,
				$propername, 
				$type, 
				$label,
				$placeholder,
				$required,
				$options,
				$numberofrows,
				$delegation
			) 
		) );	
	}
}


/*
======================================
Deleting a field
======================================
*/

if (isset($_POST['admin-registration-form-delete'])){
	$id = $_POST['admin-registration-form-delete-id'];

	global $wpdb;
	$wpdb->delete('registration_form', array('id' => $id), array('%d'));
}

/*
=========================================
Creating the Table for registrations
=========================================
*/
if (isset($_POST['registration_single_delegation_table_create'])){
	global $wpdb;
	$results = $wpdb->get_col('SELECT propername FROM registration_form WHERE delegation="single"');
	$query = "CREATE TABLE registration_single_delegation (id INT AUTO_INCREMENT PRIMARY KEY, ";
	foreach ($results as $r){
		$query = $query." ".$r." TEXT NOT NULL,";
	}
	$query = $query." Committee1 TEXT NOT NULL, Country11 TEXT NOT NULL, Country12 TEXT NOT NULL, Country13 TEXT NOT NULL, Committee2 TEXT NOT NULL, Country21 TEXT NOT NULL, Country22 TEXT NOT NULL, Country23 TEXT NOT NULL, Committee3 TEXT NOT NULL, Country31 TEXT NOT NULL, Country32 TEXT NOT NULL, Country33 TEXT NOT NULL, FinalCommittee TEXT NOT NULL, FinalCountry TEXT NOT NULL)";
	$wpdb->query($query);
}

if (isset($_POST['registration_double_delegation_table_create'])){
	global $wpdb;
	$wpdb->show_errors();
	$results = $wpdb->get_results('SELECT propername,delegation FROM registration_form WHERE delegation LIKE "double%"');
	$query = "CREATE TABLE registration_double_delegation (id INT AUTO_INCREMENT PRIMARY KEY, ";
	foreach ($results as $r){
		if ($r->delegation === 'double-single'){
			$query = $query." ".$r->propername." TEXT NOT NULL,";	
		}else{
			$query = $query." ".$r->propername."1 TEXT NOT NULL,";
			$query = $query." ".$r->propername."2 TEXT NOT NULL,";
		}
	}
	$query = $query." Committee1 TEXT NOT NULL, Country11 TEXT NOT NULL, Country12 TEXT NOT NULL, Country13 TEXT NOT NULL, Committee2 TEXT NOT NULL, Country21 TEXT NOT NULL, Country22 TEXT NOT NULL, Country23 TEXT NOT NULL, Committee3 TEXT NOT NULL, Country31 TEXT NOT NULL, Country32 TEXT NOT NULL, Country33 TEXT NOT NULL, FinalCommittee TEXT NOT NULL, FinalCountry TEXT NOT NULL)";
	$wpdb->query($query);
}

if (isset($_POST['registration_ip_table_create'])){
	global $wpdb;
	$results = $wpdb->get_col('SELECT propername FROM registration_form WHERE delegation="ip"');
	$query = "CREATE TABLE registration_ip (id INT AUTO_INCREMENT PRIMARY KEY, ";
	foreach ($results as $r){
		$query = $query." ".$r." TEXT NOT NULL,";
	}
	$query = $query." Committee1 TEXT NOT NULL, Country1 TEXT NOT NULL, Committee2 TEXT NOT NULL, Country2 TEXT NOT NULL, Committee3 TEXT NOT NULL, Country3 TEXT NOT NULL, FinalCommittee TEXT NOT NULL, FinalCountry TEXT NOT NULL)";
	$wpdb->query($query);
}


/*
===============================================================================
Add the registrations page to admin menu
===============================================================================
*/
add_action('admin_menu', 'add_registrations_page');

function add_registrations_page(){
	add_menu_page('Registrations Form', 'Registration Form', 'manage_options', 'registration-form-single', 'function_create_single_delegation_registrations_form_page', 'dashicons-list-view', '50');

	add_submenu_page('registration-form-single', 'Registrations Form Single Delegation', 'Single Delegation Form', 'manage_options', 'registration-form-single', 'function_create_single_delegation_registrations_form_page');
	add_submenu_page('registration-form-single', 'Add Fields Single Delegation', 'Add Single Delegation Fields', 'manage_options', 'registration-form-add-single', 'function_create_single_delegation_registrations_form_page_add');
	add_submenu_page('registration-form-single', 'Reorder Fields Single Delegation', 'Reorder Single Delegation Fields', 'manage_options', 'registration-form-reorder-single', 'function_create_single_delegation_registrations_form_page_reorder');

	add_submenu_page('registration-form-single', 'Registrations Form Double Delegation', 'Double Delegation Form', 'manage_options', 'registration-form-double', 'function_create_double_delegation_registrations_form_page');
	add_submenu_page('registration-form-single', 'Registrations Form Double Delegation', 'Add Double Delegation Fields', 'manage_options', 'registration-form-add-double', 'function_create_double_delegation_registrations_form_page_add');
	add_submenu_page('registration-form-single', 'Registrations Form Double Delegation', 'Reorder Double Delegation Form', 'manage_options', 'registration-form-reorder-double', 'function_create_double_delegation_registrations_form_page_reorder');

	add_submenu_page('registration-form-single', 'Registrations Form International Press', 'International Press Form', 'manage_options', 'registration-form-ip', 'function_create_ip_registrations_form_page');
	add_submenu_page('registration-form-single', 'Registrations Form International Press', 'Add International Press Fields', 'manage_options', 'registration-form-add-ip', 'function_create_ip_registrations_form_page_add');
	add_submenu_page('registration-form-single', 'Registrations Form International Press', 'Reorder International Press Form', 'manage_options', 'registration-form-reorder-ip', 'function_create_ip_registrations_form_page_reorder');

	add_submenu_page('registration-form-single', 'Build Registrations Table', 'Build Registrations Table', 'manage_options', 'registrations-enable', 'function_create_registrations_enable_page');
}

/*
==============================================================================================
Create the Registration page for Viewing, Editing or Deleting the Single Delegation Fields
==============================================================================================
*/
function function_create_single_delegation_registrations_form_page(){ ?>
	<div class="wrap">
		<h1 class="wp-heading-inline">Single Delegation Registration Form</h1>
		<a href="<?php echo get_home_url(); ?>/wp-admin/admin.php?page=registration-form-add-single" class="page-title-action">Add New</a>
		<hr class="wp-header-end">
		<?php if (isset($_POST['admin-registration-form-submit'])){
		?>
			<div id="message" class="updated notice is-dismissible">
				<p>1 Field Updated.</p>
				<button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
			</div>
		<?php }
		if (isset($_POST['admin-registration-form-delete'])){
		?>
			<div id="message" class="updated notice is-dismissible">
				<p>1 Field Deleted.</p>
				<button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
			</div>
		<?php } ?>
		<br/>

		<?php 
		global $wpdb;
		$query = $wpdb->query('SHOW TABLES LIKE "registration_single_delegation"');
		if ($query){ ?>
		<h3>Single Delegate Registration Table has already been created</h3>
		<?php 
		return;
		}

		$results = $wpdb->get_results( "SELECT * FROM registration_form WHERE delegation='single'" );
		
		foreach ($results as $r) { ?>
			<button class="accordion registrations">Name: <?php echo $r->propername; ?>. Type: <?php echo $r->type; ?></button>
			<div class="panel registrations">
				<br/>
				<form action="<?php echo get_the_permalink(); ?>" method="post">
					<input type="hidden" name="admin-registration-form-select-delegation-type" value="single">
					<input type="hidden" name="admin-registration-form-submit" value="Yes">
					<input type="hidden" name="admin-registration-form-fields-id" value="<?php echo $r->id; ?>">
					<input type="hidden" name="admin-registration-form-field-type" value="<?php echo $r->type; ?>">
					<div>	
						<label for="admin-registration-form-field-proper-name">Name (To be used for identification purposes. Should not contain any space):</label>
						<input type="text" name="admin-registration-form-field-proper-name" id="admin-registration-form-field-proper-name" required value="<?php echo $r->propername; ?>">
					</div>

					<div>	
						<label for="admin-registration-form-field-name">Name (Should be in the form of single-delegate- ):</label>
						<input type="text" name="admin-registration-form-field-name" id="admin-registration-form-field-name" required value="<?php echo $r->name; ?>">
					</div>

					<div>
						<label for="admin-registration-form-field-label">Label:</label>
						<input type="text" name="admin-registration-form-field-label" id="admin-registration-form-field-label" required value="<?php echo $r->label; ?>">
					</div>

					<?php if ($r->type === 'Text' || $r->type === 'Password' || $r->type === 'Email' || $r->type === 'Number'){ ?>
					<div>
						<label for="admin-registration-form-field-placeholder">Placeholder:</label>
						<input type="text" name="admin-registration-form-field-placeholder" id="admin-registration-form-field-placeholder" required value="<?php echo $r->placeholder; ?>">
					</div>
					<?php }else if ($r->type === 'Radio' || $r->type === 'Select' || $r->type === 'Checkbox'){ ?>
					<div>
						<label for="admin-registration-form-field-select-options">Enter the options separated by a comma:</label>
						<input type="text" name="admin-registration-form-field-select-options" id="admin-registration-form-field-select-options" value="<?php echo $r->options; ?>">
					</div>
					<?php }else if ($r->type === 'Textarea'){ ?>
					<div>
						<label for="admin-registration-form-field-placeholder">Placeholder:</label>
						<input type="text" name="admin-registration-form-field-placeholder" id="admin-registration-form-field-placeholder" value="<?php echo $r->placeholder; ?>">
					</div>
					<div>
						<label for="admin-registration-form-field-number-of-rows">Number of rows:</label>
						<input type="number" name="admin-registration-form-field-number-of-rows" id="admin-registration-form-field-number-of-rows" value="<?php echo $r->numberofrows; ?>">
					</div>
					<?php } ?>


					<div>
						<label for="admin-registration-form-field-required">Required?</label>
						<input type="radio" name="admin-registration-form-field-required" value="yes" <?php if ($r->required === 'yes'){echo "checked";} ?>>Yes
						<input type="radio" name="admin-registration-form-field-required" value="no" <?php if ($r->required === 'no'){echo "checked";} ?>>No
					</div>

					<hr style="width: 100%; border-color: transparent;">
					
					<div>
						<button type="submit" class="button button-primary">Update</button>
					</div>
				</form>
				<form action="<?php echo get_the_permalink(); ?>" method="post">
					<input type="hidden" name="admin-registration-form-delete" value="Yes">
					<input type="hidden" name="admin-registration-form-delete-id" value="<?php echo $r->id; ?>">
					<div>
						<button type="submit" class="button button-primary">Delete</button>
					</div> 
				</form>
			</div>
		<?php }
		?>

	</div>
<?php }



/*
============================================================================================
Create the Registration page for Viewing, Editing or Deleting the Double Delegation Fields
============================================================================================
*/
function function_create_double_delegation_registrations_form_page(){ ?>
	<div class="wrap">
		<h1 class="wp-heading-inline">Double Delegation Registration Form</h1>
		<a href="<?php echo get_home_url(); ?>/wp-admin/admin.php?page=registration-form-add-double" class="page-title-action">Add New</a>
		<hr class="wp-header-end">
		<?php if (isset($_POST['admin-registration-form-submit'])){
		?>
			<div id="message" class="updated notice is-dismissible">
				<p>1 Field Updated.</p>
				<button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
			</div>
		<?php }
		if (isset($_POST['admin-registration-form-delete'])){
		?>
			<div id="message" class="updated notice is-dismissible">
				<p>1 Field Deleted.</p>
				<button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
			</div>
		<?php } ?>
		<br/>

		<?php 
		global $wpdb;
		$query = $wpdb->query('SHOW TABLES LIKE "registration_double_delegation"');
		if ($query){ ?>
		<h3>Double Delegate Registration Table has already been created</h3>
		<?php 
		return;
		}
		$results = $wpdb->get_results( "SELECT * FROM registration_form WHERE delegation LIKE 'double%'" );
		
		foreach ($results as $r) { ?>
			<button class="accordion registrations">Name: <?php echo $r->propername; ?>. Type: <?php echo $r->type; ?></button>
			<div class="panel registrations">
				<br/>
				<form action="<?php echo get_the_permalink(); ?>" method="post">
					<input type="hidden" name="admin-registration-form-submit" value="Yes">
					<input type="hidden" name="admin-registration-form-fields-id" value="<?php echo $r->id; ?>">
					<input type="hidden" name="admin-registration-form-field-type" value="<?php echo $r->type; ?>">
					
					<div>	
						<label for="admin-registration-form-field-proper-name">Name ( To be used for identification purposes. Should not contain any space ) :</label>
						<input type="text" name="admin-registration-form-field-proper-name" id="admin-registration-form-field-proper-name" required value="<?php echo $r->propername; ?>">
					</div>

					<div>	
						<label for="admin-registration-form-field-name">Name ( Should be in the form of double-delegate- ) :</label>
						<input type="text" name="admin-registration-form-field-name" id="admin-registration-form-field-name" required value="<?php echo $r->name; ?>">
					</div>

					<div>
						<label for="admin-registration-form-field-label">Label:</label>
						<input type="text" name="admin-registration-form-field-label" id="admin-registration-form-field-label" required value="<?php echo $r->label; ?>">
					</div>

					<div>
						<label for="admin-registration-form-select-delegation-type">Select Double Delegation Field Type</label>
						<select id="admin-registration-form-select-delegation-type" name="admin-registration-form-select-delegation-type">
							<option <?php if ($r->delegation==='double-double'){echo "selected"; } ?>>Both The Delegates Need To Fill This</option>
							<option <?php if ($r->delegation==='double-single'){echo "selected"; } ?>>Common to both the Delegates</option>
						</select> 
					</div>

					<?php if ($r->type === 'Text' || $r->type === 'Password' || $r->type === 'Email' || $r->type === 'Number'){ ?>
					<div>
						<label for="admin-registration-form-field-placeholder">Placeholder:</label>
						<input type="text" name="admin-registration-form-field-placeholder" id="admin-registration-form-field-placeholder" required value="<?php echo $r->placeholder; ?>">
					</div>
					<?php }else if ($r->type === 'Radio' || $r->type === 'Select' || $r->type === 'Checkbox'){ ?>
					<div>
						<label for="admin-registration-form-field-select-options">Enter the options separated by a comma:</label>
						<input type="text" name="admin-registration-form-field-select-options" id="admin-registration-form-field-select-options" value="<?php echo $r->options; ?>">
					</div>
					<?php }else if ($r->type === 'Textarea'){ ?>
					<div>
						<label for="admin-registration-form-field-placeholder">Placeholder:</label>
						<input type="text" name="admin-registration-form-field-placeholder" id="admin-registration-form-field-placeholder" value="<?php echo $r->placeholder; ?>">
					</div>
					<div>
						<label for="admin-registration-form-field-number-of-rows">Number of rows:</label>
						<input type="number" name="admin-registration-form-field-number-of-rows" id="admin-registration-form-field-number-of-rows" value="<?php echo $r->numberofrows; ?>">
					</div>
					<?php } ?>


					<div>
						<label for="admin-registration-form-field-required">Required?</label>
						<input type="radio" name="admin-registration-form-field-required" value="yes" <?php if ($r->required === 'yes'){echo "checked";} ?>>Yes
						<input type="radio" name="admin-registration-form-field-required" value="no" <?php if ($r->required === 'no'){echo "checked";} ?>>No
					</div>

					<hr style="width: 100%; border-color: transparent;">
					
					<div>
						<button type="submit" class="button button-primary">Update</button>
					</div>
				</form>
				<form action="<?php echo get_the_permalink(); ?>" method="post">
					<input type="hidden" name="admin-registration-form-delete" value="Yes">
					<input type="hidden" name="admin-registration-form-delete-id" value="<?php echo $r->id; ?>">
					<div>
						<button type="submit" class="button button-primary">Delete</button>
					</div> 
				</form>
			</div>
		<?php }
		?>

	</div>
<?php }


/*
============================================================================================
Create the Registration page for Viewing, Editing or Deleting the International Press Fields
============================================================================================
*/
function function_create_ip_registrations_form_page(){ ?>
	<div class="wrap">
		<h1 class="wp-heading-inline">International Press Registration Form</h1>
		<a href="<?php echo get_home_url(); ?>/wp-admin/admin.php?page=registration-form-add-ip" class="page-title-action">Add New</a>
		<hr class="wp-header-end">
		<?php if (isset($_POST['admin-registration-form-submit'])){
		?>
			<div id="message" class="updated notice is-dismissible">
				<p>1 Field Updated.</p>
				<button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
			</div>
		<?php }
		if (isset($_POST['admin-registration-form-delete'])){
		?>
			<div id="message" class="updated notice is-dismissible">
				<p>1 Field Deleted.</p>
				<button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
			</div>
		<?php } ?>
		<br/>

		<?php 
		global $wpdb;
		$query = $wpdb->query('SHOW TABLES LIKE "registration_ip"');
		if ($query){ ?>
		<h3>International Press Registration Table has already been created</h3>
		<?php 
		return;
		}
		$results = $wpdb->get_results( "SELECT * FROM registration_form WHERE delegation='ip'" );
		
		foreach ($results as $r) { ?>
			<button class="accordion registrations">Name: <?php echo $r->propername; ?>. Type: <?php echo $r->type; ?></button>
			<div class="panel registrations">
				<br/>
				<form action="<?php echo get_the_permalink(); ?>" method="post">
					<input type="hidden" name="admin-registration-form-select-delegation-type" value="ip">
					<input type="hidden" name="admin-registration-form-submit" value="Yes">
					<input type="hidden" name="admin-registration-form-fields-id" value="<?php echo $r->id; ?>">
					<input type="hidden" name="admin-registration-form-field-type" value="<?php echo $r->type; ?>">
					<div>	
						<label for="admin-registration-form-field-proper-name">Name (To be used for identification purposes. Should not contain any space):</label>
						<input type="text" name="admin-registration-form-field-proper-name" id="admin-registration-form-field-proper-name" required value="<?php echo $r->propername; ?>">
					</div>

					<div>	
						<label for="admin-registration-form-field-name">Name (Should be in the form of single-delegate- ):</label>
						<input type="text" name="admin-registration-form-field-name" id="admin-registration-form-field-name" required value="<?php echo $r->name; ?>">
					</div>

					<div>
						<label for="admin-registration-form-field-label">Label:</label>
						<input type="text" name="admin-registration-form-field-label" id="admin-registration-form-field-label" required value="<?php echo $r->label; ?>">
					</div>

					<?php if ($r->type === 'Text' || $r->type === 'Password' || $r->type === 'Email' || $r->type === 'Number'){ ?>
					<div>
						<label for="admin-registration-form-field-placeholder">Placeholder:</label>
						<input type="text" name="admin-registration-form-field-placeholder" id="admin-registration-form-field-placeholder" required value="<?php echo $r->placeholder; ?>">
					</div>
					<?php }else if ($r->type === 'Radio' || $r->type === 'Select' || $r->type === 'Checkbox'){ ?>
					<div>
						<label for="admin-registration-form-field-select-options">Enter the options separated by a comma:</label>
						<input type="text" name="admin-registration-form-field-select-options" id="admin-registration-form-field-select-options" value="<?php echo $r->options; ?>">
					</div>
					<?php }else if ($r->type === 'Textarea'){ ?>
					<div>
						<label for="admin-registration-form-field-placeholder">Placeholder:</label>
						<input type="text" name="admin-registration-form-field-placeholder" id="admin-registration-form-field-placeholder" value="<?php echo $r->placeholder; ?>">
					</div>
					<div>
						<label for="admin-registration-form-field-number-of-rows">Number of rows:</label>
						<input type="number" name="admin-registration-form-field-number-of-rows" id="admin-registration-form-field-number-of-rows" value="<?php echo $r->numberofrows; ?>">
					</div>
					<?php } ?>


					<div>
						<label for="admin-registration-form-field-required">Required?</label>
						<input type="radio" name="admin-registration-form-field-required" value="yes" <?php if ($r->required === 'yes'){echo "checked";} ?>>Yes
						<input type="radio" name="admin-registration-form-field-required" value="no" <?php if ($r->required === 'no'){echo "checked";} ?>>No
					</div>

					<hr style="width: 100%; border-color: transparent;">
					
					<div>
						<button type="submit" class="button button-primary">Update</button>
					</div>
				</form>
				<form action="<?php echo get_the_permalink(); ?>" method="post">
					<input type="hidden" name="admin-registration-form-delete" value="Yes">
					<input type="hidden" name="admin-registration-form-delete-id" value="<?php echo $r->id; ?>">
					<div>
						<button type="submit" class="button button-primary">Delete</button>
					</div> 
				</form>
			</div>
		<?php }
		?>

	</div>
<?php }


/*
============================================================================================
Create the Registration page for Adding a Single Delegation Field
============================================================================================
*/
function function_create_single_delegation_registrations_form_page_add(){ ?>
	<div class="wrap">
		<h1 class="wp-heading-inline">Single Delegate Form Add Fields</h1>
		<?php 
		if (isset($_POST['admin-registration-form-submit'])){
		?>
			<div id="message" class="updated notice is-dismissible">
				<p>1 Field Added.</p>
				<button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
			</div>
		<?php } ?>
		<hr class="wp-header-end">
		<br/>
		
		<?php
		global $wpdb;
		$query = $wpdb->query('SHOW TABLES LIKE "registration_single_delegation"');
		if ($query){ ?>
		<h3>Single Delegate Registration Table has already been created</h3>
		<?php 
		return;
		} ?>

		<form action="<?php echo get_the_permalink(); ?>" method="post" class="admin-registration-form">

			<input type="hidden" name="admin-registration-form-submit" value="Yes">
			<input type="hidden" name="admin-registration-form-select-delegation-type" value="single">

			<div class="admin-registration-form-select-type">
				<label for="admin-registration-form-field-type">Type:</label><br/>
				<select id="admin-registration-form-field-type" name="admin-registration-form-field-type">
					<option>Checkbox</option>
					<option>Email</option>
					<option>Number</option>
					<option>Password</option>
					<option>Radio</option>
					<option>Select</option>
					<option>Text</option>
					<option>Textarea</option>
				</select>
				<br/><br/>

				<div class="admin-registration-form-select-other-details-checkbox-radio-select">
					<label for="admin-registration-form-field-select-options">Enter the options separated by a comma:</label><br/>
					<input type="text" name="admin-registration-form-field-select-options" id="admin-registration-form-field-select-options"><br/><br/>
				</div>

				<div class="admin-registration-form-select-other-details-text" style="display: none">
					<label for="admin-registration-form-field-placeholder">Placeholder:</label><br/>
					<input type="text" name="admin-registration-form-field-placeholder" id="admin-registration-form-field-placeholder"><br/><br/>
				</div>

				<div class="admin-registration-form-select-other-details-textarea" style="display: none">
					<label for="admin-registration-form-field-number-of-rows">Number of rows:</label><br/>
					<input type="number" name="admin-registration-form-field-number-of-rows" id="admin-registration-form-field-number-of-rows" ><br/><br/>
				</div>
			</div>

			<div class="admin-registration-form-select-other-details-default">
				<label for="admin-registration-form-field-proper-name">Name (To be used for identification purposes. Should not contain any space) :</label><br/>
				<input type="text" name="admin-registration-form-field-proper-name" id="admin-registration-form-field-proper-name" required><br/><br/>
				<label for="admin-registration-form-field-name">Name ( Should be in the form of single-delegate- ) :</label><br/>
				<input type="text" name="admin-registration-form-field-name" id="admin-registration-form-field-name" required><br/><br/>
				<label for="admin-registration-form-field-label">Label:</label><br/>
				<input type="text" name="admin-registration-form-field-label" id="admin-registration-form-field-label" required><br/><br/>
				<label for="admin-registration-form-field-required">Required Field?</label><br/>
				<input type="radio" name="admin-registration-form-field-required" value="yes" checked="checked"/>Yes<br/>
				<input type="radio" name="admin-registration-form-field-required" value="no"/>No<br/><br/>
			</div>

			<button class="button button-primary admin-registration-form-submit" type="submit">Submit</button>
		</form>
	</div>
<?php }


/*
============================================================================================
Create the Registration page for Adding a Double Delegation Field
============================================================================================
*/
function function_create_double_delegation_registrations_form_page_add(){ ?>
	<div class="wrap">
		<h1 class="wp-heading-inline">Double Delegate Form Add Fields</h1>
		<?php 
		if (isset($_POST['admin-registration-form-submit'])){
		?>
			<div id="message" class="updated notice is-dismissible">
				<p>1 Field Added.</p>
				<button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
			</div>
		<?php } ?>
		<hr class="wp-header-end">
		<br/>

		<?php
		global $wpdb;
		$query = $wpdb->query('SHOW TABLES LIKE "registration_double_delegation"');
		if ($query){ ?>
		<h3>Double Delegate Registration Table has already been created</h3>
		<?php 
		return;
		} ?>

		<form action="" method="post" class="admin-registration-form">

			<input type="hidden" name="admin-registration-form-submit" value="Yes">

			<div class="admin-registration-form-select-type">
				<label for="admin-registration-form-field-type">Type:</label><br/>
				<select id="admin-registration-form-field-type" name="admin-registration-form-field-type">
					<option>Checkbox</option>
					<option>Email</option>
					<option>Number</option>
					<option>Password</option>
					<option>Radio</option>
					<option>Select</option>
					<option>Text</option>
					<option>Textarea</option>
				</select>
				<br/><br/>

				<label for="admin-registration-form-select-delegation-type">Select Double Delegation Field Type</label><br/>
				<select id="admin-registration-form-select-delegation-type" name="admin-registration-form-select-delegation-type">
					<option>Both The Delegates Need To Fill This</option>
					<option>Common to both the Delegates</option>
				</select> 
				<br/><br/>

				<div class="admin-registration-form-select-other-details-checkbox-radio-select">
					<label for="admin-registration-form-field-select-options">Enter the options separated by a comma:</label><br/>
					<input type="text" name="admin-registration-form-field-select-options" id="admin-registration-form-field-select-options"><br/><br/>
				</div>

				<div class="admin-registration-form-select-other-details-text" style="display: none">
					<label for="admin-registration-form-field-placeholder">Placeholder:</label><br/>
					<input type="text" name="admin-registration-form-field-placeholder" id="admin-registration-form-field-placeholder"><br/><br/>
				</div>

				<div class="admin-registration-form-select-other-details-textarea" style="display: none">
					<label for="admin-registration-form-field-number-of-rows">Number of rows:</label><br/>
					<input type="number" name="admin-registration-form-field-number-of-rows" id="admin-registration-form-field-number-of-rows" ><br/><br/>
				</div>
			</div>

			<div class="admin-registration-form-select-other-details-default">
				<label for="admin-registration-form-field-proper-name">Name (To be used for identification purposes. Should not contain any space) :</label><br/>
				<input type="text" name="admin-registration-form-field-proper-name" id="admin-registration-form-field-proper-name" required><br/><br/>
				<label for="admin-registration-form-field-name">Name ( Should be in the form of double-delegate- ) :</label><br/>
				<input type="text" name="admin-registration-form-field-name" id="admin-registration-form-field-name" required><br/><br/>
				<label for="admin-registration-form-field-label">Label:</label><br/>
				<input type="text" name="admin-registration-form-field-label" id="admin-registration-form-field-label" required><br/><br/>
				<label for="admin-registration-form-field-required">Required Field?</label><br/>
				<input type="radio" name="admin-registration-form-field-required" value="yes" checked="checked"/>Yes<br/>
				<input type="radio" name="admin-registration-form-field-required" value="no"/>No<br/><br/>
			</div>

			<button class="button button-primary admin-registration-form-submit" type="submit">Submit</button>
		</form>
	</div>
<?php }



/*
============================================================================================
Create the Registration page for Adding a International Press Field
============================================================================================
*/
function function_create_ip_registrations_form_page_add(){ ?>
	<div class="wrap">
		<h1 class="wp-heading-inline">International Press Form Add Fields</h1>
		<?php 
		if (isset($_POST['admin-registration-form-submit'])){
		?>
			<div id="message" class="updated notice is-dismissible">
				<p>1 Field Added.</p>
				<button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
			</div>
		<?php } ?>
		<hr class="wp-header-end">
		<br/>

		<?php
		global $wpdb;
		$query = $wpdb->query('SHOW TABLES LIKE "registration_ip"');
		if ($query){ ?>
		<h3>International Press Registration Table has already been created</h3>
		<?php 
		return;
		} ?>

		<form action="<?php echo get_the_permalink(); ?>" method="post" class="admin-registration-form">

			<input type="hidden" name="admin-registration-form-submit" value="Yes">
			<input type="hidden" name="admin-registration-form-select-delegation-type" value="ip">

			<div class="admin-registration-form-select-type">
				<label for="admin-registration-form-field-type">Type:</label><br/>
				<select id="admin-registration-form-field-type" name="admin-registration-form-field-type">
					<option>Checkbox</option>
					<option>Email</option>
					<option>Number</option>
					<option>Password</option>
					<option>Radio</option>
					<option>Select</option>
					<option>Text</option>
					<option>Textarea</option>
				</select>
				<br/><br/>

				<div class="admin-registration-form-select-other-details-checkbox-radio-select">
					<label for="admin-registration-form-field-select-options">Enter the options separated by a comma:</label><br/>
					<input type="text" name="admin-registration-form-field-select-options" id="admin-registration-form-field-select-options"><br/><br/>
				</div>

				<div class="admin-registration-form-select-other-details-text" style="display: none">
					<label for="admin-registration-form-field-placeholder">Placeholder:</label><br/>
					<input type="text" name="admin-registration-form-field-placeholder" id="admin-registration-form-field-placeholder"><br/><br/>
				</div>

				<div class="admin-registration-form-select-other-details-textarea" style="display: none">
					<label for="admin-registration-form-field-number-of-rows">Number of rows:</label><br/>
					<input type="number" name="admin-registration-form-field-number-of-rows" id="admin-registration-form-field-number-of-rows" ><br/><br/>
				</div>
			</div>

			<div class="admin-registration-form-select-other-details-default">
				<label for="admin-registration-form-field-proper-name">Name (To be used for identification purposes. Should not contain any space) :</label><br/>
				<input type="text" name="admin-registration-form-field-proper-name" id="admin-registration-form-field-proper-name" required><br/><br/>
				<label for="admin-registration-form-field-name">Name ( Should be in the form of ip- ) :</label><br/>
				<input type="text" name="admin-registration-form-field-name" id="admin-registration-form-field-name" required><br/><br/>
				<label for="admin-registration-form-field-label">Label:</label><br/>
				<input type="text" name="admin-registration-form-field-label" id="admin-registration-form-field-label" required><br/><br/>
				<label for="admin-registration-form-field-required">Required Field?</label><br/>
				<input type="radio" name="admin-registration-form-field-required" value="yes" checked="checked"/>Yes<br/>
				<input type="radio" name="admin-registration-form-field-required" value="no"/>No<br/><br/>
			</div>

			<button class="button button-primary admin-registration-form-submit" type="submit">Submit</button>
		</form>
	</div>
<?php }




/*
============================================================================================
Create the Registration page for Reordering the Single Delegation Fields
============================================================================================
*/
function function_create_single_delegation_registrations_form_page_reorder(){ ?>
	<div class="wrap">
		<h1 class="wp-heading-inline">Single Delegate Registration Form Reorder Fields</h1>
		<?php global $wpdb;
		$query = $wpdb->query('SHOW TABLES LIKE "registration_single_delegation"');
		if ($query){ ?>
		<h3>Single Delegate Registration Table has already been created</h3>
		<?php 
		return;
		}

		$results = $wpdb->get_results( "SELECT * FROM registration_form WHERE delegation='single'" ); ?>

		<div id="registrations-form-sort" class="sort">
			<div id="icon-job-admin" class="icon32"><br/></div>
			<h2>Reorder Single Delegation Fields</h2>

			<ul id="custom-type-list">
				<?php 
				foreach($results as $r){
				?>
				<li id="<?php echo $r->id; ?>">
					<?php echo $r->propername; ?>
				</li>
			<?php } ?>
			</ul>
			
		</div>
	</div>

<?php
}


/*
============================================================================================
Create the Registration page for Reordering the Double Delegation Fields
============================================================================================
*/
function function_create_double_delegation_registrations_form_page_reorder(){ ?>
	<div class="wrap">
		<h1 class="wp-heading-inline">Double Delegate Registration Form Reorder Fields</h1>
		<?php global $wpdb;
		$query = $wpdb->query('SHOW TABLES LIKE "registration_double_delegation"');
		if ($query){ ?>
		<h3>Double Delegate Registration Table has already been created</h3>
		<?php 
		return;
		}

		$results = $wpdb->get_results( "SELECT * FROM registration_form WHERE delegation LIKE 'double%'" ); ?>

		<div id="registrations-form-sort" class="sort">
			<div id="icon-job-admin" class="icon32"><br/></div>
			<h2>Reorder Double Delegation Fields</h2>

			<ul id="custom-type-list">
				<?php 
				foreach($results as $r){
				?>
				<li id="<?php echo $r->id; ?>">
					<?php echo $r->propername; ?>
				</li>
			<?php } ?>
			</ul>
			
		</div>
	</div>

<?php
}


/*
============================================================================================
Create the Registration page for Reordering the International Press Fields
============================================================================================
*/
function function_create_ip_registrations_form_page_reorder(){ ?>
	<div class="wrap">
		<h1 class="wp-heading-inline">International Press Registration Form Reorder Fields</h1>
		<?php global $wpdb;
		$query = $wpdb->query('SHOW TABLES LIKE "registration_ip"');
		if ($query){ ?>
		<h3>International Press Registration Table has already been created</h3>
		<?php 
		return;
		}

		$results = $wpdb->get_results( "SELECT * FROM registration_form WHERE delegation='ip'" ); ?>

		<div id="registrations-form-sort" class="sort">
			<div id="icon-job-admin" class="icon32"><br/></div>
			<h2>Reorder International Press Fields</h2>

			<ul id="custom-type-list">
				<?php 
				foreach($results as $r){
				?>
				<li id="<?php echo $r->id; ?>">
					<?php echo $r->propername; ?>
				</li>
			<?php } ?>
			</ul>
			
		</div>
	</div>

<?php
}


function dwwp_save_reorder(){

	$order = $_POST['order'];
	global $wpdb;
	$count = $wpdb->get_var("SELECT id FROM registration_form ORDER BY id DESC LIMIT 1");
	
	foreach( $order as $item_id ){
		
		$wpdb->update(
			'registration_form',
			array(
				'id' => $count
			),
			array(
				'id' => $item_id
			),
			array(
				'%d'
			),
			array(
				'%d'
			)
		);

		$count++;
	}
	wp_send_json_success('Post Saved.');

}
add_action('wp_ajax_save_post', 'dwwp_save_reorder');



function function_create_registrations_enable_page(){ ?>
	<div class="wrap">
		<h1 class="wp-heading-inline">Create Final Registration Form Tables</h1>
		<?php 
		if (isset($_POST['registration_single_delegation_table_create'])){
		?>
			<div id="message" class="updated notice is-dismissible">
				<p>Single Delegation Form has been created.</p>
				<button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
			</div>
		<?php } ?>
		<?php 
		if (isset($_POST['registration_double_delegation_table_create'])){
		?>
			<div id="message" class="updated notice is-dismissible">
				<p>Double Delegation Form has been created.</p>
				<button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
			</div>
		<?php } ?>
		<?php 
		if (isset($_POST['registration_ip_table_create'])){
		?>
			<div id="message" class="updated notice is-dismissible">
				<p>International Press Registration Form has been created.</p>
				<button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
			</div>
		<?php } ?>
		<hr class="wp-header-end">
		<br/>
		<h3>Once you create the registration form, you won't be able to add new fields or edit existing fields or reorder the fields. You will have to delete the entire form alongwith with the entries to modify the form. So please be careful.</h3>
		<hr>
		<h4>Single Delegation</h4>
		<?php 
		global $wpdb;
		$table_exists = $wpdb->query('SHOW TABLES LIKE "registration_single_delegation"');
		if ($table_exists){ ?>
			<h4>Single Delegation Registration Form Table has already been created</h4>
		<?php }else{ ?>
			<form action="" method="post">
				<input type="hidden" name="registration_single_delegation_table_create" value="yes">
				<button type="submit" class="button button-primary">Create</button>
			</form> 
		<?php } ?>
		<br><hr>
		<h4>Double Delegation</h4>
		<?php 
		global $wpdb;
		$table_exists = $wpdb->query('SHOW TABLES LIKE "registration_double_delegation"');
		if ($table_exists){ ?>
			<h4>Double Delegation Registration Form Table has already been created</h4> 
		<?php }else{ ?>
			<form action="" method="post">
				<input type="hidden" name="registration_double_delegation_table_create" value="yes">
				<button type="submit" class="button button-primary">Create</button>
			</form> 
		<?php } ?>
		<br/><hr>
		<h4>International Press</h4>
		<?php 
		global $wpdb;
		$table_exists = $wpdb->query('SHOW TABLES LIKE "registration_ip"');
		if ($table_exists){ ?>
			<h4>International Press Registration Form Table has already been created</h4>
		<?php }else{ ?>
			<form action="" method="post">
				<input type="hidden" name="registration_ip_table_create" value="yes">
				<button type="submit" class="button button-primary">Create</button>
			</form> 
		<?php } ?>
	</div>
<?php }