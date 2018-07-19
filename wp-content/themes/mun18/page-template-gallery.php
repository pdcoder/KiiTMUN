<?php
/*Template Name: Gallery Page */
get_header();
?>

<section id="gallery-first">
	<div class="gallery-back">
		<img src="<?php echo wp_get_attachment_url(277); ?>">
		<div class="layer">
			<h1>Gallery</h1>
		</div>
	</div>
</section>

<section id="gallery-second">
	<div class="container">
		<div class="row gallery-grid">
			<?php 
			$args = array('post_type' => 'attachment', 'post_mime_type' =>'image', 'post_status' => 'inherit', 'posts_per_page' => -1, 'cat' => get_cat_ID('gallery'), 'orderby' => 'rand');
			$loop = new Wp_Query($args);
			if ($loop->have_posts()):
				while($loop->have_posts()): $loop->the_post(); ?>
					
					<div class="item">
						<img src="<?php echo wp_get_attachment_url(get_the_ID()); ?>" >
					</div>

				<?php endwhile;
			endif;
			?>
		</div>
	</div>
</section>


<?php get_footer(); ?>