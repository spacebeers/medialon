<?php get_header(); ?>

	<main role="main">
		<div class="container">
            <?php custom_breadcrumbs(); ?>
        </div>
		<!-- section -->
		<section class="container">
			<section class="news-container">
            	<div class="news-main">
					<h1 class="visually-hidden"><?php _e( 'News', 'medialon' ); ?></h1>

					<?php get_template_part('loop-news'); ?>

					<?php get_template_part('pagination'); ?>
					<?php wp_reset_query(); ?>
				</div>
				<aside class="news-aside">
					<?php dynamic_sidebar('news-pages-area-sidebar'); ?>

					<?php get_template_part( 'template-parts/content', 'events' ); ?>
				</aside>
		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
