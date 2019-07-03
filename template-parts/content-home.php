<?php
    $hero_image = get_field('hero_image');
    $strip_image = get_field('strip_image');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("page"); ?>>

    <section class="container">
        <div class="tabs-wrapper">
            <h2>Medialon products</h2>
            <?php
            $the_query = new WP_Query('post_type=products');?>
            <ul class="tabs">
                <?php
                    $x = 0;
                    while ($the_query->have_posts()) : $the_query->the_post();
                ?>
                        <li rel="tab_<?php the_id(); ?>" class="<?php if ($x == 0): echo 'active'; endif; ?>">
                            <?php the_post_thumbnail(); ?>
                            <?php the_title(); ?>
                        </li>
                <?php
                    $x++;
                    endwhile;
                    wp_reset_query();
                ?>
            </ul>
            <div class="tab_container">
                <?php
                    $i = 0;
                    while ($the_query->have_posts()) : $the_query->the_post();
                ?>
                    <h3 class="<?php if ($i == 0): echo 'd_active'; endif; ?> tab_drawer_heading" rel="tab_<?php the_id(); ?>">
                        <?php the_post_thumbnail(); ?>
                        <?php the_title(); ?>
                    </h3>
                    <div id="tab_<?php the_id(); ?>" class="tab_content">
                        <div class="tab-product-content">
                            <h4><?php the_title(); ?></h4>
                            <p><?php the_excerpt(); ?></p>

                            <a href="<?php the_permalink();?>" class="btn btn-primary">Learn more</a>
                        </div>
                        <div class="tab-product-image">
                            <?php the_post_thumbnail('full'); ?>
                        </div>


                    </div>
                <?php
                    $i++;
                    endwhile;
                    wp_reset_query();
                ?>
            </div>
        </div>
    </section>
    <section class="container">
        <?php the_content(); ?>
    </section>
</article>