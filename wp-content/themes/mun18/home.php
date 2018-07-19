<?php get_header(); ?>

<section id="blogs-first">
	<div class="blogs-back">
		<img src="<?php echo wp_get_attachment_url(354); ?>">
		<div class="layer">
			<h1>Blogs</h1>
		</div>
	</div>
</section>

<section id="blogs-second">
	<div class="container blogs-container page-container">
		<div class="row blogs-grid">

			<?php 
			$args = array('posts_per_page' => -1, 'cat' => get_cat_ID('Blogs'));
			$loop = new Wp_Query($args);

			if ($loop->have_posts()):
				while ($loop->have_posts()): $loop-> the_post(); ?>

				<div class="blogs">
					<div class="blogs-image">
						<a href="<?php echo get_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>"></a>
					</div>
					<div class="blogs-text">
						<span><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></span>
						<span><?php echo get_post_meta(get_the_ID(), 'Blog Tagline', true); ?></span>
					</div>
					<hr>
				</div>

				<?php 
				endwhile;
			endif;
			?>

		</div>
	</div>
</section>


<?php get_footer(); ?>