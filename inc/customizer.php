<?php
/**
 * ripple-wp Theme Customizer
 *
 * @package ripple-wp
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ripple_wp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'ripple_wp_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'ripple_wp_customize_partial_blogdescription',
			)
        );

        $wp_customize->selective_refresh->add_partial(
            'logo',
            array(
                'selector'          => '.logo',
                'render_callback'   => 'ripple_wp_customize_partial_logo' 
            )
        );
	}
}
add_action( 'customize_register', 'ripple_wp_customize_register' );

// Documentation Panel
function ripple_wp_docs_help_register( $wp_customize ) {
    class RIPPLE_WP_Important_Links extends WP_Customize_Control {

        public $type = "ripple-wp-important-links";
    
        public function render_content() {
        // Add Theme instruction, Support Forum, Demo Link, Rating Link
            $important_links = array(
                'welcome' => array(
                    'link' => esc_url('themes.php?page=rp_options'),
                    'text' => __('Install a Demo Layout', 'ripple-wp'),
                    'target'	=> __(''),
                ),
                'demo-docs' => array(
                    'link' => esc_url('https://chamberdashboard.com/docs/wordpress-themes/'),
                    'text' => __('Customize Demo Layouts', 'ripple-wp'),
                    'target'	=> '_blank',
                ),
                'documentation' => array(
                    'link' => esc_url('https://chamberdashboard.com/docs/wordpress-themes/ripplewp/'),
                    'text' => __('RippleWP Documentation', 'ripple-wp'),
                    'target'	=> '_blank',
                ),
                'support' => array(
                    'link' => esc_url('https://chamberdashboard.com/my-account/'),
                    'text' => __('Get Support', 'ripple-wp'),
                    'target'	=> '_blank',
                ),
            );
            foreach ($important_links as $important_link) {
                echo '<p><a target="' . $important_link['target'] . '" href="' . $important_link['link'] . '" >' . esc_attr($important_link['text']) . ' </a></p>';
            } ?>
            <?php }
    }
    
    $wp_customize->add_section(
        'documentation',
            array(
                'title' 		=> __('How to Use RippleWP', 'ripple-wp'),
                'description'	=> __( 'Important links to documentation and support for the RippleWP theme.', 'ripple-wp' ),
                'priority' 		=> 1,
            )
    );
    
    $wp_customize->add_setting('ripple_wp[ripple-wp-important-links]', array(
        'capability'	=> 'edit_theme_options',
        'type'			=> 'option',
    ));
    
    $wp_customize->add_control(new RIPPLE_WP_Important_Links($wp_customize, 'important_links', array(
        'label' 	=> __('Instructions for getting started with your new theme and how to get support.', 'ripple-wp'),
        'section' 	=> 'documentation',
        'settings'	=> 'ripple_wp[ripple-wp-important-links]'
    )));
}
add_action( 'customize_register', 'ripple_wp_docs_help_register' );

/**Ripple WP Theme Header Options */

function ripple_wp_theme_options($wp_customize){
    $wp_customize->add_panel( 'rwp_theme_options', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('RippleWP Theme Options', 'ripple-wp'),
        'description'    => '',
    ) );
    $wp_customize->add_section('header_options' , array(
        'title'     => __('Header Options', 'ripple-wp'),
        'priority'  => 10,
        'panel'         => 'rwp_theme_options'
    ));

    $wp_customize->add_setting( 'header_layout_options' , array(
        'default'     => 'logo_center',
        'transport'   => 'refresh',
        'sanitize_callback' => 'ripple_wp_sanitize_choices'
    ) );

    $wp_customize->add_control( 'header_layout_options', array(
        'priority'  => 10,
        'label' => __('Header Layout Options', 'ripple-wp'),
        'section' => 'header_options',
        'settings' => 'header_layout_options',
        'type' => 'radio',
        'choices' => array(
            'logo_center' => __( 'Logo & Site Information in the center','ripple-wp'  ),
            'logo_left' => __( 'Logo & Site Information to the left', 'ripple-wp'  ),
          ),
    ) );

    $wp_customize->add_setting( 'transparent_header' , array(
        'default'     => false ,
        'transport'   => 'refresh',
        'sanitize_callback' => 'ripple_wp_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'transparent_header', array(
        'priority'  => 20,
        'label' => 'Make the header image transparent',
        'section' => 'header_options',
        'settings' => 'transparent_header',
        'type' => 'checkbox',
        'active_callback' => 'is_logo_left',
    ) );
    
    $wp_customize->add_setting( 'show_topbar' , array(
        'default'     => true,
        'transport'   => 'refresh',
        'sanitize_callback' => 'ripple_wp_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'show_topbar', array(
        'priority'  => 40,
        'label' => 'Show Top Bar',
        'section' => 'header_options',
        'settings' => 'show_topbar',
        'type' => 'checkbox',
    ) );

    $wp_customize->add_setting( 'add_search_icon' , array(
        'default'     => 'top_bar',
        'transport'   => 'refresh',
        'sanitize_callback' => 'ripple_wp_sanitize_choices',
    ) );

    $wp_customize->add_control( 'add_search_icon', array(
        'priority'  => 50,
        'label' => 'Add search option to the top bar',
        'description' => '(Icon will display after the menu has been assigned)',
        'section' => 'header_options',
        'settings' => 'add_search_icon',
        'type' => 'radio',
        'choices' => array(
            'top_bar' => __( 'Top Menu', 'ripple-wp' ),
            'primary_menu' => __( 'Main Menu', 'ripple-wp' ),
            'none' => __( 'None', 'ripple-wp' ),
          ),
    ) );

    $wp_customize->add_section('font_options' , array(
        'title'     => __('Typography', 'ripple-wp'),
        'priority'  => 20,
        'panel'         => 'rwp_theme_options'
    ));

    $wp_customize->add_setting( 'header_font_options' , array(
        'default'     => 'Open Sans',
        'transport'   => 'refresh',
        'sanitize_callback' => 'ripple_wp_sanitize_choices'
    ) );

    $font_choices = ripple_wp_font_choices();
    if (ripple_wp_theme_options_active()) {
        $font_choices_pro = rwp_to_font_choices();
        $font_choices = array_merge($font_choices, $font_choices_pro);
    }

    $wp_customize->add_control( 'header_font_options', array(
        'priority'  => 10,
        'label' => __('Heading Font', 'ripple-wp'),
        'section' => 'font_options',
        'settings' => 'header_font_options',
        'type' => 'select',
        'choices' => $font_choices
    ) );
}
add_action( 'customize_register', 'ripple_wp_theme_options' );

/**Ripple WP Theme Footer Options */
function ripple_wp_theme_footer_options($wp_customize){
    $wp_customize->add_section('footer_options' , array(
        'title'     => __('Footer Options', 'ripple-wp'),
        'priority'  => 30,
        'panel'         => 'rwp_theme_options'
    ));
    $bloginfo = get_bloginfo('name');    
    $wp_customize->add_setting( 'show_copyright' , array(
        'default'     => '&copy; 2020 ' . $bloginfo ,
        'transport'   => 'postMessage',
        'sanitize_callback' => 'ripple_wp_sanitize_text'
    ) );

    $wp_customize->add_control( 'show_copyright', array(
        'label' => __('Copyright Message', 'ripple-wp'),
        'section' => 'footer_options',
        'settings' => 'show_copyright',
        'type' => 'text',
    ) );
}
add_action( 'customize_register', 'ripple_wp_theme_footer_options' );

/** Ripple WP Blog Page Options */
function ripple_wp_theme_blog_options($wp_customize){
    $wp_customize->add_section('blog_options' , array(
        'title'     => __('Blog Page Options', 'ripple-wp'),
        'priority'  => 40,
        'panel'     => 'rwp_theme_options'
    ));

    $wp_customize->add_setting( 'blog_page_layout' , array(
        'default'     => 'list',
        'transport'   => 'refresh',
        'sanitize_callback' => 'ripple_wp_sanitize_choices',
    ) );

    $wp_customize->add_control( 'blog_page_layout', array(
        'label' => __('Blog Layout Options', 'ripple-wp'),
        'section' => 'blog_options',
        'settings' => 'blog_page_layout',
        'type' => 'radio',
        'choices' => array(
            'list' => __( 'List', 'ripple-wp' ),
            'grid' => __( 'Grid', 'ripple-wp' ),
          ),
    ) );


    $wp_customize->add_setting( 'blog_content_categories' , array(
        'default'     => true,
        'transport'   => 'refresh',
        'sanitize_callback' => 'ripple_wp_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'blog_content_categories', array(
        'priority'    => 30,
        'label' => __('Show categories on blog page', 'ripple-wp'),
        'section' => 'blog_options',
        'settings' => 'blog_content_categories',
        'type' => 'checkbox',
    ) );

    $wp_customize->add_setting( 'blog_content_tags' , array(
        'default'     => true,
        'transport'   => 'refresh',
        'sanitize_callback' => 'ripple_wp_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'blog_content_tags', array(
        'priority'    => 30,
        'label' => __('Show tags on blog page', 'ripple-wp'),
        'section' => 'blog_options',
        'settings' => 'blog_content_tags',
        'type' => 'checkbox',
    ) );

    $wp_customize->add_setting( 'blog_content_author' , array(
        'default'     => true,
        'transport'   => 'refresh',
        'sanitize_callback' => 'ripple_wp_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'blog_content_author', array(
        'priority'    => 30,
        'label' => __('Show author on blog page', 'ripple-wp'),
        'section' => 'blog_options',
        'settings' => 'blog_content_author',
        'type' => 'checkbox',
    ) );

}

add_action( 'customize_register', 'ripple_wp_theme_blog_options' );

function ripple_wp_colors($wp_customize){
    // Text color
    $wp_customize->add_setting( 'text_color', array(
        'default'   => '#292b26',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
      ) );
  
      $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_color', array(
        'section' => 'colors',
        'label'   => esc_html__( 'Text color', 'ripple-wp' ),
      ) ) );

    // Accent color
    $wp_customize->add_setting( 'accent_color', array(
      'default'   => '#b50143',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    ) );
  
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array(
    'section' => 'colors',
    'label'   => esc_html__( 'Accent color', 'ripple-wp' ),
    ) ) );

    // Topbar & Footer Background color
    $wp_customize->add_setting( 'top_bar_footer_color', array(
    //'default'   => '#41859c',
    'default'   =>  '#5fd3e2',
    'transport' => 'postMessage',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_footer_color', array(
    'section' => 'colors',
    'label'   => esc_html__( 'Topbar & Footer Background', 'ripple-wp' ),
    ) ) );

    $wp_customize->add_setting( 'header_color', array(
        'default'   => '#ffffff',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_color', array(
        'section' => 'colors',
        'label'   => esc_html__( 'Header Background', 'ripple-wp' ),
    ) ) );

    // Menu & Section Background color
    $wp_customize->add_setting( 'menu_bck_color', array(
        'default'   => '#ffffff',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_bck_color', array(
    'section' => 'colors',
    'label'   => esc_html__( 'Menu Background', 'ripple-wp' ),
    'active_callback' => 'is_logo_center',
    ) ) );

    // Menu & Section Background color
    $wp_customize->add_setting( 'menu_text_color', array(
        'default'   => '#292b26',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_text_color', array(
    'section' => 'colors',
    'label'   => esc_html__( 'Menu Text Color', 'ripple-wp' ),
    //'active_callback' => 'is_logo_center',
    ) ) );
}
add_action( 'customize_register', 'ripple_wp_colors' );


//check if logo left option is selected in the header layout options
function is_logo_left($control){
    if ( $control->manager->get_setting( 'header_layout_options' )->value() == 'logo_left' ) {
        return true;
    }else{
        return false;
    }
}

//check if logo left option is selected in the header layout options
function is_logo_center($control){
    if ( $control->manager->get_setting( 'header_layout_options' )->value() == 'logo_center' ) {
        return true;
    }else{
        return false;
    }
}

// Sanitize text
function ripple_wp_sanitize_text( $text ) {
    return sanitize_text_field( $text );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ripple_wp_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ripple_wp_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function ripple_wp_customize_partial_logo(){
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'logo',
            array(
                'label'      => __( 'Upload a logo', 'ripple-wp' ),
                'section'    => 'title_tagline',
                'settings'   => 'logo',
                //'context'    => 'your_setting_context'
            )
        )
    );
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ripple_wp_customize_preview_js() {
	wp_enqueue_script( 'ripple-wp-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'ripple_wp_customize_preview_js' );

function ripple_wp_theme_options_customizer(){
    $plugins_url = plugins_url();
    wp_enqueue_script( 'ripple-wp-customizer', $plugins_url . '/ripple-wp-theme-options/js/customizer_pro.js', array( 'customize-preview' ), _S_VERSION, true );
}

$active_plugins = ripple_wp_get_active_plugin_list();
if( in_array( 'ripple-wp-theme-options.php', $active_plugins )){
    add_action( 'customize_preview_init', 'ripple_wp_theme_options_customizer' );
}

function ripple_wp_theme_get_customizer_css() {
    $text_color = get_theme_mod( 'text_color', '' );
    $accent_color = get_theme_mod( 'accent_color', '' );
    $top_bar_footer_color = get_theme_mod('top_bar_footer_color');
    $header_bck_color = get_theme_mod('header_color');
    $menu_bck_color = get_theme_mod('menu_bck_color', '');
    $menu_text_color = get_theme_mod('menu_text_color');
    $font_option = get_theme_mod('header_font_options');

    if(get_theme_mod('header_font_options' == '')){
        $font_option = 'Open Sans';
    }
    
    ?>
    <style type="text/css">
    body, input, select, optgroup, textarea {
        color: <?php echo $text_color; ?>
    }

    button, input[type="button"], input[type="reset"], input[type="submit"], .button, a.button{
        background: <?php echo $accent_color; ?>
    }

    .topbar, footer.site-footer{
        background: <?php echo $top_bar_footer_color; ?>
    }

    header.site-header, .site-header .left_header .main-navigation ul ul, .site-header .left_header .main-navigation.toggled{
        background: <?php echo $header_bck_color; ?>
    }

    .main-navigation, .main-navigation ul li:hover > ul, .main-navigation ul li.focus > ul, .main-navigation ul ul{
        background: <?php echo $menu_bck_color; ?>
    }
    .main-navigation ul li a, .main-navigation ul li.menu-item-object-page.current_page_item ul li a, .main-navigation ul li.menu-item-has-children:after, .main-navigation ul li.current-menu-item a, .main-navigation ul li.current_page_ancestor a, .main-navigation ul li.menu-item-has-children:hover:after, .menu-toggle li.focus > a, .main-navigation.toggled ul li.focus > a, .main-navigation ul li.menu-item-has-children.focus:after{
        color: <?php echo $menu_text_color; ?>
    }

    h1, h2, h3, h4, h5, h6 {
        font-family: <?php echo $font_option; ?>
    }

    .has-accent-color-color, .has-accent-color-color.has-text-color, a:hover, a:focus, a:active, a:visited, a, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, span a, p a{
        color: <?php echo $accent_color; ?>
    }
    <?php
    if(!ripple_wp_theme_options_active()){
        ?>
        .site-header .left_header .topbar ul#top-menu li a{
           color: <?php echo $accent_color; ?>
        }

        .site-info a{
            color: <?php echo $accent_color; ?>
        }
        <?php
    }
?>    

    /*footer li a, footer .widget-column ul li a{
        color: <?php echo $accent_color; ?>
    }*/

    

    .has-text-color-background-color{
        background-color: <?php echo $text_color; ?>
    }

    .has-text-color-color, .has-text-color-color.has-text-color{
        color: <?php echo $text_color; ?>
    }

    .has-accent-color-background-color{
        background-color: <?php echo $accent_color; ?>
    }

    .has-accent-color-color{
        color: <?php echo $accent_color; ?>
    }

    .has-theme-color-one-background-color{
        background-color: <?php echo $top_bar_footer_color; ?>
    }

    .has-theme-color-one-color, .has-theme-color-one-color.has-text-color{
        color: <?php echo $top_bar_footer_color; ?>
    }

    .has-theme-color-two-background-color{
        background-color: <?php echo $header_bck_color; ?>
    }

    .has-theme-color-two-color, .has-theme-color-two-color.has-text-color{
        color: <?php echo $header_bck_color; ?>
    }

    
    </style>
    <?php
  }
  add_action( 'wp_head', 'ripple_wp_theme_get_customizer_css' );

  /**
 * Sanitize font options
  */
function ripple_wp_sanitize_font( $input ) {
	$allowed = array(
		'neutral',
		'contemporary',
		'approachable',
		'traditional',
		'modern',
		'custom',
	);
	if ( in_array( $input, $allowed, true ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Sanitize select/radio options
 *
 * @param $input
 * @return number
 */
function ripple_wp_sanitize_choices( $input, $setting ) {
    global $wp_customize;

    $control = $wp_customize->get_control( $setting->id );

    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

//checkbox sanitization function
function ripple_wp_sanitize_checkbox( $input ){
              
    //returns true if checkbox is checked
    return ( ( isset( $input ) && true == $input ) ? true : false );
}

function ripple_wp_font_choices(){
    $font_choices = array(
        'Open Sans' => 'Open Sans',
        'Roboto' => 'Roboto',
        'Slabo'   => 'Slabo',
        'Oswald'     =>  'Oswald',
        'Cairo'    =>  'Cairo',
        'BioRhyme'    =>  'BioRhyme',
        'Rakkas'    =>  'Rakkas'
    );
    return $font_choices;
}