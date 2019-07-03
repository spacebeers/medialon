<?php get_header(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class("page"); ?>>
        <div class="post-contents">
            <?php if (have_posts()): while (have_posts()) : the_post(); ?>
            <section class="container">
                <div class="hero">
                    <div class="post-content">
                        <?php custom_breadcrumbs(); ?>

                        <!-- post title -->
                        <h1><?php the_title(); ?></h1>
                        <!-- /post title -->

                        <?php the_excerpt(); ?>

                        <?php include( locate_template( 'template-parts/content-icon-list.php', false, false ) ); ?>

                        <ul class="button-list">
                            <li>
                                <a href="" class="btn btn-primary">
                                    <?php echo file_get_contents(get_template_directory_uri() . '/assets/arrow.svg'); ?>
                                    Get a quote now
                                </a>
                            </li>
                            <li>
                                <a href="" class="btn btn-secondary">
                                    <?php echo file_get_contents(get_template_directory_uri() . '/assets/location-white.svg'); ?>
                                    Where to buy
                                </a>
                            </li>
                        </ul>

                        <?php edit_post_link(); ?>
                    </div>

                    <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
                        <div class="post-image">
                            <?php the_post_thumbnail("full"); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

            <div class="strip highlight">
                <div class="container">
                    <div class="product-content">
                        <div class="tabs-wrapper">
                            <ul class="tabs">
                                <li rel="tab1" class="active">Overview</li>
                                <li rel="tab2">Specifications</li>
                                <li rel="tab3">Downloads & Support</li>
                            </ul>
                            <div class="tab_container">
                                <h3 class="d_active tab_drawer_heading" rel="tab1">Overview</h3>
                                <div id="tab1" class="tab_content">
                                    <?php the_content(); ?>
                                </div>
                                <!-- #tab1 -->
                                <h3 class="tab_drawer_heading" rel="tab2">Specifications</h3>
                                <div id="tab2" class="tab_content">
                                    Spec table
                                </div>
                                <!-- #tab2 -->
                                <h3 class="tab_drawer_heading" rel="tab3">Downloads & Support</h3>
                                <div id="tab3" class="tab_content">
                                    Files and that
                                </div>
                                <!-- #tab3 -->
                            </div>
                            <!-- .tab_container -->

                            <div>
                                <?php get_template_part( 'template-parts/content', 'related' ); ?>
                            </div>
                        </div>
                        <div class="sidebar">
                            sidebar
                        </div>
                    </div>
                </div>
            </div>

            <?php endwhile; ?>

            <?php else: ?>

                <!-- article -->
                <article>

                    <h1><?php _e( 'Sorry, nothing to display.', 'medialon' ); ?></h1>

                </article>
                <!-- /article -->

            <?php endif; ?>
        </div>
    </article>

<?php get_footer(); ?>
