<?php get_header(); ?>

<section id="single">
	<div class="container page-container single-container">
		<?php 
		if (have_posts()):
			while (have_posts()): the_post(); ?>

			<div class="row">
				<div class="single-text">
					<h2><?php echo get_the_title(); ?></h2>
					<hr>
					<h3><?php echo get_post_meta(get_the_ID(), 'Blog Tagline', true); ?> </h3>
					<span class="single-date-time-icon"><img src="<?php echo wp_get_attachment_url(497); ?>"></span><span class="single-date-time"><?php echo get_the_date(); ?>, <?php echo get_the_time(); ?></span>
				</div> 
				<div class="single-image">
					<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>">
				</div>
			</div>
			<div class="container blogs-single-container">
				<?php the_content(); ?>
			</div>

			<div class="row">
				<div class="col-xs-6">
					<span>
					<?php
					if (get_next_post_link( '%link', 'Previous', TRUE )){ ?>
					<< <?php next_post_link( '%link', 'Previous', TRUE ); ?>
					<?php } ?>
					</span>
				</div>
				<div class="col-xs-6">
					<span>
					<?php
					if (get_previous_post_link( '%link', 'Next', TRUE )){ ?>
					<?php previous_post_link( '%link', 'Next', TRUE ); ?> >>
					<?php } ?>
					</span>
				</div>
			</div>

			<?php 
			endwhile;
		endif;
		?>

	</div>	
</section>



<style>
.navbar{
	background-color: white !important;
}
.menu-item a{
	color:black !important;
}
.dropdown-menu>li>a{
	color :black !important;
	text-shadow : 0 0 20px #000 !important;
}
.navbar-nav>li>.dropdown-menu{
	background-color: rgba(255,255,255,0.95) !important;
	border : 0 !important;
}
.navbar-toggle{
	border: 1px solid #00c2e5 !important;
}
.navbar-toggle .icon-bar{
	background-color: #00c2e5 !important;
}
.navbar-right{
	background-color: white !important;
}
.navbar-brand #img1{
	display: block !important;
} 
.navbar-brand #img2{
	display: none !important;
}
</style>


<?php get_footer(); ?>