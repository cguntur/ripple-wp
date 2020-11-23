<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ripple-wp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php   if(get_theme_mod('blog_page_layout') == 'grid'){
            ripple_wp_post_thumbnail();
        }
        ?>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
                ripple_wp_posted_on();
                if(get_theme_mod('blog_content_author')){
                    ripple_wp_posted_by();
                }
				
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
        
    <?php 
    if(get_theme_mod('blog_page_layout') == 'list'){
        ripple_wp_post_thumbnail();
    }
    
    //ripple_wp_post_thumbnail(); ?>

	<div class="entry-content">
        <?php
        if(get_theme_mod('blog_page_layout') == 'grid'){
            ripple_wp_get_excerpt( 100 );
        }else{
            the_excerpt();
        }
        
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php ripple_wp_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
