<?php get_header(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class("page"); ?>>
        <div class="post-contents">
            <?php if (have_posts()): while (have_posts()) : the_post(); ?>
            <section class="container">
                <div class="">
                    <div class="product-post-content">
                        <!--<?php custom_breadcrumbs(); ?>-->
                        <?php echo file_get_contents(get_template_directory_uri() . '/assets/slash.svg'); ?>

                        <div class="product-hero">
                            <div class="product-hero-content">
                                <!-- post title -->
                                <h1 class="super-title" data-content="Products"><?php the_title(); ?></h1>
                                <!-- /post title -->

                                <?php the_excerpt(); ?>

                                <?php include( locate_template( 'template-parts/content-icon-list.php', false, false ) ); ?>

                                <p>
                                    <a href="#quote-form" rel="modal:open" class="btn btn-primary btn-block-xs">
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
                                <li rel="overview-tab" class="active">Overview</li>
                                <li rel="specifications-tab">Spec<span>ifications</span></li>
                                <li rel="drivers-tab">Downloads <span>& Support</span></li>
                            </ul>
                            <div class="tab_container">
                                <h3 class="d_active tab_drawer_heading" rel="overview-tab">Overview</h3>
                                <div id="overview-tab" class="tab_content tab_overview">
                                    <?php
                                        $image = get_field('overview_image');
                                        $size = 'medium';
                                    ?>

                                    <div class="overview-image">
                                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                    </div>

                                    <?php the_content(); ?>
                                </div>
                                <!-- #overview-tab -->
                                <h3 class="tab_drawer_heading" rel="specifications-tab">Specifications</h3>
                                <div id="specifications-tab" class="tab_content">
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

                                        <small>Technical specifications are subject to change without prior notice.</small>
                                        <?php else : ?>
                                            <p>No specs available</p>
                                    <?php endif; ?>
                                </div>
                                <!-- #specifications-tab -->
                                <h3 class="tab_drawer_heading" rel="drivers-tab">Downloads & Support</h3>
                                <div id="drivers-tab" class="tab_content">
                                    <h2 class="flair">Drivers, Manuals & Users Guides</h2>
                                    <?php if( have_rows('files') ): ?>
                                        <?php while ( have_rows('files') ) : the_row(); ?>
                                            <article class="file">
                                                <?php echo file_get_contents(get_template_directory_uri() . '/assets/slash.svg'); ?>
                                                <div class="file-content">
                                                    <h3 class="super-title" data-content="<?php the_sub_field('type'); ?>"><?php the_sub_field('name'); ?></h3>
                                                    <ul>
                                                        <li>
                                                            <strong>Version: </strong>
                                                            <span><?php the_sub_field('version'); ?></span>
                                                        </li>
                                                        <li>
                                                            <strong>Release date: </strong>
                                                            <span><?php the_sub_field('release_date'); ?></span>
                                                        </li>
                                                        <li>
                                                            <strong>Language: </strong>
                                                            <span><?php the_sub_field('language'); ?></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="file-links">
                                                    <?php $file = get_sub_field('file'); ?>
                                                    <a href="<?php echo $file['url']; ?>" class="btn btn-primary btn-block btn-large" download target="_blank">Download <span> (<?php echo formatBytes($file['filesize']); ?>)</span></a>
                                                </div>
                                            </article>
                                        <?php endwhile; ?>
                                    <?php else : ?>
                                        <p>No files available</p>
                                    <?php endif; ?>
                                </div>
                                <!-- #tab3 -->
                            </div>
                            <!-- .tab_container -->

                            <div>
                                <?php get_template_part( 'template-parts/content', 'related' ); ?>
                            </div>
                        </div>
                        <div class="sidebar">
                            <a href="#quote-form" rel="modal:open" class="btn btn-primary btn-block block-button btn-large">
                                <?php echo file_get_contents(get_template_directory_uri() . '/assets/arrow.svg'); ?>
                                Get a quote now
                            </a>

                            <?php if( have_rows('product_sidebar') ):

                                while( have_rows('product_sidebar') ): the_row();
                                    // vars
                                    $block = get_sub_field('block');
                                    $target = $block['what_does_this_block_do'];

                                    if ($target == 'tab'):
                                        $link = "#".$block['target_tab'];
                                    elseif ($target == 'link'):
                                         $link = $block['link'];
                                    elseif ($target == 'file'):
                                         $link = $block['file']['url'];
                                    elseif ($target == 'lightbox'):
                                         $form = "form-modal-".$block['form'];
                                         $link = "#".$form;
                                    endif;
                                ?>
                                    <div class="block <?php echo $block['color']; ?>">
                                        <h2><?php echo $block['title']; ?></h2>
                                        <p><?php echo $block['content']; ?></p>
                                        <a href="<?php echo $link; ?>"
                                            <?php if ($target == 'tab'): echo "data-tab-target='".$block['target_tab']."'"; endif; ?>
                                            <?php if ($target == 'lightbox'): echo "rel=\"modal:open\""; endif; ?>
                                            <?php if ($target == 'file'): echo "target=\"_blank\""; endif; ?>
                                            class="btn">
                                            <?php echo file_get_contents(get_template_directory_uri() . '/assets/arrow.svg'); ?>
                                            <?php echo $block['link_text']; ?>
                                        </a>
                                    </div>
                                <?php endwhile; ?>

                            <?php endif; ?>
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

    <div id="form-modal-99" class="modal">
        <?php echo do_shortcode('[wpforms id="99"]'); ?>
    </div>
    <div id="form-modal-81" class="modal">
        <?php echo do_shortcode('[wpforms id="81"]'); ?>
    </div>
    <div id="form-modal-16" class="modal">
        <?php echo do_shortcode('[wpforms id="16"]'); ?>
    </div>
    <div id="form-modal-86" class="modal">
        <?php echo do_shortcode('[wpforms id="86"]'); ?>
    </div>

<?php get_footer(); ?>
