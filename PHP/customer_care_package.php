<?php
// Template Name: Customer Care Package
/**
 * The template to display pricing for various customer care packages.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

<div class="full-width-bg-image" style="background-image: url(<?php the_post_thumbnail_url( "full" ); ?>)"></div>

    <div class="main-content-container">

    <!-- Call and define pricing tables -->
    <?php 

        $one_story_table = get_field( 'one_story_pricing' );
        $two_story_table = get_field( 'two_story_pricing' );
        $estates_table = get_field( 'estates_pricing' );

        echo '<div>';
        echo '</div>';

    ?>

    </div>

<?php get_footer(); ?>