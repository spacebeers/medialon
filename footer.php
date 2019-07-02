        </section>
    </div>

    <footer class="site-footer">
        <div class="container">
            <div class="footer-columns">
                <div class="column">
                    <?php dynamic_sidebar('footer-area-one-sidebar'); ?>
                </div>
                <div class="column">
                    <?php dynamic_sidebar('footer-area-two-sidebar'); ?>
                </div>
                <div class="column">
                    <?php dynamic_sidebar('footer-area-three-sidebar'); ?>
                </div>
                <div class="column">
                    <?php dynamic_sidebar('footer-area-four-sidebar'); ?>
                </div>
                <div class="column">
                    <?php dynamic_sidebar('footer-area-five-sidebar'); ?>
                </div>
            </div>
        </div>
        <div class="footer-information">
            <div class="container">
                <?php dynamic_sidebar('footer-information-area-sidebar'); ?>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>