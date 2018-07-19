<?php
/*Template Name: Committees Page */
get_header();
?>

<section id="committees-first">
	<div class="committees-back">
		<img src="<?php echo wp_get_attachment_url(340); ?>">
		<div class="layer">
			<h1>Committees</h1>
		</div>
	</div>
</section>

<section id="committees-second">
	<?php 
	$args = array('posts_per_page' => -1, 'post_type' => 'committee', 'order' => 'DESC');
	$loop = new Wp_Query($args);

	if ($loop->have_posts()):
		while($loop->have_posts()): $loop->the_post(); ?>

		<div class="row">
			<h1><?php echo get_the_title(); ?></h1>
			<hr>
			<hr>

			<p><?php the_content(); ?></p>
			<br/>
		</div>
	
		<?php 
		endwhile;
	endif;
	?>
	<h1>International Press (IP)</h1>
	<hr>
	<hr>
	<p>As mentioned under Article 19 of the Universal Declaration of Human rights, everyone has the right to freedom of opinion and expression; this right includes freedom to hold opinions without interference and to seek, receive and impart information and ideas through any media and regardless of frontiers. Hence journalists play a crucial role in the functioning of the United Nations. In a nutshell, they help in mediating explanations to the public about what the organization does and why. Instead of representing the interests of a single country, the International Press Delegation allows participants to act as unbiased journalists, reporting on the proceedings of each simulation in the Conference. International Press investigates committee debates, conducts interviews, formulates newsletters and covers press conferences.<p>
<strong>Committee strength: 60</strong>
</section>

<?php get_footer(); ?>