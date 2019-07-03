<?php $currentID = get_the_ID(); ?>

<section class="related-content">
    <h2>Related</h2>

    <div class="posts-grid">
        <?php
            $the_query = new WP_Query( array( 'post_type' => 'products', 'post__not_in' => array( $currentID ) ) );
        ?>
        <div>
            <?php
                $x = 0;
                while ($the_query->have_posts()) : $the_query->the_post();
            ?>

                <?php the_post_thumbnail(); ?>
                <?php the_title(); ?>
            <?php
                $x++;
                endwhile;
                wp_reset_query();
            ?>
        </div>
    </div>
</section>