<article id="post-<?php the_ID(); ?>" <?php post_class("generic-page"); ?>>
    <div class="contents">
        <?php custom_breadcrumbs(); ?>

        <h1><?php the_title(); ?></h1>

        <?php the_content(); ?>

        <?php edit_post_link( __( 'Edit', 'medialon' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>
    </div>
</article>