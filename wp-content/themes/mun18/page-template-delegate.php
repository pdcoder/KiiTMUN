<?php
/*Template Name: Delegate Page */
get_header();


?>


<section id="contact-first">
	<div class="contact-back">
		<img src="<?php echo wp_get_attachment_url(331); ?>">
		<div class="layer">
			<h1>Registrations</h1>
		</div>
	</div>
</section>


<br>
<section>
<?php 
if (have_posts()):
	while (have_posts()): the_post();
		the_content();
	endwhile;
endif;
?>
</section>
<section id="about-fourth">
	<h1>National<br>Delegation <b>Fees</b></h1>
	<hr>
	</section>
	<div class="container">
<div style="top:40vh;" class="row">
   <div align="center" class="col-md-6 col-lg-6">
   <h2><b>Single Delegate</b></h2><hr>
   <ul style="text-align:center">
	<li><b>Delegate Fees is INR 1500.<b></li>
	<br>
	<li>Hostel Accommodation is INR 1000. <i>[Optional]</i></li><br>

	<li>Hotel Accommodation is INR 1700. <i>[Optional]</i></li><br>

	</ul>
	</div>
<div align="center" class=" col-md-6 col-lg-6">
<h2><b>Double Delegate</b></h2><hr>
<ul style="text-align:center">
<li>Delegate Fees is INR 1500 per Delegate.</li><br>

<li>Hostel Accommodation is INR 1000 per Delegate. <i>[Optional]</i></li><br>

<li>Hotel Accommodation is INR 1700 per Delegate. <i>[Optional]</i></li><br>

</ul>
</div>
</div>
</div>




<br><br><br>


<section id="about-fourth">
	<h1>International<br>Delegation <b>Fees</b></h1>
	<hr>
	<?php 
	$args = array('posts_per_page' => 1, 'cat' => get_cat_ID("International Delegate Fees"));
	$loop = new Wp_Query($args);

	if ($loop -> have_posts()):
		while ($loop->have_posts()): $loop->the_post(); ?>
			<span><?php echo get_the_content(); ?></span>
		<?php endwhile;
	endif;
	?>
</section>


<section id="about-fourth">
	<h1>International<br><b>Delegate <br>Scholarship</b></h1>
	<hr>
	<?php 
	$args = array('posts_per_page' => 1, 'cat' => get_cat_ID("International Delegate Scholarship"));
	$loop = new Wp_Query($args);

	if ($loop -> have_posts()):
		while ($loop->have_posts()): $loop->the_post(); ?>
			<span><?php echo get_the_content(); ?></span>
		<?php endwhile;
	endif;
	?>
</section>

<section id="about-fourth">
	<h1><b>Prizes</b></h1>
	<hr>
	<?php 
	$args = array('posts_per_page' => 1, 'cat' => get_cat_ID("Prizes"));
	$loop = new Wp_Query($args);

	if ($loop -> have_posts()):
		while ($loop->have_posts()): $loop->the_post(); ?>
			<span><?php echo get_the_content(); ?></span>
		<?php endwhile;
	endif;
	?>
</section>


<?php get_footer(); ?>