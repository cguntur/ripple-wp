<?php

/*Enqueue Admin Styles*/
function ripple_wp_admin_styles(){
    wp_enqueue_script('jquery-ui');
    wp_enqueue_script( 'jquery-ui-dialog' );
    wp_enqueue_script(' jquery-ui-draggable');
    
    wp_register_style( 'ripple_wp_admin_css', get_template_directory_uri() . '/css/admin.css');
    wp_register_style('jquery-ui-css', get_template_directory_uri() . '/css/jquery-ui.css');
    //wp_register_script('ripple_wp_layout_install', get_template_directory_uri(). 'js/theme_scripts.js', array('jquery-ui'), null);
}
add_action( 'init', 'ripple_wp_admin_styles' );

function add_ripple_wp_admin_styles(){
    wp_enqueue_style('ripple_wp_admin_css');
    wp_enqueue_style('jquery-ui-css');
    //wp_enqueue_script('ripple_wp_layout_install');
}
add_action( 'admin_enqueue_scripts', 'add_ripple_wp_admin_styles' );

add_action('admin_menu', 'ripple_wp_options_page');

function ripple_wp_options_page(){
    $page_title = 'RippleWP';
    $menu_title = 'RippleWP';
    $capability = 'manage_options';
    $slug = '/rp_options';
    $callback = 'rp_theme_options_settings';
    $position = 80;
    add_theme_page( $page_title, $menu_title, $capability, $slug, $callback, $position );
}
function rp_theme_options_settings(){
    
?>
    <div class="wrap ripple_wp">
        <h1><?php echo __('Welcome to RippleWP', 'ripple-wp'); ?></h1>
        <div class="options_page_grid">
            <div class="column left">
                <?php ripple_wp_theme_options_tabs(); ?>
            </div><!--left_col-->
            <div class="column right">
                <div class="_form_8"></div><script src="https://chamberdashboard.activehosted.com/f/embed.php?id=8" type="text/javascript" charset="utf-8"></script>
            </div><!--right_col-->
        </div><!--options_page_grid-->
        
    </div><!--wrap ripple_wp-->
<?php
}
function ripple_wp_tabs_content($riple_wp_active_tab){
    global $riple_wp_active_tab;

    switch($riple_wp_active_tab){

        case 'rp_theme_welcome':
            ripple_wp_welcome();
            ripple_wp_theme_demo_content();
        break;

        case 'rp_theme_info':
        ripple_wp_theme_info();
        break;

        case 'rp_license':
		ripple_wp_license();
        break;

		case 'rp_changelog':
		ripple_wp_changelog();
		break;
    }
}

function ripple_wp_theme_demo_content(){
?> 
    <div class="layouts">
        <div class="layouts_grid_wrap">
            <h2><?php echo __('Layout Options', 'ripple-wp'); ?></h2><br />
            <div class="layout">
                <h3><?php echo __('Block Layouts', 'ripple-wp'); ?></h3>
                <?php 
                $image_url = get_template_directory_uri() . '/images/restaurant_guide.png';
                ?>
                <p><img src="<?php echo $image_url; ?>" width="300" height="200"/></p>
                <?php
                $current_active_theme = wp_get_theme();
                $theme_text_domain = $current_active_theme->get( 'TextDomain' );
                $demo_content_install_url = self_admin_url() . 'themes.php?page=pt-one-click-demo-import';
                if(function_exists('ripple_wp_bl_wp_version')){
                    if(class_exists('OCDI_Plugin')){
                    ?>
                    <a id="layout_one" class="install_layout button" href="<?php echo $demo_content_install_url; ?>"><?php _e('Import Demo Data', 'ripple-wp'); ?></a>
                    <?php    
                    }
                }else{
                ?>
                <a class="install_layout button" href=" https://chamberdashboard.com/downloads/ripplewp-theme-package1/" target="_blank"><?php _e('Get Block Layouts for RippleWP', 'ripple-wp'); ?></a>
                <?php                    
                }
                ?>
            </div><!--end of layout-->
        </div><!--end of layouts_grid_wrap-->
    </div>
<?php   
}

function ripple_wp_theme_options_tabs(){
?>
    <div class="settings_tabs">
        <?php 
        global $riple_wp_active_tab;
        $riple_wp_active_tab = isset( $_GET['tab'] ) ? sanitize_text_field($_GET['tab']) : 'rp_theme_welcome'; ?>
        <h2 class="nav-tab-wrapper">
            <a class="nav-tab <?php echo $riple_wp_active_tab == 'rp_theme_welcome' ? 'nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'admin.php?page=rp_options&tab=rp_theme_welcome' ); ?>"><?php _e( 'RippleWP', 'ripple-wp' ); ?> </a>
            <a class="nav-tab <?php echo $riple_wp_active_tab == 'rp_theme_info' ? 'nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'admin.php?page=rp_options&tab=rp_theme_info' ); ?>"><?php _e( 'Get Help', 'ripple-wp' ); ?> </a>        
            <a class="nav-tab <?php echo $riple_wp_active_tab == 'rp_license' ? 'nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'admin.php?page=rp_options&tab=rp_license' ); ?>"><?php _e( 'License', 'ripple-wp' ); ?> </a>
            <a class="nav-tab <?php echo $riple_wp_active_tab == 'rp_changelog' ? 'nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'admin.php?page=rp_options&tab=rp_changelog' ); ?>"><?php _e( 'Changelog', 'ripple-wp' ); ?> </a>        
        </h2>
        <div class="wrap">
            <?php ripple_wp_tabs_content($riple_wp_active_tab); ?>
        </div>
    </div>
<?php    
}

function ripple_wp_welcome(){
    $license_page_url = self_admin_url() .'admin.php?page=rp_options&tab=rp_license';
?>
    <h2><?php echo __('RippleWP offers customized layouts that work with the block editor to help you build a professional website quickly and easily.', 'ripple-wp'); ?></h2>

    <div class="theme_setup_instructions">
        <h3><?php echo __('Follow the steps below to get started.', 'ripple-wp'); ?></h3>
        <table class="ripple_wp_layout_steps">
            <tr>
                <th>STEP #1:</th>
                <td><?php echo __('Install & activate <a href="https://chamberdashboard.com/downloads/ripplewp-theme-package1/" target="_blank">Block Layout plugin</a>', 'ripple-wp'); ?></td>
            </tr>
            <tr>
                <th>STEP #2:</th>
                <td><?php echo __('Install and activate required plugins', 'ripple-wp'); ?></td>
            </tr>
            <tr>
                <th>STEP #3:</th>
                <td><?php echo __('Enter your <a href="'.$license_page_url.'">license keys</a>', 'ripple-wp'); ?></td>
            </tr>
            <tr>
                <th>STEP #4:</th>
                <td><?php echo __('Import a demo layout (see Appearance menu) or get started customizing your site', 'ripple-wp'); ?></td>
            </tr>
        </table>
    </div><!--theme_setup_instructions-->
<?php
}

function ripple_wp_theme_info(){
    $customizer_url = esc_url('customize.php');
    ?>
    <div class="ripple_wp_tab_content">
        <h3><?php echo __('Theme Customizer', 'ripple-wp'); ?></h3>
        <p><?php echo __('All the theme options are available via the Theme Customizer.', 'ripple-wp'); ?></p>
        <a class=" button primary" href="<?php echo $customizer_url; ?>">Customize My Theme</a>
        <br />
        <h3><?php echo __('Documentation', 'ripple-wp'); ?></h3>
        <p><?php echo __('Please refer to the theme documentation for step-by-step instructions.', 'ripple-wp'); ?></p>
        <a class=" button primary" href="https://chamberdashboard.com/docs/wordpress-themes/" target="_blank">Theme Documentation</a>
        <br />
        <h3><?php echo __('Get Support', 'ripple-wp'); ?></h3>
        <p><?php echo __('Visit our documentation library or submit your question to our support team.', 'ripple-wp'); ?></p>
        <a class=" button primary" href="customer support: https://chamberdashboard.com/chamber-dashboard-support/" target="_blank">Customer Support</a>
    </div>
    <?php
}

function ripple_wp_license(){
    ?>
    <div class="ripple_wp_tab_content">
        <?php 
            if(is_plugin_active( 'ripple-wp-block-layouts/ripple-wp-block-layouts.php' )){
                ripple_bl_render_license_key_form(); 
            }else{
                echo __('There are no RippleWP addons installed and activated on your site. Visit the site(link on our site) to learn more about our plugins', 'ripple-wp');
            }
        ?>
    </div>
    <?php
}

function ripple_wp_changelog(){
    ?>
    <div class="changelog_wrapper">
        <div class="ripple_wp_changelog">
            <h3><?php echo __('Changelog', 'ripple-wp'); ?></h3>
            <h4><?php echo __('1.0 - Dec 2020', 'ripple-wp'); ?> </h4>
            <p><?php echo __('Initial release', 'ripple-wp'); ?></p>
        </div>
        <div class="ripple_wp_tech_details">
                <?php
                    global $wp_version;
                    $php_version = phpversion();
                ?>
                <h4><?php echo __('Current WP Version: ', 'ripple-wp'); ?></b> <?php echo $wp_version; ?></h4>
                <h4><?php echo __('Current PHP Version:', 'ripple-wp'); ?></b> <?php echo $php_version;  ?></h4>
            <?php
                $theme = wp_get_theme();
                ?>
                <h4><?php echo __('Active Theme: ', 'ripple-wp') . $theme . " " . $theme->get( 'Version' ); ?></h4>
                <?php
            ?>
        </div>
    </div>
    <?php
}
?>