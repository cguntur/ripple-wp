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

/*if ( is_admin() ) {
    $my_current_screen = get_current_screen();
    if ( isset( $my_current_screen->base ) && 'rp_options' === $my_current_screen->base ) {
        add_action( 'admin_enqueue_scripts', 'ripple_wp_admin_styles' );
    }
}*/

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

function ripple_wp_child_themes() {
	do_action('ripple_wp_child_themes');
}

function rp_theme_options_settings(){
    
?>
    <div class="wrap ripple_wp">
        <h1><?php echo __('Welcome to RippleWP', 'ripple-wp'); ?></h1>
        <h2><?php echo __('RippleWP offers customized layouts that work with the block editor to help you build a professional website quickly and easily.', 'ripple-wp'); ?></h2>
        <div class="theme_setup_instructions">
            <p><?php echo __('Follow the steps below to get started.', 'ripple-wp'); ?></p>
            <table>
                <tr>
                    <th>STEP #1:</th>
                    <td><?php echo __('Install and activate recommended plugins', 'ripple-wp'); ?></td>
                </tr>
                <tr>
                    <th>STEP #2:</th>
                    <td><?php echo __('Enter your license keys', 'ripple-wp'); ?></td>
                </tr>
                <tr>
                    <th>STEP #3:</th>
                    <td><?php echo __('Import a demo layout (see Appearance menu) or get started customizing your site', 'ripple-wp'); ?></td>
                </tr>
            </table>
        </div>
        <div class="layouts_grid_wrap">
            <h2><?php echo __('Layout Options', 'ripple-wp'); ?></h2><br />
            <div class="layout">
                <h3>Block Layouts</h3>
                <p>Layout Description</p>
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
                    <a id="layout_one" class="install_layout button" href="<?php echo $demo_content_install_url; ?>">Import Demo Data</a>
                    <?php    
                    }
                ?>
                    <!--<a id="layout_one" class="install_layout button" href="<?php echo $demo_content_install_url; ?>">Need to install plugins</a>-->
                    <?php
                }else{
                ?>
                <a class="get_layout_link button" href="">Get Block Layouts for RippleWP</a>
                <?php                    
                }
                ?>
            </div>
        </div>
    </div>
<?php
//ripple_wp_child_themes();
}
function ripple_wp_layout_install(){
    if(isset($_POST['layout_option'])){
        $layout_option = $_POST['layout_option'];
    }

    $response = '';
    //$response = "Layout Option:" . $layout_option;
    $response .= ripple_wp_theme_license();
    $response .= ripple_wp_recommended_plugins($layout_option);
    //$response .= ripple_wp_parse_xml();

    die($response);
    
}
// creating Ajax call for WordPress
add_action('wp_ajax_ripple_wp_layout_install','ripple_wp_layout_install' );

function ripple_wp_theme_license(){
    if(!isset($response)){
        $response = '';
    }
    $response = "EDD License Key<br />";
    return $response;
}

function ripple_wp_recommended_plugins($layout){
    if(!isset($response)){
        $response = '';
    }

    if($layout == "layout_one"){
        $response = "Recommended Plugins<br />";
    }else{
        $response = "No recommended plugins";
    }
    return $response;
}

function ripple_wp_parse_xml(){
    $filename = '/starter_content/events_calendar_content.xml';   
    $xml=simplexml_load_file($filename);
    print_r($xml);
    // load xml file
    //$xml      = simplexml_load_string( $filename );
    // seesaw ;-)
    //$json     = json_encode( $xml );
    //$options  = json_decode( $json, TRUE );
    // see result
    //var_dump( $options );
    //return $options;

    // update in WordPress
    //update_option( 'my_settings_id', $options );
}

?>