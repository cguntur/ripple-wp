<?php
/**
 * Twenty Twenty Starter Content
 *
 * @link https://make.wordpress.org/core/2016/11/30/starter-content-for-themes-in-4-7/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

/**
 * Function to return the array of starter content for the theme.
 *
 * Passes it through the `twentytwenty_starter_content` filter before returning.
 *
 * @since Twenty Twenty 1.0
 *
 * @return array A filtered array of args for the starter_content.
 */

 function ripple_wp_get_starter_content(){
     $starter_content = array(
        'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
      // Custom added page Services
			'services' => array(
				'post_type' => 'page',
				'post_title' => 'Services',
				'post_content' => 'About services'
			),
		),
     );
 }
?>