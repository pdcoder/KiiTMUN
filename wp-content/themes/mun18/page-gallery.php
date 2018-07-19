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
	<div class="row gallery-grid">
		
	</div>
</section>


<?php get_footer(); ?>