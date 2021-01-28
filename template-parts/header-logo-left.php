<?php
if ( !get_header_image() ){
    $class = "no_header_image";
}
?>
<header id="masthead" class="site-header sec_bck  <?php if(get_theme_mod('transparent_header') ) echo transparent_header; ?> <?php echo $class; ?>">
    <div class="left_header">
        <?php wp_ripple_topbar(); ?>
        <div id="logo_menu_wrapper" class="logo_menu_wrapper">
            <div class="wrapper">
                <div class="site-branding">
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
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary-menu',
                            'menu_id'        => 'primary-menu',
                        )
                    );
                    ?>
                </nav><!-- #site-navigation -->   
            </div>
        </div>
        
    </div>
    
</header><!-- #masthead -->
<?php if ( get_header_image() ) : ?>    
    <?php the_custom_header_markup(); ?>
    <?php endif; ?>
