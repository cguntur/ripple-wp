<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ripple-wp
 */

get_header();
?>
    <?php 
    if ( have_posts() ) :

        if ( is_home() && ! is_front_page() ) :
            ?>
            <header>
                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
            </header>
            <?php
        endif;
        ?>
	<main id="primary" class="site-main <?php if(get_theme_mod('blog_page_layout') == 'grid') echo "grid"; ?>">
        <?php
        $columns = "";
        if(ripple_wp_theme_options_active()){
            $grid_columns = get_theme_mod('grid_columns');
            if($grid_columns == 'two_columns'){
                $columns = "two";
            }else if($grid_columns == 'three_columns'){
                $columns = "three";
            }else if($grid_columns == 'four_columns'){
                $columns = "four";
            }else{
                $columns = "";
            }
        }
        ?>
        <?php if(get_theme_mod('blog_page_layout') == "grid"){
            ?>
            <div class="grid_layout <?php echo $columns; ?>">
            <?php
        }
        ?>
		<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
                
                get_template_part( 'template-parts/content', 'archive' );
                
                //the_excerpt();

            endwhile;
            ?>
            <?php if(get_theme_mod('blog_page_layout') == "grid"){
                ?>
                </div><!--end of grid layout-->
                <?php
            }
            ?>
            <?php
            the_posts_navigation();
            

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();