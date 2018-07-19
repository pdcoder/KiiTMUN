<?php
/*Template Name: Sponsors Page */
get_header();
?>

<section id="about-first">
	<div class="about-back">
		<img src="https://kiitmun.org/wp-content/uploads/2018/05/FB_IMG_1527261218906.jpg">
		<div class="layer">
			<h1>Partners</h1>
		</div>
	</div>
</section>
<div style="margin-left:10px; margin-right:20px; text-align: center; @media screen and (max-width: 768px){top: 0;margin-top: 25%;height: 50%;font-size: 28px;}; line-height: 200px;">
<?php 
if (have_posts()):
	while (have_posts()): the_post();
		the_content();
	endwhile;
endif;
?>
</div>
<?php get_footer(); ?>
