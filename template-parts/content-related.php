<?php $currentID = get_the_ID(); ?>

<section class="related-content">
    <h2 class="flair">Other Medialon products</h2>

    <div class="posts-grid">
        <?php
            $the_query = new WP_Query( array( 'post_type' => 'products', 'post__not_in' => array( $currentID ) ) );
        ?>
        <div class="related-list">
            <?php
                $x = 0;
                while ($the_query->have_posts()) : $the_query->the_post();
            ?>
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); ?>
                    <?php the_title(); ?>
                </a>
            <?php
                $x++;
                endwhile;
                wp_reset_query();
            ?>
        </div>
    </div>
</section>