<div class="posts-grid">
    <?php if (have_posts()): while (have_posts()) : the_post();  ?>
        <!-- article -->
        <article id="post-<?php the_ID(); ?>" <?php post_class($string); ?>>
            <div class="post-main">
                <!-- post title -->
                <h2>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                </h2>
                <!-- /post title -->

                <?php the_excerpt(); ?>
            </div>
            <!-- post thumbnail -->
            <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
                <div class="post-image">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php the_post_thumbnail(); ?>
                    </a>
                </div>
            <?php endif; ?>
            <!-- /post thumbnail -->

            <?php echo file_get_contents(get_template_directory_uri() . '/assets/slash.svg'); ?>
        </article>
        <!-- /article -->
    <?php endwhile; ?>
</div>
<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'medialon' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
