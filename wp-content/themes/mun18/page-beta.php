<?php
/*Template Name: Beta Page */
get_header();
?>

<section id='beta-first'>

	<div class="layer">
		<img src="<?php echo wp_get_attachment_url(259); ?>">
		<center>
			<div class="timer">
				<div class="days">
					<div class='time'>00</div><p>days</p>
				</div>
				<div class="hours">
					<div class='time'>00</div><p>hours</p>
				</div>
				<div class="minutes">
					<div class='time'>00</div><p>mins</p>
				</div>
				<div class="seconds">
					<div class='time'>00</div><p>secs</p>
				</div>
			</div>
		</center>
	</div>

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	    
	    <div class="carousel-inner">

			<?php 
			$args = array('posts_per_page' => -1, 'cat' => get_cat_ID('Home Page Slider'));
			$loop = new Wp_Query($args);

			$count = 1;

			if ($loop->have_posts()):
				while ($loop->have_posts()): $loop->the_post();

					if ($count == 1){ ?>
					<div class="item active" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>)">
	        		</div>
					<?php }else{ ?>
					<div class="item" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>)">
	        		</div>
					<?php }

					$count++;

				endwhile;
			endif; ?>

	    </div>

	    <!-- Left and right controls -->
	    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
	      	<span class="glyphicon glyphicon-chevron-left"></span>
	      	<span class="sr-only">Previous</span>
	    </a>
	    <a class="right carousel-control" href="#myCarousel" data-slide="next">
	      	<span class="glyphicon glyphicon-chevron-right"></span>
	      	<span class="sr-only">Next</span>
	    </a>

	</div>
</section>

<section id="beta-second">
	
	<?php 
	$args = array('posts_per_page' => 1, 'cat' => get_cat_ID('Home Page About KIIT Details'));
	$loop = new Wp_Query($args);

	if ($loop->have_posts()):
		while ($loop->have_posts()): $loop->the_post(); ?>

		<span class="first">KIIT</span>
		<span class="second">International<br>Model United Nations</span>
		<hr>
		<span class="third"><?php echo get_the_content(); ?></span>

		<?php endwhile;
	endif;
	?>
	<br/><br/>
	<?php 
	$args = array('posts_per_page' => 1, 'cat' => get_cat_ID('Home Page Previous Editions Details'));
	$loop = new Wp_Query($args);

	if ($loop->have_posts()):
		while ($loop->have_posts()): $loop->the_post(); ?>

		<span class="first">Previous</span>
		<span class="second">Editions</span>
		<hr>
		<span class="third"><?php echo get_the_content(); ?></span>

		<?php endwhile;
	endif;
	?>

</section>
<!--section id="beta-third">
	<h1>Founder's <b>Message</b></h1>
	<hr>
	<?php 
	/*$args = array('posts_per_page' => 1, 'cat' => get_cat_ID("Home Page Founder's Message"));
	$loop = new Wp_Query($args);

	if ($loop -> have_posts()):
		while ($loop->have_posts()): $loop->the_post(); ?>

		<div class="container">
			<div>
				<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>">
			</div>
			<div>
				<?php echo get_the_content(); ?>
			</div>
		</div>

		<?php
		endwhile;
	endif;
	*/?>
</section-->


<section id="beta-fourth">
	<h1>In Other <b>Media</b></h1>
	<hr>
	<span>We Are Gearing Up For The Much Awaited Model United Nations<br/>Just Like You Are.</span>
	<div class="row">
		<div class="col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-3">
			<center>
				<div>
					<a href="https://www.facebook.com/kiitmun/" target="_blank"><img src = "<?php echo wp_get_attachment_url(269); ?>"></a>
				</div>
				<div>
					<a href="https://www.instagram.com/instakiitmun/" target="_blank"><img src = "<?php echo wp_get_attachment_url(270); ?>"></a>
				</div>
				<div>
					<a href="https://twitter.com/kiitmun" target="_blank"><img src = "<?php echo wp_get_attachment_url(271) ?>"></a>
				</div>
			</center>
		</div>
	</div>
</section>


<section id="beta-fifth">
	<h1>The KIITMUN <b>Insignia</b></h1>
	<hr>
	<span>The helm of the KIITMUN Secretariat, the base of the massive pyramid, the luminary with outstanding contribution in the operations of this entity.<br/>Meet the Core Secretariat of KIIT Model United Nation 2018.</span>
	<div class="row">
		<div class="col-xs-12 col-sm-4">
			<h4>Baibhav Sharan</h4>
			<h3>Secretary General</h3>
			<img src="<?php echo wp_get_attachment_url(272); ?>"><a href="tel:+919078802533"><span>+919078802533</span></a>
			<hr>
		</div>
		<div class="col-xs-12 col-sm-4">
			<h4>Achintya Tushar Jha</h4>
			<h3>Deputy Secretary General</h3>
			<img src="<?php echo wp_get_attachment_url(272); ?>"><a href="tel:+917683979698"><span>+917683979698</span></a>
			<hr>
		</div>
		<div class="col-xs-12 col-sm-4">
			<h4>Shantanu Raj</h4>
			<h3>Deputy Secretary General</h3>
			<img src="<?php echo wp_get_attachment_url(272); ?>"><a href="tel:+917064002563"><span>+917064002563</span></a>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-4">
			<h4>Narayan Sharma</h4>
			<h3>Director General</h3>
			<img src="<?php echo wp_get_attachment_url(272); ?>"><a href="tel:+917064032593"><span>+917064032593</span></a>
			<hr>
		</div>
		<div class="col-xs-12 col-sm-4">
			<h4>Abhinav Sinha</h4>
			<h3>Deputy Director General</h3>
			<img src="<?php echo wp_get_attachment_url(272); ?>"><a href="tel:+919078802611"><span>+919078802611</span></a>
			<hr>
		</div>
		<div class="col-xs-12 col-sm-4">
			<h4>Sahil Verma</h4>
			<h3>Chargé D'affaires</h3>
			<img src="<?php echo wp_get_attachment_url(272); ?>"><a href="tel:+917021292158"><span>+917021292158</span></a>
			<hr>
		</div>
	</div>
</section>

<section id="beta-sixth">
	<center>
		<div class="col-xs-12 col-sm-6">
			<h2>About <b>KIIT</b></h2>
			<hr>
			<?php 
			$args = array('posts_per_page' => 1, 'cat' => get_cat_ID("Home Page About KIIT"));
			$loop = new Wp_Query($args);

			if ($loop -> have_posts()):
				while ($loop->have_posts()): $loop->the_post(); ?>
					<p><?php echo get_the_content(); ?></p>
				<?php endwhile;
			endif;
			?>
			
		</div>
		<div class="col-xs-12 col-sm-6">
			<h2>About <b>KISS</b></h2>
			<hr>
			<?php 
			$args = array('posts_per_page' => 1, 'cat' => get_cat_ID("Home Page About KIIT"));
			$loop = new Wp_Query($args);

			if ($loop -> have_posts()):
				while ($loop->have_posts()): $loop->the_post(); ?>
					<p><?php echo get_the_content(); ?></p>
				<?php endwhile;
			endif;
			?>

		</div>
	</center>
</section>

<section id="beta-seventh">
	<h1>About <br/><b>Incredible India</b></h1>
	<hr>
	<?php 
	$args = array('posts_per_page' => 1, 'cat' => get_cat_ID("Home Page About Incredible India"));
	$loop = new Wp_Query($args);

	if ($loop -> have_posts()):
		while ($loop->have_posts()): $loop->the_post(); ?>
			<span><?php echo get_the_content(); ?></span>
		<?php endwhile;
	endif;
	?>
</section>

<section id="beta-eighth">
	<h1>About<br/>KIITMUN <b>Society</b></h1>
	<hr>
	<?php 
	$args = array('posts_per_page' => 1, 'cat' => get_cat_ID("Home Page About KIITMUN Society"));
	$loop = new Wp_Query($args);

	if ($loop -> have_posts()):
		while ($loop->have_posts()): $loop->the_post(); ?>
			<span><?php echo get_the_content(); ?></span>
		<?php endwhile;
	endif;
	?>
</section>


<section id="beta-ninth">
	<h1>Meet Us <b>Here</b></h1>
	<hr>
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3740.690726633949!2d85.81246791429672!3d20.354391315834036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a19091813dab8d5%3A0xa033051ccddbbcbc!2sKiit+University!5e0!3m2!1sen!2sin!4v1525261017509" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>



<?php get_footer(); ?>