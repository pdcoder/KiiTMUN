<?php
get_header();
?>
<br/><br/><br/><br/><br/>
<?php if (have_posts()):
	while (have_posts()): the_post(); ?>
		<section id="single-committee" class="container">
			<h1><?php echo get_the_title(); ?></h1>
			<img src = "<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>">
			<h2>Country Matrix</h2>
			<div class="row">
				<ol>
				<?php $countries = explode(',', get_post_meta(get_the_ID(), 'country-list', true));
				foreach($countries as $c){ ?>
					<div class="col-xs-12 col-sm-6 col-sm-3"><li><h4><?php echo $c; ?></h4></li></div> 
				<?php }
				?>
				</ol>
			</div>
			<h2>Agenda</h2>
			<h4><?php 
			$args = array('post_type' => 'post', 'posts_per_page'=> 1, 'cat' => get_cat_ID('Agendas '.get_the_title()));
			$loop = new Wp_Query($args);
			if ($loop->have_posts()):
				while($loop->have_posts()): $loop->the_post();
					the_content();
				endwhile;
			endif;
			wp_reset_query();
			?>
			</h4>
			<h2>Description</h2>
			<h4><?php the_content(); ?></h4>
			<h2>Executive Board Memebers</h2>
			<center>
				<?php 
				$args = array('post_type' => 'attachment', 'post_status' => 'any', 'posts_per_page' => -1, 'cat' => get_cat_ID('Executive Board '.get_the_title()),);
				$loop = new Wp_Query($args);

				if ($loop->have_posts()):
					while ($loop->have_posts()): $loop->the_post(); ?>
						<img src = "<?php echo wp_get_attachment_url(get_the_ID()); ?>" class="executive-board">
						<h3><?php echo get_the_title(); ?></h3>
					<?php endwhile;
				endif;
				?>
			</center>
		</section>
	<?php endwhile;
endif;

get_footer(); ?>

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