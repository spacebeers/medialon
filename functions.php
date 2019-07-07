<?php
    include('classes/social_widget.php');
    include('classes/breadcrumbs.php');

    // Menus
	register_nav_menus( array(
		'main_menu' => 'Main menu'
	) );

    add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

    function special_nav_class ($classes, $item) {
        if (in_array('current-menu-item', $classes) ){
            $classes[] = 'active ';
        }
        return $classes;
    }

    // Fonts
    function wpb_add_google_fonts() {
        wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:100,300,400,600', false );
    }

    add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

    // Vendor scripts
    function medialon_theme_name_scripts() {
        wp_enqueue_script( 'app', get_template_directory_uri() . '/scripts/app.js', array ( 'jquery' ), 1.1, true);
        wp_enqueue_script( 'modal', '//cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js', array ( 'jquery' ), 1.1, true);
    }
    add_action( 'wp_enqueue_scripts', 'medialon_theme_name_scripts' );

    // Vendor styles
    function medialon_theme_name_styles() {
        wp_enqueue_style( 'modal', '//cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css', false);
    }
    add_action( 'wp_enqueue_scripts', 'medialon_theme_name_styles' );

	// Post support
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );
    add_post_type_support( 'page', 'excerpt' );


	// Theme customisers
	function medialon_theme_customizer( $wp_customize ) {
		// Logo section
        $wp_customize->add_section( 'medialon_logo_section' , array(
			'title'       => __( 'Logo', 'medialon' ),
			'priority'    => 30,
			'description' => 'Upload a logo to replace the default site name and description in the header',
		));

		$wp_customize->add_setting( 'medialon_logo' );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'medialon_logo', array(
		    'label'    => __( 'Logo', 'medialon' ),
		    'section'  => 'medialon_logo_section',
		    'settings' => 'medialon_logo',
        )));

        // Social section
        $wp_customize->add_section( 'medialon_social_section' , array(
			'title'       => __( 'Social links', 'medialon' ),
			'priority'    => 30,
			'description' => 'Set links to social accounts here',
        ));

        $wp_customize->add_setting( 'medialon_facebook' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'medialon_facebook', array(
		    'label'    => __( 'Facebook', 'medialon' ),
		    'section'  => 'medialon_social_section',
		    'settings' => 'medialon_facebook',
            'type'			 => 'text'
        )));

        $wp_customize->add_setting( 'medialon_instagram' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'medialon_instagram', array(
		    'label'    => __( 'Instagram', 'medialon' ),
		    'section'  => 'medialon_social_section',
		    'settings' => 'medialon_instagram',
            'type'			 => 'text'
		)));

		$wp_customize->add_setting( 'medialon_twitter' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'medialon_twitter', array(
		    'label'    => __( 'Twitter', 'medialon' ),
		    'section'  => 'medialon_social_section',
		    'settings' => 'medialon_twitter',
            'type'			 => 'text'
        )));

		$wp_customize->add_setting( 'medialon_youtube' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'medialon_youtube', array(
		    'label'    => __( 'Youtube', 'medialon' ),
		    'section'  => 'medialon_social_section',
		    'settings' => 'medialon_youtube',
            'type'			 => 'text'
        )));

		$wp_customize->add_setting( 'medialon_google' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'medialon_google', array(
		    'label'    => __( 'Google Plus', 'medialon' ),
		    'section'  => 'medialon_social_section',
		    'settings' => 'medialon_google',
            'type'			 => 'text'
        )));

        $wp_customize->add_setting( 'medialon_linkedin' );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'medialon_linkedin', array(
		    'label'    => __( 'LinkedIn', 'medialon' ),
		    'section'  => 'medialon_social_section',
		    'settings' => 'medialon_linkedin',
            'type'			 => 'text'
        )));

        $wp_customize->add_section( 'medialon_pages_section' , array(
			'title'       => __( 'Page links', 'medialon' ),
			'priority'    => 30,
			'description' => 'Set links to pages here',
		));

        $wp_customize->add_setting( 'medialon_pages_contact_link', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'medialon_sanitize_dropdown_pages',
        ) );

        $wp_customize->add_control( 'medialon_pages_contact_link', array(
            'type' => 'dropdown-pages',
            'section' => 'medialon_pages_section', // Add a default or your own section
            'label' => __( 'Set Contact page' ),
            'description' => __( 'Select a page to use as the contacts link.' ),
        ) );

        $wp_customize->add_setting( 'medialon_pages_products_link', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'medialon_sanitize_dropdown_pages',
        ) );

        $wp_customize->add_control( 'medialon_pages_products_link', array(
            'type' => 'dropdown-pages',
            'section' => 'medialon_pages_section', // Add a default or your own section
            'label' => __( 'Set Products page' ),
            'description' => __( 'Select a page to use as the products link.' ),
        ) );

        $wp_customize->add_setting( 'medialon_pages_registration_link', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'medialon_sanitize_dropdown_pages',
        ) );

        $wp_customize->add_control( 'medialon_pages_registration_link', array(
            'type' => 'dropdown-pages',
            'section' => 'medialon_pages_section', // Add a default or your own section
            'label' => __( 'Set registration page' ),
            'description' => __( 'Select a page to use as the registration link.' ),
        ) );

        function medialon_sanitize_dropdown_pages( $page_id, $setting ) {
            // Ensure $input is an absolute integer.
            $page_id = absint( $page_id );

            // If $page_id is an ID of a published page, return it; otherwise, return the default.
            return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
        }
	}

    add_action( 'customize_register', 'medialon_theme_customizer' );

    /**
    * Register widgetized area and update sidebar with default widgets
    */
    function medialon_widgets_init() {
        register_sidebar( array(
            'name' => __( 'Footer area one', 'medialon' ),
            'id' => 'footer-area-one-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => "</aside>",
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
        ));

        register_sidebar( array(
            'name' => __( 'Footer area two', 'medialon' ),
            'id' => 'footer-area-two-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => "</aside>",
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
        ));

        register_sidebar( array(
            'name' => __( 'Footer area three', 'medialon' ),
            'id' => 'footer-area-three-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => "</aside>",
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
        ));

        register_sidebar( array(
            'name' => __( 'Footer area four', 'medialon' ),
            'id' => 'footer-area-four-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => "</aside>",
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
        ));

        register_sidebar( array(
            'name' => __( 'Footer area five', 'medialon' ),
            'id' => 'footer-area-five-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => "</aside>",
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
        ));

        register_sidebar( array(
            'name' => __( 'Footer information area', 'medialon' ),
            'id' => 'footer-information-area-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => "</aside>",
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>',
        ));
    }

    add_action( 'widgets_init', 'medialon_widgets_init' );

    // Custom post types
   function create_posttype() {
        register_post_type('products',
            array(
                'labels' => array(
                    'name' => __( 'Products' ),
                    'singular_name' => __( 'Product' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'products'),
                'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
            )
        );
    }

    flush_rewrite_rules();

    add_action( 'init', 'create_posttype' );

    // Register and load the widget
    function wpb_load_widget() {
        register_widget( 'wpb_social_widget' );
    }
    add_action( 'widgets_init', 'wpb_load_widget' );

    // Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
    function medialon_pagination()
    {
        global $wp_query;
        $big = 999999999;
        echo paginate_links(array(
            'base' => str_replace($big, '%#%', get_pagenum_link($big)),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages
        ));
    }
?>