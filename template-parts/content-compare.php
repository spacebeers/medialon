<article id="post-<?php the_ID(); ?>" <?php post_class("page"); ?>>
    <div class="post-contents">
        <section class="container">
            <div class="product-post-content">
                <!--<?php custom_breadcrumbs(); ?>-->
                <?php echo file_get_contents(get_template_directory_uri() . '/assets/slash.svg'); ?>

                <div class="product-hero">
                    <div class="product-hero-content">
                        <!-- post title -->
                        <h1 class="super-title" data-content="Products"><?php the_title(); ?></h1>
                        <!-- /post title -->

                        <?php the_excerpt(); ?>
                        <?php the_content(); ?>

                        <?php edit_post_link(); ?>
                    </div>

                    <?php if (has_post_thumbnail()) : // Check if thumbnail exists
                    ?>
                        <div class="product-hero-image">
                            <?php the_post_thumbnail("full"); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <div class="strip highlight">
            <div class="container">
                <table class="rtable">
                    <thead>
                        <tr>
                            <th>Browser</th>
                            <th>Sessions</th>
                            <th>Percentage</td>
                            <th>New Users</th>
                            <th>Avg. Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Chrome</td>
                            <td>9,562</td>
                            <td>68.81%</td>
                            <td>7,895</td>
                            <td>01:07</td>
                        </tr>
                        <tr>
                            <td>Firefox</td>
                            <td>2,403</td>
                            <td>17.29%</td>
                            <td>2,046</td>
                            <td>00:59</td>
                        </tr>
                        <tr>
                            <td>Safari</td>
                            <td>1,089</td>
                            <td>2.63%</td>
                            <td>904</td>
                            <td>00:59</td>
                        </tr>
                        <tr>
                            <td>Internet Explorer</td>
                            <td>366</td>
                            <td>2.63%</td>
                            <td>333</td>
                            <td>01:01</td>
                        </tr>
                        <tr>
                            <td>Safari (in-app)</td>
                            <td>162</td>
                            <td>1.17%</td>
                            <td>112</td>
                            <td>00:58</td>
                        </tr>
                        <tr>
                            <td>Opera</td>
                            <td>103</td>
                            <td>0.74%</td>
                            <td>87</td>
                            <td>01:22</td>
                        </tr>
                        <tr>
                            <td>Edge</td>
                            <td>98</td>
                            <td>0.71%</td>
                            <td>69</td>
                            <td>01:18</td>
                        </tr>
                        <tr>
                            <td>Other</td>
                            <td>275</td>
                            <td>6.02%</td>
                            <td>90</td>
                            <td>N/A</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</article>