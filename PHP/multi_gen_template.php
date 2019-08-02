<?php
// Template Name: Multi-Gen Homes
/**
 * The template to display multi-generational floor plans.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

    <div class="full-width-bg-image" style="background-image: url(<?php the_post_thumbnail_url( "full" ); ?>)"></div>

    <div class="main-content-container">

        <!-- Overview section -->
        <div></div>
        <!-- Floor plan query -->
        <div>

        <?php 

        $args = array(
            'posts_per_page'     => -1,
            'post_type'		     => 'floorplans',
            'orderby'            => 'title',
            'order'              => 'ASC',
            'meta_query'         => array(
                'relation'          => 'AND',
                'multi_gen'  => array(
                    'key'           => 'multi_gen',
                    'value'         => 1,
                    'compare'       => '='
                ),
                'sq_ft'      => array(
                    'key'           => 'clean_sqft',
                    'compare'       => 'EXISTS'
                )
            )
        );

        $the_query = new WP_Query( $args );

        ?>

        <?php if( $the_query->have_posts() ): ?>

            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <!-- Display posts -->

            <?php endwhile; ?>

        <?php endif; ?>

        </div>

    </div>

<?php get_footer(); ?>
