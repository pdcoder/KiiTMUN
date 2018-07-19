<?php
/*Template Name: Home Page */
get_header();
?>

<section id='beta-first'>

	<div class="layer">
		<!--<img src="https://kiitmun.org/wp-content/uploads/2018/06/KIIT-Logo-New.png" style="height:50px;width:100px;margin-left:50px;margin-top:60px;">-->
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

			<h4 style="color: white">28th - 30th September</h4>
			<h3>#TodayForTomorrow</h3>

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
	$args = array('posts_per_page' => 1, 'cat' => get_cat_ID('About KIITMUN'));
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

<section id="about-sixth">
	<h1>Message from the <br/><b>Secretary General</b></h1>
	<hr>

	<center><img style="border-radius:50%;height:205px;width:220px;box-shadow:2px 3px 18px 2px black;" src="https://kiitmun.org/wp-content/uploads/2018/06/baibhav.jpg"></center>
		<br>
	<?php 
	$args = array('posts_per_page' => 1, 'cat' => get_cat_ID("Message from the Secretary General"));
	$loop = new Wp_Query($args);

	if ($loop -> have_posts()):
		while ($loop->have_posts()): $loop->the_post(); ?>
			<span style=" color: black;
    display: block;
    font-size: 15px;
    font-weight: 500;
    text-align: justify;"><?php echo get_the_content(); ?></span>
		<?php endwhile;
	endif;
	?>
	<!--</div>
    </div>-->
</section>

<!--IMAGE of committees-->
<section>
	<a href="https://kiitmun.org/committees/"><img  src="https://kiitmun.org/wp-content/uploads/2018/05/COMMITTEES_20.jpg" style="width:100%;height:auto;"></a>
</section>
<br>
<section>
	<a href="https://kiitmun.org/registration/"><img src="<?php echo wp_get_attachment_url(519); ?>" style="width:100%;height:auto;"></a>
</section>

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
	<br>
		<div class="col-xs-12 col-sm-4">
		    <center><img style="border-radius:50%;height:205px;width:220px;" src="https://kiitmun.org/wp-content/uploads/2018/06/baibhav.jpg"></center>
			<h4>Baibhav Sharan</h4>
			<h3>Secretary General</h3>
			<img src="<?php echo wp_get_attachment_url(272); ?>"><a href="tel:+919078802533"><span>+919078802533</span></a>
			<hr>
		</div>
		<div class="col-xs-12 col-sm-4">
		<center><img style="border-radius:50%;height:210px;width:200px;" src="https://kiitmun.org/wp-content/uploads/2018/06/ATJ.img_.pro_.png"></center>

			<h4>Achintya Tushar Jha</h4>
			<h3>Deputy Secretary General</h3>
			<img src="<?php echo wp_get_attachment_url(272); ?>"><a href="tel:+917683979698"><span>+917683979698</span></a>
			<hr>
		</div>
		<div class="col-xs-12 col-sm-4">
		<center><img style="border-radius:50%;height:200px;width:200px;" src="https://kiitmun.org/wp-content/uploads/2018/06/IMG_20170927_184214.jpg"></center>
			<h4>Shantanu Raj</h4>
			<h3>Deputy Secretary General</h3>
			<img src="<?php echo wp_get_attachment_url(272); ?>"><a href="tel:+917064002563"><span>+917064002563</span></a>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-4">
		<center><img style="border-radius:50%;height:200px;width:200px;" src="https://kiitmun.org/wp-content/uploads/2018/06/21994418_731807510350403_1301303182683868651_o-2.jpg"></center>

			<h4>Narayan Sharma</h4>
			<h3>Director General</h3>
			<img src="<?php echo wp_get_attachment_url(272); ?>"><a href="tel:+917064032593"><span>+917064032593</span></a>
			<hr>
		</div>
		<div class="col-xs-12 col-sm-4">
		<center><img style="border-radius:50%;height:200px;width:200px;" src="https://kiitmun.org/wp-content/uploads/2018/06/IMG_1923.jpg"></center>
			<h4>Abhinav Sinha</h4>
			<h3>Deputy Director General</h3>
			<img src="<?php echo wp_get_attachment_url(272); ?>"><a href="tel:+919078802611"><span>+919078802611</span></a>
			<hr>
		</div>
		<div class="col-xs-12 col-sm-4">
		<center><img style="border-radius:50%;height:200px;width:200px;" src="https://kiitmun.org/wp-content/uploads/2018/06/IMG_20180522_231336.jpg"></center>
			<h4>Sahil Verma</h4>
			<h3>Chargé D'affaires</h3>
			<img src="<?php echo wp_get_attachment_url(272); ?>"><a href="tel:+917021292158"><span>+917021292158</span></a>
			<hr>
		</div>
	</div>
</section>


<section id="beta-ninth">
	<h1>Meet Us <b>Here</b></h1>
	<hr>
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14962.559068831144!2d85.8136923465576!3d20.356495146139697!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x85a345e1f4fcce86!2sKiiT+Student+Activity+Center-KSAC!5e0!3m2!1sen!2sin!4v1527423728493" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>



<?php get_footer(); ?>
