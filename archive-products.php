<?php get_header(); ?>
	<!-- section -->
	<section class="strip highlight">
		<div class="container">
			<!--<?php custom_breadcrumbs(); ?>-->

			<h1 class="flair"><?php _e( 'Products', 'medialon' ); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</div>
	</section>
	<!-- /section -->
<?php get_footer(); ?>
