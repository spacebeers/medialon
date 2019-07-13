<?php
    $image = get_field('hero_image');
    $size = 'full'; // (thumbnail, medium, large, full or custom size)
?>

<div class="slash-image" role="presentation">
    <?php the_post_thumbnail("full"); ?>
</div>

<article id="post-<?php the_ID(); ?>" <?php post_class("page"); ?>>
    <div class="hero" style="background-image: url(<?php echo $image['url']; ?>); background-size: auto; background-position: center;">
        <div class="container">
            <div class="hero-content">
                <?php the_field('hero_contents'); ?>

                <a href="<?php echo get_post_type_archive_link( 'products' ); ?>" class="btn btn-primary">
                    <?php echo file_get_contents(get_template_directory_uri() . '/assets/arrow.svg'); ?>
                    Discover our products
                </a>
            </div>
        </div>
    </div>

    <section class="container">
        <div class="tabs-wrapper">
            <div class="tabs-header">
                <h2>
                    <?php the_field('products_section_heading'); ?>
                </h2>

                <div class="flair-line"></div>
                <h3>Medialon products</h3>
            </div>
            <?php
            $the_query = new WP_Query('post_type=products');?>
            <ul class="tabs home-tabs">
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
            <div class="tab_container home-tab-container">
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
                            <h4 class="product-tab-title super-title" data-content="Products"><?php the_title(); ?></h4>
                            <?php the_excerpt(); ?>

                            <?php include( locate_template( 'template-parts/content-icon-list.php', false, false ) ); ?>

                            <a href="<?php the_permalink();?>" class="btn btn-primary">
                                <?php echo file_get_contents(get_template_directory_uri() . '/assets/arrow.svg'); ?>
                                Learn more
                            </a>
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
    <section class="press-release-section strip">
        <?php
            $press_image = get_field('press_release_image');
            $size = 'full'; // (thumbnail, medium, large, full or custom size)
        ?>
        <?php if ($press_image): ?>
            <div class="slash-image" role="presentation">
                <img src="<?php echo $press_image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
            </div>
        <?php endif; ?>
        <section class="container">
            <div class="content-row">
                <div class="content-column">
                    <?php the_content(); ?>
                </div>
                <div class="content-column press-release-column">
                    <?php $file = get_field('press_release_link'); ?>
                    <?php if ($file): ?>
                        <div class="block block-secondary">
                            <h2>Press release</h2>
                            <p><?php the_field('press_release_content'); ?></p>
                            <a href="<?php echo $file['url']; ?>" class="btn btn-primary" target="_blank">
                                <?php echo file_get_contents(get_template_directory_uri() . '/assets/arrow.svg'); ?>
                                Read the press release
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </section>
</article>