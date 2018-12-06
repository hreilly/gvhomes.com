<?php
// Template Name: Home for the Holidays
/**
 * The template for displaying the Home for the Holidays promotion.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

<!-- CSS is in _theme.scss -->

<!-- This page should be used to override the normal promotions link for HftH -->

<div class="main-content-container">
    <div class="hfth-overview-text">
        <div class="hfth-breakout-container">
            <img src="<?php the_field('hfth_logo') ; ?>">
        </div>
        <h2><?php the_field('hfth_header') ; ?></h2>
        <p><?php the_field('hfth_subheader') ; ?></p>
        <ul style="text-align: left; max-width: 800px; margin: auto;">
            <?php the_field('hfth_list') ; ?>
        </ul>
        <hr>
    </div>
    <p style="font-style: italic; max-width: 900px; margin: auto; text-align: center;"><?php the_field('hfth_disclaimer') ; ?></p>
    
    <!-- || HFTH RAND PROPERTIES SECTION || -->

    <?php 

        $args = array(
            'posts_per_page'     => 6,
            'post_type'		     => 'property',
            'meta_query'         => array(
                'relation'       => 'AND',
                array(
                    'key'        => 'current_promotions',
                    'value'      => '"hfth"',
                    'compare'    => 'LIKE'
                ),
                'price' => array(
                    'key'        => 'clean_price',
                    'compare'    => 'EXISTS'
                )
            ),
            'orderby'            => 'rand',
            'order'              => 'ASC'
        );

        $the_query = new WP_Query( $args );

        ?>

        <?php if( $the_query->have_posts() ): ?>

        <div class="hfth-header">
            <h1 style="padding-bottom: 30px; padding-top: 50px;"><?php the_field('hfth_mir_header') ; ?></h1>
        </div>
        <div class="hfth-type-section" style="padding-bottom: 40px;">

        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <?php 

        // define 'property_parent_community' post object variable for calling title from parent community (used for search filter)

        $parent_post_object = get_field('property_parent_community');

        // define 'floorplan' post object variable for calling title from floorplan associated with listing

        $floorplan_post_object = get_field('floorplan');

        ?>

            <div class="individual-hfth-property-tile" style="background-image: url(<?php the_post_thumbnail_url( "medium-large" ); ?>)">
                <a href="<?php the_permalink(); ?>">
                    <div class="individual-hfth-property-text">
                        <h3><?php the_field('price'); ?> <span style="text-transform: none; font-weight: 400;">| <?php echo get_the_title($parent_post_object->ID); ?></span><br><br><?php echo get_the_title($floorplan_post_object->ID); ?></h3>
                    </div>
                </a>
            </div>

        <?php endwhile; ?>

        </div>
        <div class="large-button-wrapper">
            <a href="/property/?_sfm_current_promotions=hfth" class="subtle-button hfth-button">All Eligible Homes &#8594;&#xFE0E;</a>
        </div>
        
        <?php else : ?>

        <div class="hfth-header">
            <h1 style="padding-bottom: 30px; padding-top: 50px; color: #555555;">No homes are currently eligible. Please check back next year!</h1>
        </div>

    <?php endif; ?>

    <?php wp_reset_query();	?>

</div>

<?php get_footer(); ?>