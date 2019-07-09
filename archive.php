<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<h1><?php _e( 'Archives', 'medialon' ); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>
			<?php wp_reset_query(); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
