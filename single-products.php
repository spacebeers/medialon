<?php get_header(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class("page"); ?>>
        <div class="post-contents">
            <?php if (have_posts()): while (have_posts()) : the_post(); ?>
            <section class="container">
                <div class="">
                    <div class="product-post-content">
                        <?php custom_breadcrumbs(); ?>
                        <?php echo file_get_contents(get_template_directory_uri() . '/assets/slash.svg'); ?>

                        <div class="product-hero">
                            <div class="product-hero-content">
                                <!-- post title -->
                                <h1><?php the_title(); ?></h1>
                                <!-- /post title -->

                                <?php the_excerpt(); ?>

                                <?php include( locate_template( 'template-parts/content-icon-list.php', false, false ) ); ?>

                                <p>
                                    <a href="" class="btn btn-primary-xs">
                                        <?php echo file_get_contents(get_template_directory_uri() . '/assets/arrow.svg'); ?>
                                        Get a quote now
                                    </a>
                                </p>

                                <?php edit_post_link(); ?>
                            </div>

                            <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
                                <div class="product-hero-image">
                                    <?php the_post_thumbnail("full"); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>

            <div class="strip highlight">
                <div class="container">
                    <div class="product-content">
                        <div class="tabs-wrapper product-tabs">
                            <ul class="tabs">
                                <li rel="tab1" class="active">Overview</li>
                                <li rel="tab2">Spec<span>ifications</span></li>
                                <li rel="tab3">Downloads <span>& Support</span></li>
                            </ul>
                            <div class="tab_container">
                                <h3 class="d_active tab_drawer_heading" rel="tab1">Overview</h3>
                                <div id="tab1" class="tab_content tab_overview">
                                    <?php
                                        $image = get_field('overview_image');
                                        $size = 'medium';
                                    ?>

                                    <div class="overview-image">
                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                    </div>

                                    <?php the_content(); ?>
                                </div>
                                <!-- #tab1 -->
                                <h3 class="tab_drawer_heading" rel="tab2">Specifications</h3>
                                <div id="tab2" class="tab_content">
                                    <h2 class="flair">Product Specifications</h2>
                                    <?php if( have_rows('specification_table') ): ?>
                                        <table class="spec-table">
                                            <?php while ( have_rows('specification_table') ) : the_row(); ?>
                                                <tr>
                                                    <td><?php the_sub_field('heading'); ?></td>
                                                    <td><?php the_sub_field('content'); ?></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </table>
                                        <?php else : ?>
                                            <p>No specs found</p>
                                    <?php endif; ?>
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
                            <a href="" class="btn btn-primary btn-block block-button">
                                <?php echo file_get_contents(get_template_directory_uri() . '/assets/arrow.svg'); ?>
                                Get a quote now
                            </a>


                            <?php
                                $file = get_field('spec_sheet');

                                if ( $file ):
                                    $url = wp_get_attachment_url( $file ); ?>
                                    <div class="block block-secondary-dark">
                                        <h2>Download the tech sheet</h2>
                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
                                        <a href="<?php echo $url; ?>" target="_blank" download class="btn btn-secondary">
                                            <?php echo file_get_contents(get_template_directory_uri() . '/assets/arrow.svg'); ?>
                                            Download File
                                        </a>
                                    </div>
                            <?php endif; ?>

                            <div class="block block-primary">
                                <h2>Contact Support</h2>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
                                <a href="#ex1" rel="modal:open" class="btn">
                                    <?php echo file_get_contents(get_template_directory_uri() . '/assets/arrow.svg'); ?>
                                    Contact Support
                                </a>
                                <div id="ex1" class="modal">
                                    <?php echo do_shortcode('[wpforms id="81"]'); ?>
                                </div>
                            </div>

                            <div class="block block-dark">
                                <h2>Register your software</h2>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
                                <a href="<?php echo get_theme_mod( 'medialon_pages_registration_link' ); ?>" class="btn btn-primary">
                                    <?php echo file_get_contents(get_template_directory_uri() . '/assets/arrow.svg'); ?>
                                    Register
                                </a>
                            </div>
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
