<?php 
/*
Template Name: Registrations Page 
*/
get_header();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	$flag = 1;
	global $wpdb;

	$delegation = $_POST['delegation'];
	$propername = array();
	$propervalue = array();
	if ($delegation === 'single-delegation'){
		$results = $wpdb->get_results('SELECT name,propername FROM registration_form WHERE delegation="single"');
		foreach ($results as $r) {
			if (isset($_POST[$r->name])){
				$value = $_POST[$r->name];
				if (is_array($value)){
					foreach ($value as $v) {
						$value = esc_sql(strip_tags($v));
						$propername[] = $r->propername;
						$propervalue[] = $value;
					}	
				}else{
					$propername[] = $r->propername;
					$propervalue[] = $value;
				}
			}	
		}
		$propername[] = 'Committee1';
		$propername[] = 'Country11';
		$propername[] = 'Country12';
		$propername[] = 'Country13';
		$propername[] = 'Committee2';
		$propername[] = 'Country21';
		$propername[] = 'Country22';
		$propername[] = 'Country23';
		$propername[] = 'Committee3';
		$propername[] = 'Country31';
		$propername[] = 'Country32';
		$propername[] = 'Country33';

		$value = esc_sql(strip_tags($_POST['committee1']));
		$propervalue[] = $value;
		$value = esc_sql(strip_tags($_POST['country11']));
		$propervalue[] = $value;
		$value = esc_sql(strip_tags($_POST['country12']));
		$propervalue[] = $value;
		$value = esc_sql(strip_tags($_POST['country13']));
		$propervalue[] = $value;
		$value = esc_sql(strip_tags($_POST['committee2']));
		$propervalue[] = $value;
		$value = esc_sql(strip_tags($_POST['country21']));
		$propervalue[] = $value;
		$value = esc_sql(strip_tags($_POST['country22']));
		$propervalue[] = $value;
		$value = esc_sql(strip_tags($_POST['country23']));
		$propervalue[] = $value;
		$value = esc_sql(strip_tags($_POST['committee3']));
		$propervalue[] = $value;
		$value = esc_sql(strip_tags($_POST['country31']));
		$propervalue[] = $value;
		$value = esc_sql(strip_tags($_POST['country32']));
		$propervalue[] = $value;
		$value = esc_sql(strip_tags($_POST['country33']));
		$propervalue[] = $value;


		$test = "";
		for ($i=count($propervalue); $i>=1; $i--) { 
			if ($i === 1){
				$test = $test."%s";
			}else{
				$test = $test."%s,";
			}
		}

		$propername = implode(",", $propername);
		$wpdb->query($wpdb->prepare('INSERT INTO registration_single_delegation ('.$propername.') VALUES ('.$test.')', $propervalue));

	}else if ($delegation === 'international-press'){

		$results = $wpdb->get_results('SELECT name,propername FROM registration_form WHERE delegation="ip"');
		foreach ($results as $r) {
			if (isset($_POST[$r->name])){
				$value = $_POST[$r->name];
				if (is_array($value)){
					foreach ($value as $v) {
						$value = esc_sql(strip_tags($v));
						$propername[] = $r->propername;
						$propervalue[] = $value;
					}	
				}else{
					$propername[] = $r->propername;
					$propervalue[] = $value;
				}
			}	
		}
		
		$propername[] = 'Committee1';
		$propername[] = 'Committee2';
		$propername[] = 'Committee3';

		$value = esc_sql(strip_tags($_POST['committee1']));
		$propervalue[] = $value;
		$value = esc_sql(strip_tags($_POST['committee2']));
		$propervalue[] = $value;
		$value = esc_sql(strip_tags($_POST['committee3']));
		$propervalue[] = $value;
		
		$test = "";
		for ($i=count($propervalue); $i>=1; $i--) { 
			if ($i === 1){
				$test = $test."%s";
			}else{
				$test = $test."%s,";
			}
		}

		$propername = implode(",", $propername);
		$wpdb->query($wpdb->prepare('INSERT INTO registration_ip ('.$propername.') VALUES ('.$test.')', $propervalue));

	}else if ($delegation === 'double-delegation'){
		$results = $wpdb->get_results('SELECT name,propername,delegation FROM registration_form WHERE delegation LIKE "double%"');
		foreach ($results as $r) {
			if ($r->delegation === 'double-single'){
				if (isset($_POST[$r->name])){
					$value = $_POST[$r->name];
					if (is_array($value)){
						foreach ($value as $v) {
							$value = esc_sql(strip_tags($v));
							$propername[] = $r->propername;
							$propervalue[] = $value;
						}	
					}else{
						$propername[] = $r->propername;
						$propervalue[] = $value;
					}
				}	
			}else if ($r->delegation === 'double-double'){
				if (isset($_POST[$r->name."1"])){
					$value = $_POST[$r->name."1"];
					if (is_array($value)){
						foreach ($value as $v) {
							$value = esc_sql(strip_tags($v));
							$propername[] = $r->propername."1";
							$propervalue[] = $value;
						}	
					}else{
						$propername[] = $r->propername."1";
						$propervalue[] = $value;
					}
				}
				if (isset($_POST[$r->name."2"])){
					$value = $_POST[$r->name."2"];
					if (is_array($value)){
						foreach ($value as $v) {
							$value = esc_sql(strip_tags($v));
							$propername[] = $r->propername."2";
							$propervalue[] = $value;
						}	
					}else{
						$propername[] = $r->propername."2";
						$propervalue[] = $value;
					}
				}	
			}
		}
		
		
		$propername[] = 'Committee1';
		$propername[] = 'Country11';
		$propername[] = 'Country12';
		$propername[] = 'Country13';
		$propername[] = 'Committee2';
		$propername[] = 'Country21';
		$propername[] = 'Country22';
		$propername[] = 'Country23';
		$propername[] = 'Committee3';
		$propername[] = 'Country31';
		$propername[] = 'Country32';
		$propername[] = 'Country33';

		$value = esc_sql(strip_tags($_POST['committee1']));
		$propervalue[] = $value;
		$value = esc_sql(strip_tags($_POST['country11']));
		$propervalue[] = $value;
		$value = esc_sql(strip_tags($_POST['country12']));
		$propervalue[] = $value;
		$value = esc_sql(strip_tags($_POST['country13']));
		$propervalue[] = $value;
		$value = esc_sql(strip_tags($_POST['committee2']));
		$propervalue[] = $value;
		$value = esc_sql(strip_tags($_POST['country21']));
		$propervalue[] = $value;
		$value = esc_sql(strip_tags($_POST['country22']));
		$propervalue[] = $value;
		$value = esc_sql(strip_tags($_POST['country23']));
		$propervalue[] = $value;
		$value = esc_sql(strip_tags($_POST['committee3']));
		$propervalue[] = $value;
		$value = esc_sql(strip_tags($_POST['country31']));
		$propervalue[] = $value;
		$value = esc_sql(strip_tags($_POST['country32']));
		$propervalue[] = $value;
		$value = esc_sql(strip_tags($_POST['country33']));
		$propervalue[] = $value;


		$test = "";
		for ($i=count($propervalue); $i>=1; $i--) { 
			if ($i === 1){
				$test = $test."%s";
			}else{
				$test = $test."%s,";
			}
		}

		$propername = implode(",", $propername);
		$wpdb->query($wpdb->prepare('INSERT INTO registration_double_delegation ('.$propername.') VALUES ('.$test.')', $propervalue));
	}

} 
?>

<section id="registrations-first">
	<div class="registrations-back">
		<img src="<?php echo wp_get_attachment_url(279); ?>">
		<div class="layer">
			<h1>Registrations</h1>
		</div>
	</div>
</section>

<?php
if ($flag==1){ ?>
	<br/>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<h2>You have been successfully registered.</h2>
			<p><a href="<?php echo get_home_url(); ?>" style="color: #00c2e5;text-decoration: underline;text-underline-position:under;">Click here</a> to go back to our Home Page</p>
		</div>
	</div>
<?php }else{

	if (have_posts()):
		while(have_posts()): the_post();

			if (get_the_content() === 'Registrations On'){ ?>

			<section id="registrations-second">
				<center>
					<button id="single-delegation">Single Delegation</button>
					<button id="double-delegation">Double Delegation</button>
					<button id="international-press">International Press</button>
				</center>
			</section>

			<section id="registrations-third">
				<div class="container single-delegation" style="display: none;">
					<h1 style="text-align: center">Single Delegation</h1>

					<form action=" " method="post" id="form-single-delegation">	
						<input type="hidden" name="delegation" value="single-delegation">

						<div class="col-xs-12 col-sm-6 col-sm-offset-3">

							<?php 
							global $wpdb;
							$rows = $wpdb->get_results("SELECT * FROM registration_form WHERE delegation='single'");

							foreach ($rows as $r) { ?>
								<label for="<?php echo $r->name; ?>"><?php echo $r->label; ?></label>
								<?php if ($r->type === 'Text' || $r->type === 'Password' || $r->type === 'Number' || $r->type === 'Email'){ ?>
								<input type="<?php echo $r->type; ?>" name="<?php echo $r->name; ?>" placeholder="<?php echo $r->placeholder; ?>" <?php if ($r->required==='yes'){echo "required"; } ?> class="form-control" id="<?php echo $r->name; ?>">
								<?php }else if ($r->type === 'Checkbox' || $r->type === 'Radio'){
									$options = $r->options;
									$options = explode(',', $options);
									foreach ($options as $opt) { ?>
										<input type="<?php echo $r->type; ?>" name="<?php echo $r->name; ?>[]" value="<?php echo $opt; ?>" <?php if ($r->required === 'yes'){ echo 'required'; } ?> class="form-control"><?php echo $opt; ?><br/>
										<?php }
								}else if ($r->type === 'Select'){ ?>
								<select name="<?php echo $r->name; ?>" id="<?php echo $r->name; ?>" <?php if ($r->required === 'true'){echo "required"; } ?>>
									<?php 
									$options = $r->options;
									$options = explode(",", $options);
									foreach ($options as $options){ ?>
									<option value="<?php echo $options; ?>"><?php echo $options; ?></option>
									<?php }
									?>
								</select>
								<?php }else if ($r->type === 'Textarea'){ ?>
								<textarea name="<?php echo $r->name; ?>" rows="<?php echo $r->numberofrows; ?>" id="<?php echo $r->name; ?>" placeholder="<?php echo $r->placeholder; ?>" <?php if ($r->required === 'yes'){echo "required"; } ?> class="form-control"></textarea>
								<?php } 
								
							} ?>

							<label for="committee1">Committee Preference 1</label>
							<select name="committee1" id="committee1" required class="form-control">
								<option selected disabled>Choose a committee</option>
								<?php 
								$args = array('posts_per_page' => -1, 'post_type' => 'committee' );
								$query = new Wp_Query($args);
          
								if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post(); 
									if(get_the_title()!="Joint Cabinet Crisis 1 (KGB)" && get_the_title()!="The Office of the United Nations High Commissioner for Human Rights (OHCHR)"){?>

									<option><?php echo get_the_title(); ?></option>

			                         <?php } endwhile;
								endif;
								?>
							</select>

							<label for="country11">Country Preference 1</label>
							<select name="country11" id="country11" required class="form-control">
								<option selected disabled id="all">Select A Country</option>
								<?php if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post();
										$country_list = get_post_meta(get_the_ID(), 'country-list', true);
										$country_list = explode(",", $country_list);
										foreach ($country_list as $c) { ?>
										<option id="<?php echo get_the_title(); ?>"><?php echo $c; ?></option>
										<?php }
									endwhile;
								endif; ?> 
							</select>

							<label for="country12">Country Preference 2</label>
							<select name="country12" id="country12" required class="form-control">
								<option selected disabled id="all">Select A Country</option>
								<?php if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post();
										$country_list = get_post_meta(get_the_ID(), 'country-list', true);
										$country_list = explode(",", $country_list);
										foreach ($country_list as $c) { ?>
										<option id="<?php echo get_the_title(); ?>"><?php echo $c; ?></option>
										<?php }
									endwhile;
								endif; ?> 
							</select>

							<label for="country13">Country Preference 3</label>
							<select name="country13" id="country13" required class="form-control">
								<option selected disabled id="all">Select A Country</option>
								<?php if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post();
										$country_list = get_post_meta(get_the_ID(), 'country-list', true);
										$country_list = explode(",", $country_list);
										foreach ($country_list as $c) { ?>
										<option id="<?php echo get_the_title(); ?>"><?php echo $c; ?></option>
										<?php }
									endwhile;
								endif; ?> 
							</select>

							<label for="committee2">Committee Preference 2</label>
							<select name="committee2" id="committee2" required class="form-control">
								<option selected disabled>Choose a committee</option>
								<?php 
								$args = array('posts_per_page' => -1, 'post_type' => 'committee' );
								$query = new Wp_Query($args);

								if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post(); 
									if(get_the_title()!="Joint Cabinet Crisis 1 (KGB)"  && get_the_title()!="The Office of the United Nations High Commissioner for Human Rights (OHCHR)"){?>
									

									<option><?php echo get_the_title(); ?></option>

<?php } endwhile;
								endif;
								?>
							</select>

							<label for="country21">Country Preference 1</label>
							<select name="country21" id="country21" required class="form-control">
								<option selected disabled id="all">Select A Country</option>
								<?php if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post();
										$country_list = get_post_meta(get_the_ID(), 'country-list', true);
										$country_list = explode(",", $country_list);
										foreach ($country_list as $c) { ?>
										<option id="<?php echo get_the_title(); ?>"><?php echo $c; ?></option>
										<?php }
									endwhile;
								endif; ?> 
							</select>

							<label for="country22">Country Preference 2</label>
							<select name="country22" id="country22" required class="form-control">
								<option selected disabled id="all">Select A Country</option>
								<?php if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post();
										$country_list = get_post_meta(get_the_ID(), 'country-list', true);
										$country_list = explode(",", $country_list);
										foreach ($country_list as $c) { ?>
										<option id="<?php echo get_the_title(); ?>"><?php echo $c; ?></option>
										<?php }
									endwhile;
								endif; ?> 
							</select>

							<label for="country23">Country Preference 3</label>
							<select name="country23" id="country23" required class="form-control">
								<option selected disabled id="all">Select A Country</option>
								<?php if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post();
										$country_list = get_post_meta(get_the_ID(), 'country-list', true);
										$country_list = explode(",", $country_list);
										foreach ($country_list as $c) { ?>
										<option id="<?php echo get_the_title(); ?>"><?php echo $c; ?></option>
										<?php }
									endwhile;
								endif; ?> 
							</select>

							<label for="committee3">Committee Preference 3</label>
							<select name="committee3" id="committee3" required class="form-control">
								<option selected disabled>Choose a committee</option>
								<?php 
								$args = array('posts_per_page' => -1, 'post_type' => 'committee' );
								$query = new Wp_Query($args);

								if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post(); 
									if(get_the_title()!="Joint Cabinet Crisis 1 (KGB)" && get_the_title()!="The Office of the United Nations High Commissioner for Human Rights (OHCHR)"){?>
									

									<option><?php echo get_the_title(); ?></option>

									<?php  } endwhile;
								endif;
								?>
							</select>

							<label for="country31">Country Preference 1</label>
							<select name="country31" id="country31" required class="form-control">
								<option selected disabled id="all">Select A Country</option>
								<?php if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post();
										$country_list = get_post_meta(get_the_ID(), 'country-list', true);
										$country_list = explode(",", $country_list);
										foreach ($country_list as $c) { ?>
										<option id="<?php echo get_the_title(); ?>"><?php echo $c; ?></option>
										<?php }
									endwhile;
								endif; ?> 
							</select>

							<label for="country32">Country Preference 2</label>
							<select name="country32" id="country32" required class="form-control">
								<option selected disabled id="all">Select A Country</option>
								<?php if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post();
										$country_list = get_post_meta(get_the_ID(), 'country-list', true);
										$country_list = explode(",", $country_list);
										foreach ($country_list as $c) { ?>
										<option id="<?php echo get_the_title(); ?>"><?php echo $c; ?></option>
										<?php }
									endwhile;
								endif; ?> 
							</select>

							<label for="country33">Country Preference 3</label>
							<select name="country33" id="country33" required class="form-control">
								<option selected disabled id="all">Select A Country</option>
								<?php if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post();
										$country_list = get_post_meta(get_the_ID(), 'country-list', true);
										$country_list = explode(",", $country_list);
										foreach ($country_list as $c) { ?>
										<option id="<?php echo get_the_title(); ?>"><?php echo $c; ?></option>
										<?php }
									endwhile;
								endif; ?> 
							</select>

							<label for="double-checkbox-terms-and-conditions">Terms and Conditions</label>
							<input type="Checkbox" value="yes" required class="form-control">I have read the <a href="https://kiitmun.org/terms-and-conditions/" style="color: #00c2e5">Terms and Conditions</a><br/>

							<button type="submit" class="btn btn-block">Submit</button>

						</div>

					</form>

				</div>

				<div class="container double-delegation" style="display: none;">

					<h1 style="text-align: center">Double Delegation</h1>

					<form action=" " method="post" id="form-single-delegation">
						<input type="hidden" name="delegation" value="double-delegation">
						<?php 
						global $wpdb;
						$rows = $wpdb->get_results("SELECT * FROM registration_form WHERE delegation LIKE 'double%'");

						foreach ($rows as $r) {

							if ($r->delegation === 'double-double'){ ?>
								<div class="col-xs-12 col-sm-6">

									<label for="<?php echo $r->name; ?>1"><?php echo $r->label; ?> (1st Delegate)</label>
									<?php if ($r->type === 'Text' || $r->type === 'Password' || $r->type === 'Number' || $r->type === 'Email'){ ?>
									<input type="<?php echo $r->type; ?>" name="<?php echo $r->name; ?>1" placeholder="<?php echo $r->placeholder; ?>" <?php if ($r->required==='yes'){echo "required"; } ?> class="form-control" id="<?php echo $r->name; ?>1">
									<?php }else if ($r->type === 'Checkbox' || $r->type === 'Radio'){
										$options = $r->options;
										$options = explode(',', $options);
										foreach ($options as $opt) { ?>
											<input type="<?php echo $r->type; ?>" name="<?php echo $r->name; ?>1[]" value="<?php echo $opt; ?>" <?php if ($r->required === 'yes'){ echo 'required'; } ?> class="form-control"><?php echo $opt; ?><br/>
											<?php }
									}else if ($r->type === 'Select'){ ?>
									<select name="<?php echo $r->name; ?>1" id="<?php echo $r->name; ?>1" <?php if ($r->required === 'true'){echo "required"; } ?>>
										<?php 
										$options = $r->options;
										$options = explode(",", $options);
										foreach ($options as $options){ ?>
										<option value="<?php echo $options; ?>"><?php echo $options; ?></option>
										<?php }
										?>
									</select>
									<?php }else if ($r->type === 'Textarea'){ ?>
									<textarea name="<?php echo $r->name; ?>1" rows="<?php echo $r->numberofrows; ?>" id="<?php echo $r->name; ?>1" placeholder="<?php echo $r->placeholder; ?>" <?php if ($r->required === 'yes'){echo "required"; } ?> class="form-control"></textarea>
									<?php } ?>

								</div>
								<div class="col-xs-12 col-sm-6">

									<label for="<?php echo $r->name; ?>2"><?php echo $r->label; ?> (2nd Delegate)</label>
									<?php if ($r->type === 'Text' || $r->type === 'Password' || $r->type === 'Number' || $r->type === 'Email'){ ?>
									<input type="<?php echo $r->type; ?>" name="<?php echo $r->name; ?>2" placeholder="<?php echo $r->placeholder; ?>" <?php if ($r->required==='yes'){echo "required"; } ?> class="form-control" id="<?php echo $r->name; ?>2">
									<?php }else if ($r->type === 'Checkbox' || $r->type === 'Radio'){
										$options = $r->options;
										$options = explode(',', $options);
										foreach ($options as $opt) { ?>
											<input type="<?php echo $r->type; ?>" name="<?php echo $r->name; ?>2[]" value="<?php echo $opt; ?>" <?php if ($r->required === 'yes'){ echo 'required'; } ?> class="form-control"><?php echo $opt; ?><br/>
											<?php }
									}else if ($r->type === 'Select'){ ?>
									<select name="<?php echo $r->name; ?>2" id="<?php echo $r->name; ?>2" <?php if ($r->required === 'true'){echo "required"; } ?>>
										<?php 
										$options = $r->options;
										$options = explode(",", $options);
										foreach ($options as $options){ ?>
										<option value="<?php echo $options; ?>"><?php echo $options; ?></option>
										<?php }
										?>
									</select>
									<?php }else if ($r->type === 'Textarea'){ ?>
									<textarea name="<?php echo $r->name; ?>2" rows="<?php echo $r->numberofrows; ?>" id="<?php echo $r->name; ?>2" placeholder="<?php echo $r->placeholder; ?>" <?php if ($r->required === 'yes'){echo "required"; } ?> class="form-control"></textarea>
									<?php } ?>

								</div> 

							<?php }else{ ?>

								<div class="col-xs-12 col-sm-6 col-sm-offset-3">

									<label for="<?php echo $r->name; ?>"><?php echo $r->label; ?></label>
									<?php if ($r->type === 'Text' || $r->type === 'Password' || $r->type === 'Number' || $r->type === 'Email'){ ?>
									<input type="<?php echo $r->type; ?>" name="<?php echo $r->name; ?>" placeholder="<?php echo $r->placeholder; ?>" <?php if ($r->required==='yes'){echo "required"; } ?> class="form-control" id="<?php echo $r->name; ?>">
									<?php }else if ($r->type === 'Checkbox' || $r->type === 'Radio'){
										$options = $r->options;
										$options = explode(',', $options);
										foreach ($options as $opt) { ?>
											<input type="<?php echo $r->type; ?>" name="<?php echo $r->name; ?>[]" value="<?php echo $opt; ?>" <?php if ($r->required === 'yes'){ echo 'required'; } ?> class="form-control"><?php echo $opt; ?><br/>
											<?php }
									}else if ($r->type === 'Select'){ ?>
									<select name="<?php echo $r->name; ?>" id="<?php echo $r->name; ?>" <?php if ($r->required === 'true'){echo "required"; } ?>>
										<?php 
										$options = $r->options;
										$options = explode(",", $options);
										foreach ($options as $options){ ?>
										<option value="<?php echo $options; ?>"><?php echo $options; ?></option>
										<?php }
										?>
									</select>
									<?php }else if ($r->type === 'Textarea'){ ?>
									<textarea name="<?php echo $r->name; ?>" rows="<?php echo $r->numberofrows; ?>" id="<?php echo $r->name; ?>" placeholder="<?php echo $r->placeholder; ?>" <?php if ($r->required === 'yes'){echo "required"; } ?> class="form-control"></textarea>
									<?php }  ?>

								</div>

							<?php }				
							
						} ?>

						<div class="col-xs-12 col-sm-6 col-sm-offset-3">
							<label for="committee1">Committee Preference 1</label>
							<select name="committee1" id="committee4" required class="form-control">
								<option selected disabled>Choose a committee</option>
								<?php 
								$args = array('posts_per_page' => -1, 'post_type' => 'committee' );
								$query = new Wp_Query($args);

								if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post(); 
									   if(get_the_title()=="United Nations Disarmament and International Security Committee (DISEC)" || get_the_title()=="United Nations Social, Humanitarian and Cultural Committee (SOCHUM)" ||  get_the_title()=="United Nations Commission On the Status Of Women (UNCSW)" || get_the_title()=="United nations Commission On Narcotic Drugs (UNCND)" || get_the_title()=="The Economic and Social Council (ECOSOC)" || get_the_title()=="The World Health Assembly (WHA)"){?>

									<option><?php echo get_the_title(); ?></option>
									   <?php }
									endwhile;
								endif;
								?>
							</select>

							<label for="country11">Country Preference 1</label>
							<select name="country11" id="country41" required class="form-control">
								<option selected disabled id="all">Select A Country</option>
								<?php if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post();
										$country_list = get_post_meta(get_the_ID(), 'country-list', true);
										$country_list = explode(",", $country_list);
										foreach ($country_list as $c) { ?>
										<option id="<?php echo get_the_title(); ?>"><?php echo $c; ?></option>
										<?php }
									endwhile;
								endif; ?> 
							</select>

							<label for="country12">Country Preference 2</label>
							<select name="country12" id="country42" required class="form-control">
								<option selected disabled id="all">Select A Country</option>
								<?php if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post();
										$country_list = get_post_meta(get_the_ID(), 'country-list', true);
										$country_list = explode(",", $country_list);
										foreach ($country_list as $c) { ?>
										<option id="<?php echo get_the_title(); ?>"><?php echo $c; ?></option>
										<?php }
									endwhile;
								endif; ?> 
							</select>

							<label for="country13">Country Preference 3</label>
							<select name="country13" id="country43" required class="form-control">
								<option selected disabled id="all">Select A Country</option>
								<?php if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post();
										$country_list = get_post_meta(get_the_ID(), 'country-list', true);
										$country_list = explode(",", $country_list);
										foreach ($country_list as $c) { ?>
										<option id="<?php echo get_the_title(); ?>"><?php echo $c; ?></option>
										<?php }
									endwhile;
								endif; ?> 
							</select>

							<label for="committee2">Committee Preference 2</label>
							<select name="committee2" id="committee5" required class="form-control">
								<option selected disabled>Choose a committee</option>
								<?php 
								$args = array('posts_per_page' => -1, 'post_type' => 'committee' );
								$query = new Wp_Query($args);

								if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post(); 
 if(get_the_title()=="United Nations Disarmament and International Security Committee (DISEC)" || get_the_title()=="United Nations Social, Humanitarian and Cultural Committee (SOCHUM)" || get_the_title()=="The World Health Assembly (WHA)"){?>

<option><?php echo get_the_title(); ?></option>
   <?php }
   endwhile;
								endif;
								?>
							</select>

							<label for="country21">Country Preference 1</label>
							<select name="country21" id="country51" required class="form-control">
								<option selected disabled id="all">Select A Country</option>
								<?php if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post();
										$country_list = get_post_meta(get_the_ID(), 'country-list', true);
										$country_list = explode(",", $country_list);
										foreach ($country_list as $c) { ?>
										<option id="<?php echo get_the_title(); ?>"><?php echo $c; ?></option>
										<?php }
									endwhile;
								endif; ?> 
							</select>

							<label for="country22">Country Preference 2</label>
							<select name="country22" id="country52" required class="form-control">
								<option selected disabled id="all">Select A Country</option>
								<?php if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post();
										$country_list = get_post_meta(get_the_ID(), 'country-list', true);
										$country_list = explode(",", $country_list);
										foreach ($country_list as $c) { ?>
										<option id="<?php echo get_the_title(); ?>"><?php echo $c; ?></option>
										<?php }
									endwhile;
								endif; ?> 
							</select>

							<label for="country23">Country Preference 3</label>
							<select name="country23" id="country53" required class="form-control">
								<option selected disabled id="all">Select A Country</option>
								<?php if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post();
										$country_list = get_post_meta(get_the_ID(), 'country-list', true);
										$country_list = explode(",", $country_list);
										foreach ($country_list as $c) { ?>
										<option id="<?php echo get_the_title(); ?>"><?php echo $c; ?></option>
										<?php }
									endwhile;
								endif; ?> 
							</select>

							<label for="committee3">Committee Preference 3</label>
							<select name="committee3" id="committee6" required class="form-control">
								<option selected disabled>Choose a committee</option>
								<?php 
								$args = array('posts_per_page' => -1, 'post_type' => 'committee' );
								$query = new Wp_Query($args);

								if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post(); 
 if(get_the_title()=="United Nations Disarmament and International Security Committee (DISEC)" || get_the_title()=="United Nations Social, Humanitarian and Cultural Committee (SOCHUM)" || get_the_title()=="United Nations Commission On the Status Of Women (UNCSW)" || get_the_title()=="United nations Commission On Narcotic Drugs (UNCND)" || get_the_title()=="The Economic and Social Council (ECOSOC)" || get_the_title()=="The World Health Assembly (WHA)"){?>

<option><?php echo get_the_title(); ?></option>
   <?php }endwhile;
								endif;
								?>
							</select>

							<label for="country31">Country Preference 1</label>
							<select name="country31" id="country61" required class="form-control">
								<option selected disabled id="all">Select A Country</option>
								<?php if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post();
										$country_list = get_post_meta(get_the_ID(), 'country-list', true);
										$country_list = explode(",", $country_list);
										foreach ($country_list as $c) { ?>
										<option id="<?php echo get_the_title(); ?>"><?php echo $c; ?></option>
										<?php }
									endwhile;
								endif; ?> 
							</select>

							<label for="country32">Country Preference 2</label>
							<select name="country32" id="country62" required class="form-control">
								<option selected disabled id="all">Select A Country</option>
								<?php if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post();
										$country_list = get_post_meta(get_the_ID(), 'country-list', true);
										$country_list = explode(",", $country_list);
										foreach ($country_list as $c) { ?>
										<option id="<?php echo get_the_title(); ?>"><?php echo $c; ?></option>
										<?php }
									endwhile;
								endif; ?> 
							</select>

							<label for="country33">Country Preference 3</label>
							<select name="country33" id="country63" required class="form-control">
								<option selected disabled id="all">Select A Country</option>
								<?php if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post();
										$country_list = get_post_meta(get_the_ID(), 'country-list', true);
										$country_list = explode(",", $country_list);
										foreach ($country_list as $c) { ?>
										<option id="<?php echo get_the_title(); ?>"><?php echo $c; ?></option>
										<?php }
									endwhile;
								endif; ?> 
							</select>

							<label for="double-checkbox-terms-and-conditions">Terms and Conditions</label>
							<input type="Checkbox" value="yes" required class="form-control">I have read the <a href="https://kiitmun.org/terms-and-conditions/" style="color: #00c2e5">Terms and Conditions</a><br/>

							<button type="submit" class="btn btn-block">Submit</button>

						</div>

					</form>

				</div>

				<div class="container international-press" style="display: none;">

					<h1 style="text-align: center">International Press</h1>

					<form action=" " method="post" id="form-international-press">	
						<input type="hidden" name="delegation" value="international-press">

						<div class="col-xs-12 col-sm-6 col-sm-offset-3">

							<?php 
							global $wpdb;
							$rows = $wpdb->get_results("SELECT * FROM registration_form WHERE delegation='ip'");

							foreach ($rows as $r) { ?>
								<label for="<?php echo $r->name; ?>"><?php echo $r->label; ?></label><br/>
								<?php if ($r->type === 'Text' || $r->type === 'Password' || $r->type === 'Number' || $r->type === 'Email'){ ?>
								<input type="<?php echo $r->type; ?>" name="<?php echo $r->name; ?>" placeholder="<?php echo $r->placeholder; ?>" <?php if ($r->required==='yes'){echo "required"; } ?> class="form-control" id="<?php echo $r->name; ?>">
								<?php }else if ($r->type === 'Checkbox' || $r->type === 'Radio'){
									$options = $r->options;
									$options = explode(',', $options);
									foreach ($options as $opt) { ?>
										<input type="<?php echo $r->type; ?>" name="<?php echo $r->name; ?>[]" value="<?php echo $opt; ?>" <?php if ($r->required === 'yes'){ echo 'required'; } ?> class="form-control"><?php echo $opt; ?><br/>
										<?php }
								}else if ($r->type === 'Select'){ ?>
								<select name="<?php echo $r->name; ?>" id="<?php echo $r->name; ?>" <?php if ($r->required === 'true'){echo "required"; } ?>>
									<?php 
									$options = $r->options;
									$options = explode(",", $options);
									foreach ($options as $options){ ?>
									<option value="<?php echo $options; ?>"><?php echo $options; ?></option>
									<?php }
									?>
								</select>
								<?php }else if ($r->type === 'Textarea'){ ?>
								<textarea name="<?php echo $r->name; ?>" rows="<?php echo $r->numberofrows; ?>" id="<?php echo $r->name; ?>" placeholder="<?php echo $r->placeholder; ?>" <?php if ($r->required === 'yes'){echo "required"; } ?> class="form-control"></textarea>
								<?php } 
								
							} ?>

							<label for="committee1">Committee Preference 1</label>
							<select name="committee1" id="committee7" required class="form-control">
								<option selected disabled>Choose a committee</option>
								<?php 
								$args = array('posts_per_page' => -1, 'post_type' => 'committee' );
								$query = new Wp_Query($args);

								if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post(); 
									if(get_the_title()!="United Nations Security Council (UNSC)"){?>

									<option><?php echo get_the_title(); ?></option>

									<?php } endwhile;
								endif;
								?>
							</select>

							<label for="committee2">Committee Preference 2</label>
							<select name="committee2" id="committee8" required class="form-control">
								<option selected disabled>Choose a committee</option>
								<?php 
								$args = array('posts_per_page' => -1, 'post_type' => 'committee' );
								$query = new Wp_Query($args);

								if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post(); ?>

									<option><?php echo get_the_title(); ?></option>

									<?php endwhile;
								endif;
								?>
							</select>

							<label for="committee3">Committee Preference 3</label>
							<select name="committee3" id="committee9" required class="form-control">
								<option selected disabled>Choose a committee</option>
								<?php 
								$args = array('posts_per_page' => -1, 'post_type' => 'committee' );
								$query = new Wp_Query($args);

								if ($query->have_posts()):
									while ($query->have_posts()): $query->the_post(); ?>

									<option><?php echo get_the_title(); ?></option>

									<?php endwhile;
								endif;
								?>
							</select>

							
							<label for="double-checkbox-terms-and-conditions">Terms and Conditions</label><br/>
							<input type="Checkbox" value="yes" required class="form-control">I have read the <a href="https://kiitmun.org/terms-and-conditions/" style="color: #00c2e5">Terms and Conditions</a><br/>

							<button type="submit" class="btn btn-block">Submit</button>

						</div>

					</form>

				</div-->
			</section>

			<?php }else{ ?> 
				
				<h1 id="not-found"><?php echo get_the_content(); ?></h1>

			<?php }

		endwhile;
	endif;
}
get_footer();
?>