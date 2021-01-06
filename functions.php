<?php
/**
 * ripple-wp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ripple-wp
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'ripple_wp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ripple_wp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ripple-wp, use a find and replace
		 * to change 'ripple-wp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ripple-wp', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );
        
        
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
                'primary-menu' => esc_html__( 'Primary', 'ripple-wp' ),
                'top-menu' => esc_html__( 'Top Bar', 'ripple-wp' ),
                'footer-menu' => esc_html__( 'Footer', 'ripple-wp' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'ripple_wp_custom_background_args',
				array(
					'default-color' => '#ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );
        
        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

        add_theme_support( 'wp-block-styles' );

        add_theme_support( 'align-wide' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'ripple_wp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ripple_wp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ripple_wp_content_width', 640 );
}
add_action( 'after_setup_theme', 'ripple_wp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ripple_wp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ripple-wp' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ripple-wp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
    );

    register_sidebar(
		array(
			'name'          => esc_html__( 'Above Footer Widget Area', 'ripple-wp' ),
			'id'            => 'footer-top',
			'description'   => esc_html__( 'Add widgets here.', 'ripple-wp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
    );
    
    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget 1', 'ripple-wp' ),
			'id'            => 'footer-widget-1',
			'description'   => esc_html__( 'Add widgets here.', 'ripple-wp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
    );
    
    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget 2', 'ripple-wp' ),
			'id'            => 'footer-widget-2',
			'description'   => esc_html__( 'Add widgets here.', 'ripple-wp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
    );
    
    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget 3', 'ripple-wp' ),
			'id'            => 'footer-widget-3',
			'description'   => esc_html__( 'Add widgets here.', 'ripple-wp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
    );
    
    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget 4', 'ripple-wp' ),
			'id'            => 'footer-widget-4',
			'description'   => esc_html__( 'Add widgets here.', 'ripple-wp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ripple_wp_widgets_init' );

// Adds support for editor color palette.

/*$text_color = get_theme_mod('text_color');
if(!empty(get_theme_mod('text_color'))){
    $text_color = get_theme_mod('text_color');
}else{
    $text_color = '#292b26';
}*/

function theme_colors($color_option, $default_color){
    $var = '$'.$color_option;
    if(!empty(get_theme_mod($color_option) ) ){
        $var = get_theme_mod($color_option);
    }else{
        $var = $default_color;
    }

    return $var;
}

$text_color = theme_colors('text_color', '#292b26');

$accent_color = theme_colors('accent_color', '#d50943' );

$theme_color_one = theme_colors('top_bar_footer_color', '#5fd3e2');

$theme_color_two = theme_colors('header_color', '#ffffff');

add_theme_support( 'editor-color-palette', array(
    array(
		'name'  => __( 'Text Color', 'ripple-wp' ),
		'slug'  => 'text-color',
		'color' => $text_color,
    ),
    array(
		'name'  => __( 'Accent Color', 'ripple-wp' ),
		'slug'  => 'accent-color',
		'color' => $accent_color,
	),
	array(
		'name'  => __( 'Theme Color 1', 'ripple-wp' ),
		'slug'  => 'theme-color-one',
		'color'	=> $theme_color_one,
    ),
    
    array(
		'name'  => __( 'Theme Color 2', 'ripple-wp' ),
		'slug'  => 'theme-color-two',
		'color'	=> $theme_color_two,
	),
) );

function ripple_wp_set_theme_colors_for_editor(){
    ?>
    <style type="text/css">
        .has-text-color-background-color{
            background-color: <?php echo $text_color; ?>
        }

        .has-text-color-color{
            color: <?php echo $text_color; ?>
        }

        .has-accent-color-background-color{
            background-color: <?php echo $accent_color; ?>
        }

        .has-accent-color-color{
            color: <?php echo $accent_color; ?>
        }

        .has-theme-color-one-background-color{
            background-color: <?php echo $theme_color_one; ?>
        }

        .has-theme-color-one-color{
            color: <?php echo $theme_color_one; ?>
        }

        .has-theme-color-two-background-color{
            background-color: <?php echo $theme_color_two; ?>
        }

        .has-theme-color-two-color{
            color: <?php echo $theme_color_two; ?>
        }
    </style>
    <?php
}

/** Enqueue Google Fonts */
function ripple_wp_google_fonts(){
    $font_option = get_theme_mod('header_font_options');

    switch ($font_option) {
        case 'Roboto':
            wp_enqueue_style('roboto', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"', array(), _S_VERSION);
        break;
        case 'Slabo':
            wp_enqueue_style('slabo', 'https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap" rel="stylesheet"', array(), _S_VERSION);
        break;
        case 'Oswald':
            wp_enqueue_style('oswald', 'https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"', array(), _S_VERSION);
        break;
        case 'Cairo':
            wp_enqueue_style('cairo', 'https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet"', array(), _S_VERSION);
        break;
        case 'BioRhyme':
            wp_enqueue_style('biorhyme', 'https://fonts.googleapis.com/css2?family=BioRhyme:wght@200;300;400;700&display=swap" rel="stylesheet"', array(), _S_VERSION);
        break;  
        case 'Rakkas':
            wp_enqueue_style('rakkas', 'https://fonts.googleapis.com/css2?family=Rakkas&display=swap" rel="stylesheet"', array(), _S_VERSION);
        break;
    }
}
add_action( 'wp_enqueue_scripts', 'ripple_wp_google_fonts' );

/**
 * Enqueue scripts and styles.
 */
function ripple_wp_scripts() {
    wp_enqueue_style( 'ripple-wp-style', get_stylesheet_uri(), array(), _S_VERSION );

    wp_enqueue_style( 'open-sans', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet', array(), _S_VERSION );

    wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/991c67fc22.js', array(), _S_VERSION);

    wp_style_add_data( 'ripple-wp-style', 'rtl', 'replace' );

	wp_enqueue_script( 'ripple-wp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ripple_wp_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Theme Options Page
 */
require get_template_directory() . '/inc/theme_options.php';

/**Top Menu */
function wp_ripple_topbar() {
    $class = wp_ripple_search_class();
    if ( true == get_theme_mod( 'show_topbar', true ) ){
    ?>
        <div class="topbar <?php echo $class; ?>">    
            <div class="wrapper align-right">
                <?php ripple_wp_top_menu(); ?>
            </div>
        
        </div>
        <?php
    }
}

function wp_ripple_search_class(){
    $show_search = get_theme_mod( 'add_search_icon' );
    if( $show_search == 'top_bar' ) {
        $class = "search";
    }else{
        $class='';
    }

    return $class;
}


function ripple_wp_top_menu(){

    if ( has_nav_menu( 'top-menu' ) ) {
        wp_nav_menu(
            array(
                'theme_location' => 'top-menu',
                'menu_id'        => 'top-menu',
            )
        );
    } 
}

function ripple_wp_search_option(){
    
    ?>
    <div id="rp_search_form"><?php //get_search_form(); ?></div>
<?php
}


function ripple_wp_add_search_toggle($items, $args) {
    $show_search    = get_theme_mod( 'add_search_icon' );
    if( $show_search == 'top_bar' ) {
        if( $args->theme_location == 'top-menu' ){
            $items .=  '<li class="menu-item">';
            $items .= get_search_form($echo = false);
            $items .= '</li>';
        }
    }elseif($show_search == 'primary_menu'){
        if( $args->theme_location == 'primary-menu' ){
            $items .=  '<li class="menu-item">';
            $items .= get_search_form($echo = false);
            $items .= '</li>';
        }
    }   
     
    return $items;
}
add_filter('wp_nav_menu_items', 'ripple_wp_add_search_toggle', 10, 2);


/**Custom Header Image */
function ripple_wp_custom_header_image(){
    ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        <img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
    </a>
    <?php
}

/**Excerpt Length */
// Limit except length to 125 characters.
// tn limited excerpt length by number of characters
function ripple_wp_get_excerpt( $count ) {
    global $post;
    $permalink = get_permalink($post->ID);
    $excerpt = get_the_content();
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $count);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = '<p>'.$excerpt.'... <a href="'.$permalink.'">Read More</a></p>';
    //return $excerpt;
    echo $excerpt;
}

/**Header Display Options */
function ripple_wp_is_left_logo(){
    if(get_theme_mod('header_layout_options') == "logo_left"){
        return true;
    }
}


add_action( 'add_meta_boxes', 'ripple_wp_page_add_meta_box' );

if ( ! function_exists( 'ripple_wp_page_add_meta_box' ) ) {
	/**
	 * Add meta box to page screen
	 *
	 * This function handles the addition of variuos meta boxes to your page or post screens.
	 * You can add as many meta boxes as you want, but as a rule of thumb it's better to add
	 * only what you need. If you can logically fit everything in a single metabox then add
	 * it in a single meta box, rather than putting each control in a separate meta box.
	 *
	 * @since 1.0.0
	 */
	function ripple_wp_page_add_meta_box() {
		add_meta_box( 'additional-page-metabox-options', esc_html__( 'Ripple WP Page Settings', 'ripple-wp' ), 'ripple_wp_page_metabox_controls', 'page', 'side', 'low' );
	}
}

/**
 * Callback function for our meta box.  Echos out the content
 */
function ripple_wp_page_metabox_controls( $post )
{
    $meta = get_post_meta( $post->ID );
    //Option to hide the page title
    $ripple_wp_hide_page_title = ( isset( $meta['ripple_wp_hide_page_title'][0] ) &&  '1' === $meta['ripple_wp_hide_page_title'][0] ) ? 1 : 0;

    wp_nonce_field( 'ripple_wp_page_control_meta_box', 'ripple_wp_page_control_meta_box_nonce' ); // Always add nonce to your meta boxes!
    ?>
    <div class="page_meta_extras">
        <p>
            <label><input type="checkbox" name="ripple_wp_hide_page_title" value="1" <?php checked( $ripple_wp_hide_page_title, 1 ); ?> /><?php esc_attr_e( 'Hide Page Title', 'ripple-wp' ); ?></label>
        </p>
    </div>
    <?php
    
    //Option to hide the header and footer

}

//Saving the metabox data
add_action( 'save_post', 'ripple_wp_page_save_metaboxes' );
if ( ! function_exists( 'ripple_wp_page_save_metaboxes' ) ) {

    function ripple_wp_page_save_metaboxes( $post_id ) {

        if ( ! isset( $_POST['ripple_wp_page_control_meta_box_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['ripple_wp_page_control_meta_box_nonce'] ), 'ripple_wp_page_control_meta_box' ) ) { // Input var okay.
			return $post_id;
        }
        
        // Check the user's permissions.
		if ( isset( $_POST['post_type'] ) && 'page' === $_POST['post_type'] ) { // Input var okay.
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return $post_id;
			}
		} else {
			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return $post_id;
			}
        }
        
        /*
		 * If this is an autosave, our form has not been submitted,
		 * so we don't want to do anything.
		 */
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
        }
        
        $ripple_wp_hide_page_title = ( isset( $_POST['ripple_wp_hide_page_title'] ) && '1' === $_POST['ripple_wp_hide_page_title'] ) ? 1 : 0; // Input var okay.
		update_post_meta( $post_id, 'ripple_wp_hide_page_title', esc_attr( $ripple_wp_hide_page_title ) );
    }
}

/*
*
* Walker for the main menu 
*
*/
//add_filter( 'walker_nav_menu_start_el', 'add_arrow',10,4);
function add_arrow( $output, $item, $depth, $args ){

    //Only add class to 'top level' items on the 'primary' menu.
    if('primary-menu' == $args->theme_location && $depth === 0 ){
        if (in_array("menu-item-has-children", $item->classes)) {
            $output .='<i class="fas fa-angle-down"></i>';
        }
    }
    return $output;
}

//Admin notices when theme is activated

/* Display a notice that can be dismissed */

function ripple_wp_display_install_notice() {
    global $current_user ;
    $customizer_url = self_admin_url() . 'customize.php';
        $user_id = $current_user->ID;
        /* Check that the user hasn't already clicked to ignore the message */
	if ( ! get_user_meta($user_id, 'ripple_wp_admin_notice_ignore') ) {
    echo '<div class="notice notice-info is-dismissible ripple_wp_update_notice"><p>';
    printf(__('<b>Thanks for choosing the RippleWP Theme!</b><br /><br /> We have some beautiful layouts to get your site up and running asap. Install the <a href="https://chamberdashboard.com/downloads/ripplewp-theme-package1/" target="_blank">Layout Block Plugin</a> to choose a demo layout or get started <a href="'.$customizer_url.'">customizing</a> your site. | <a href="%1$s">Hide Notice</a>', 'ripple-wp'), '?ripple_wp_admin_notice_ignore=0');
    echo "</p></div>";
	}
}
add_action( 'admin_notices', 'ripple_wp_display_install_notice' );

function ripple_wp_admin_notice_ignore() {
	global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['ripple_wp_admin_notice_ignore']) && '0' == $_GET['ripple_wp_admin_notice_ignore'] ) {
             add_user_meta($user_id, 'ripple_wp_admin_notice_ignore', 'true', true);
	}
}
add_action('admin_init', 'ripple_wp_admin_notice_ignore');
