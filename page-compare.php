<?php
    /**
    * Template Name: Comparison Page
    */
    get_header(); ?>

    <?php
        // Start the loop.
        while ( have_posts() ) : the_post();

            // Include the page content template.
            get_template_part( 'template-parts/content', 'compare' );

        // End the loop.
        endwhile;
    ?>

<?php get_footer(); ?>