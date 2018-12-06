<?php
// Template Name: Granville Estates
/**
 * The template for the Granville Estates splash page.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<!-- Styling is in _communities.scss -->

<div class="estates-wrapper">

<img class="full-width-header" src="<?php the_post_thumbnail_url( "full" ); ?>">

<div class="main-content-container">
    <div class="estates-overview">
        <img src="/wp-content/uploads/2018/10/granville_estates_logo.png">
        <h2><?php the_field('estates_header'); ?></h2>
        <p><?php the_field('estates_description'); ?></p>
        <hr>
    </div>

<!-- || ESTATES COMMUNITIES SECTION || -->

    <div class="estates-header" id="estates-communities">
        <div class="page-divider-gradient"></div>
    </div>
    <div class="estates-type-section">

        <?php 

        $args = array(
            'posts_per_page'     => -1,
            'post_type'		     => 'communities',
            'orderby'            => 'title',
            'order'              => 'ASC',
            'meta_query'         => array(
                array(
                    'key'        => 'community_type',
                    'value'      => '"estates"',
                    'compare'    => 'LIKE'
                )
            )
        );

        $the_query = new WP_Query( $args );

        ?>

        <?php if( $the_query->have_posts() ): ?>

        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>   

            <div class="individual-estates-community-tile" style="background-image: url(<?php the_post_thumbnail_url( "medium-large" ); ?>)">
                <a href="<?php the_permalink(); ?>">
                    <div class="individual-estates-community-text">
                        <h3><?php the_title(); ?></h3>
                    </div>
                </a>
            </div>

        <?php endwhile; ?>

    <?php endif; ?>

    <?php wp_reset_query();	?>

    </div>

    <div class="page-divider-gradient"></div>

    <div class="breakout-container">
    <img src="/wp-content/uploads/2018/10/paint_sweep_light_gray.png" />
    <div class="breakout-container-background">

<!-- || ESTATES FLOORPLANS SECTION || -->

    <div class="estates-header" id="estates-plans" style="padding: 20px;">
        <h1>Estates Floorplans</h1>
    </div>
    <div class="estates-type-section">

        <?php 

        $args = array(
            'posts_per_page'     => -1,
            'post_type'		     => 'floorplans',
            'orderby'            => 'title',
            'order'              => 'ASC',
            'meta_query'         => array(
                'relation'          => 'AND',
                array(
                    'key'           => 'floorplan_type',
                    'value'         => 'Estates',
                    'compare'       => '='
                ),
                'floorplan_sqft' => array(
                    'key'           => 'f_floorplan_size',
                    'compare'       => 'EXISTS'
                )
            )
        );

        $the_query = new WP_Query( $args );

        ?>

        <?php if( $the_query->have_posts() ): ?>

        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>   

            <div class="individual-estates-tile" style="background-image: url(<?php the_post_thumbnail_url( "medium-large" ); ?>)">
                <a href="<?php the_permalink(); ?>">
                    <div class="individual-estates-text">
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_field('f_floorplan_size'); ?> Sq. Ft.<br><?php the_field('f_number_of_bedrooms'); ?> BD | <?php the_field('f_number_of_bathrooms'); ?> BA</p>
                    </div>
                </a>
            </div>

        <?php endwhile; ?>

    <?php endif; ?>

    <?php wp_reset_query();	?>

    </div>

    </div>

    </div>

<!-- || ESTATES PROPERTIES SECTION || -->

    <?php 

        $args = array(
            'posts_per_page'     => -1,
            'post_type'		     => 'property',
            'orderby'            => 'property_price',
            'order'              => 'ASC',
            'meta_query'         => array(
                'relation'       => 'AND',
                array(
                    'key'        => 'floorplan_type',
                    'value'      => 'estates',
                    'compare'    => '='
                ),
                'property_price' => array(
                    'key'        => 'price',
                    'compare'    => 'EXISTS'
                )
            )
        );

        $the_query = new WP_Query( $args );

        ?>

        <?php if( $the_query->have_posts() ): ?>

        <div class="estates-header">
            <h1 style="padding-bottom: 30px; padding-top: 50px;">Move-in Ready Homes</h1>
        </div>
        <div class="estates-type-section" id="estates-mir" style="padding-bottom: 40px;">

        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <?php 

        // define 'community' post object variable for calling title from listing community

        $community_post_object = get_field('community');

        // define 'floorplan' post object variable for calling title from floorplan associated with listing

        $floorplan_post_object = get_field('floorplan');

        ?>

            <div class="individual-estates-community-tile" style="background-image: url(<?php the_post_thumbnail_url( "medium-large" ); ?>)">
                <a href="<?php the_permalink(); ?>">
                    <div class="individual-estates-community-text">
                        <h3><?php the_field('price'); ?> | <?php echo get_the_title($community_post_object->ID); ?><br><br><?php echo get_the_title($floorplan_post_object->ID); ?></h3>
                    </div>
                </a>
            </div>

        <?php endwhile; ?>

        </div> 

    <?php endif; ?>

    <?php wp_reset_query();	?>

    <div class="page-divider-gradient"></div>

    <div class="estates-overview">
        <h2><?php the_field('estates_bottom_header'); ?></h2>
        <p><?php the_field('estates_bottom_description'); ?></p>
        <a href="<?php the_field('estates_bottom_button_link'); ?>" class="subtle-button gv-estates-button"><?php the_field('estates_bottom_button_text'); ?></a>
    </div>

    </div>

<img class="full-width-header" style="padding-bottom: 30px;" src="/wp-content/uploads/2018/10/gv_estates_backyard_watercolor-1600w.jpg">

</div>

<?php get_footer(); ?>