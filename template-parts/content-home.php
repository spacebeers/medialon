<?php
    $hero_image = get_field('hero_image');
    $strip_image = get_field('strip_image');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("page"); ?>>
    <div class="container">
        <div class="hero">
           <img src="<?php echo $hero_image['url']; ?>" alt="<?php echo $hero_image['alt'] ?>" />
        </div>
        <section class="contents">
            <h1><?php the_title(); ?></h1>

            <?php the_content(); ?>

            <?php edit_post_link( __( 'Edit', 'medialon' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>
        </section>
    </div>
    <div class="strip-image">
        <div class="parallaxed" style="background-image: url(<?php echo $strip_image['url']; ?>);"></div>
    </div>

    <?php
        // vars
        $secondary_content = get_field('secondary_content');

        if( $secondary_content ): ?>
            <div class="secondary_contents">
                <div class="inner">
                    <div class="image">
                        <img src="<?php echo $secondary_content['image']['url']; ?>" alt="<?php echo $secondary_content['image']['alt']; ?>" />
                    </div>
                    <div class="content">
                        <div class="content-inner">
                            <?php echo $secondary_content['content']; ?>
                        </div>
                    </div>
                </div>
            </div>
    <?php endif; ?>
</article>