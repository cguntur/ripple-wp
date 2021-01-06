<?php
/**
 * Template Name: Page With Right Sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ripple-wp
 */

get_header();
?>
<?php
$hide_page_title = get_post_meta( get_the_ID(), 'ripple_wp_hide_page_title', true );
if(!$hide_page_title){
?>
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->
<?php
}
?>
<div class="sidebar_wrapper">
    <main id="primary" class="site-main">

    <?php
    while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content', 'page-sidebar' );

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile; // End of the loop.
    ?>

    </main><!-- #main -->

    <?php
    get_sidebar();
    ?>

</div>
<?php
get_footer();
?>