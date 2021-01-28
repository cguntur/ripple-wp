<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ripple-wp
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'ripple-wp' ); ?></a>
    <?php
        if(ripple_wp_is_left_logo()){
            get_template_part('template-parts/header-logo-left');
        }else{

        
        ?>
	<header id="masthead" class="site-header">
        
        <?php  wp_ripple_topbar();?>
        
        <div class="site-branding wrapper <?php if(get_theme_mod('header_layout_options') == 'logo_left') echo "left"; ?>">
        
			<?php
			the_custom_logo();
			if ( is_front_page() || is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			endif;
			$ripple_wp_description = get_bloginfo( 'description', 'display' );
			if ( $ripple_wp_description || is_customize_preview() ) :
				?>
				<h2 class="site-description"><?php echo $ripple_wp_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h2>
            <?php endif; ?>
            
        </div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
               <span class="screen-reader-text"><?php esc_html_e( 'Primary Menu', 'ripple-wp' ); ?></span>
                <svg class="hamburger" width="24" height="19" viewBox="0 0 24 19" fill="none" xmlns="http://www.w3.org/2000/svg" xml:space="preserve"><path d="M0 1.5h24M0 9.5h24M0 17.5h24" stroke="currentColor" stroke-width="2"/></svg>
                <!--<svg class="close" width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" xml:space="preserve"></style><path class="st0" d="M1.5 18.3l17-17M1.7 1l17 17" stroke="currentColor" stroke-width="2" /></svg>-->
            </button>
			<?php
            $active_plugins = ripple_wp_get_active_plugin_list();
            if( in_array( 'ripple-wp-theme-options.php', $active_plugins )){
                if(has_nav_menu('mobile-menu')){
                    $class="mobile_menu";
                }else{
                    $class= "";
                }
            }
            
			wp_nav_menu(
				array(
					'theme_location' => 'primary-menu',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => $class 
				)
            );

            if(has_nav_menu('mobile-menu')){
                wp_nav_menu(
                    array(
                        'theme_location' => 'mobile-menu',
                        'menu_id'        => 'mobile-menu',
                        'menu_class'          => $class
                    )
                );
            }
            
			?>
		</nav><!-- #site-navigation -->
        <?php if ( get_header_image() ) : ?>    
        <?php the_custom_header_markup(); ?>
        <?php endif; ?>
    </header><!-- #masthead -->
    <?php
        }
