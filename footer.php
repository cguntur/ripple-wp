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
                <span class="theme_author_prop">
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( '%1$s', 'ripple-wp' ), '<a href="https://www.chamberdashboard.com">RippleWP</a> Theme' );
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