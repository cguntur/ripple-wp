<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ripple-wp
 */

?>
    <div id="footer_top">
    <?php if ( is_active_sidebar( 'footer-top' ) ) { ?>
		<div id="pre-footer">
			<?php dynamic_sidebar( 'footer-top' ); ?>
		</div><!-- #pre-footeer -->
	<?php } ?>
    </div>
	<footer id="colophon" class="site-footer">
    <div class="footer-widgets">
			<?php if ( is_active_sidebar( 'footer-widget-1' ) ) { ?>
                <div class="widget-column">
					<?php dynamic_sidebar( 'footer-widget-1' ); ?>
                </div>
			<?php }	?>
			<?php if ( is_active_sidebar( 'footer-widget-2' ) ) { ?>
                <div class="widget-column">
					<?php dynamic_sidebar( 'footer-widget-2' ); ?>
                </div>
			<?php }	?>
			<?php if ( is_active_sidebar( 'footer-widget-3' ) ) { ?>
                <div class="widget-column">
					<?php dynamic_sidebar( 'footer-widget-3' ); ?>
                </div>
			<?php }	?>
            <?php if ( is_active_sidebar( 'footer-widget-4' ) ) { ?>
                <div class="widget-column">
					<?php dynamic_sidebar( 'footer-widget-4' ); ?>
                </div>
			<?php }	?>
		</div>
		<div class="site-info">
            <?php 
                $copyright_message = get_theme_mod('show_copyright', '&copy; 2020 ' . get_bloginfo('name')); ?>
                <span class="copyright"><?php echo $copyright_message; ?></span>
                <?php if(!get_theme_mod('hide_theme_prop')){
                ?>
                <span class="wp_prop"><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'ripple-wp' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( '%s', 'ripple-wp' ), 'WordPress' );
				?>
			</a></span>
            <!--<span class="sep"> | </span>-->
            <span class="theme_author_prop">
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s', 'ripple-wp' ), 'RippleWP', '<a href="https://www.chamberdashboard.com">Ripple Creative Solutions</a>' );
                ?>
                </span>
                <?php
                }
                ?>
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>