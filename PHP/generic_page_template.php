<?php
// Template Name: New Name Here
/**
 * The template to display this page.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

    <div class="full-width-bg-image" style="background-image: url(<?php the_post_thumbnail_url( "full" ); ?>)"></div>

    <div class="main-content-container">

    <!-- Content -->

    </div>

<?php get_footer(); ?>
