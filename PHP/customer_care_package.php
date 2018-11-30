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

        <div class="vs-overview-text" style="padding-top: 80px;">
            <h2>Granville Homes Care Packages</h2>
            <p style="padding-bottom: 20px;">Taking care of your home is an important part of maintaining your warranty, retaining your home's value, and increasing the longevity of crucial systems. With Granville's care packages, our Customer Care team takes the hassle out of home maintenance. Purchase single services on our a la carte menu, or bundle your services in a care package for even more savings.</p>
            <h3>Complete packages starting at $1,085*</h3>
        </div>

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