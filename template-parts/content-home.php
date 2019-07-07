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

                <a href="" class="btn btn-primary">
                    <?php echo file_get_contents(get_template_directory_uri() . '/assets/arrow.svg'); ?>
                    Discover our products
                </a>
            </div>
        </div>
    </div>

    <section class="container">
        <div class="tabs-wrapper">
            <div class="tabs-header">
                <p>Show control solution</p>

                <h2>
                    <?php the_field('products_section_heading'); ?>
                </h2>

                <p>Medialon products</p>
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
                            <h4 class="product-tab-title"><?php the_title(); ?></h4>
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
    <section class="container">
        <div class="content-row">
            <div class="content-column">
                <?php the_content(); ?>
            </div>
            <div class="content-column">
                <?php $file = get_field('press_release_link'); ?>
                <?php if ($file): ?>
                    <div class="press-release-box">
                        <h2>Press release</h2>
                        <?php the_field('products_section_heading'); ?>
                        <p>
                            <a href="<?php echo $file['url']; ?>" class="btn btn-primary" download target="_blank">
                                <?php echo file_get_contents(get_template_directory_uri() . '/assets/arrow.svg'); ?>
                                Read the press release
                            </a>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </section>
</article>