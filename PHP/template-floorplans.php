<?php
// Template Name: Floorplans Overview
/**
 * The template for displaying the floorplans overview page.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

<img class="full-width-header" src="<?php the_post_thumbnail_url( "full" ); ?>">
    <div class="main-content-container">
        <div class="floorplans-container">
            <div class="all-plans-overview">
                <h1>Built with Love and Passion.</h1>
                <p>It doesn't matter if this is your first home or your fifth - with any of Granville's floorplan collections, you know that you're investing in a piece of timeless design, quality and architecture.</p>
                <hr>
            </div>

        <!-- || TRADITIONAL FLOORPLANS SECTION || -->
        
            <div class="floorplans-header">
                <h1>Traditional Floorplans</h1>
                <div class="page-divider-gradient"></div>
            </div>

            <div class="floorplan-type-section" id="traditional-floorplans">
                <div class="floorplan-overview-tile">
                    <div class="floorplan-overview-text">
                        <p><?php the_field('traditional_description'); ?></p>
                    </div>
                </div>

                <?php 

                // args
                $args = array(
                    'posts_per_page'     => -1,
                    'post_type'		     => 'floorplans',
                    'orderby' => array( 
                        'floorplan_sqft' => 'ASC',
                    ),
                    'meta_query'         => array(
                        'relation'          => 'AND',
                        array(
                            'key'           => 'floorplan_type',
                            'value'         => 'Traditional',
                            'compare'       => '='
                        ),
                        'floorplan_sqft' => array(
                            'key'           => 'f_floorplan_size',
                            'compare'       => 'EXISTS'
                        )
                    )
                );

                // query
                $the_query = new WP_Query( $args );

                ?>

                <?php if( $the_query->have_posts() ): ?>

                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>   

                    <div class="individual-floorplan-tile">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php the_field('floorplan_overview_page_image'); ?>">
                            <div class="individual-floorplan-text">
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_field('f_floorplan_size'); ?> Sq. Ft.<br><?php the_field('f_number_of_bedrooms'); ?> BD | <?php the_field('f_number_of_bathrooms'); ?> BA</p>
                            </div>
                        </a>
                    </div>

                <?php endwhile; ?>

            <?php endif; ?>

            <?php wp_reset_query();	?>

            </div>

        <!-- || CANVAS FLOORPLANS SECTION || -->
            
            <div class="floorplans-header">
                <h1>Canvas Floorplans</h1>
                <div class="page-divider-gradient"></div>
            </div>
            <div class="floorplan-type-section" id="canvas-floorplans">
                <div class="floorplan-overview-tile">
                    <div class="floorplan-overview-text">
                        <p><?php the_field('canvas_description'); ?></p>
                    </div>
                </div>

                <?php 

                // args
                $args = array(
                    'posts_per_page'     => -1,
                    'post_type'		     => 'floorplans',
                    'orderby'            => 'plan_name',
                    'order'              => 'ASC',
                    'meta_query'         => array(
                        'relation'          => 'AND',
                        array(
                            'key'           => 'floorplan_type',
                            'value'         => 'Canvas',
                            'compare'       => '='
                        ),
                        'floorplan_sqft' => array(
                            'key'           => 'f_floorplan_size',
                            'compare'       => 'EXISTS'
                        ),
                        'plan_name'      => array(
                            'key'           => 'plan_name',
                            'compare'       => 'EXISTS'
                        )
                    )
                );

                // query
                $the_query = new WP_Query( $args );

                ?>

                <?php if( $the_query->have_posts() ): ?>

                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>   

                    <div class="individual-floorplan-tile">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php the_field('floorplan_overview_page_image'); ?>">
                            <div class="individual-floorplan-text">
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_field('f_floorplan_size'); ?> Sq. Ft.<br><?php the_field('f_number_of_bedrooms'); ?> BD | <?php the_field('f_number_of_bathrooms'); ?> BA</p>
                            </div>
                        </a>
                    </div>

                <?php endwhile; ?>

            <?php endif; ?>

            <?php wp_reset_query();	?>

            </div>

        <!-- || ESTATES FLOORPLANS SECTION || -->

            <div class="floorplans-header" id="estates-plans">
                <h1>Estates Floorplans</h1>
                <div class="page-divider-gradient"></div>
            </div>
            <div class="floorplan-type-section" id="estates-floorplans">
                <div class="floorplan-overview-tile">
                    <div class="floorplan-overview-text">
                        <p><?php the_field('estates_description'); ?></p>
                    </div>
                </div>

                <?php 

                // args
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
                        ),
                        'plan_name'      => array(
                            'key'           => 'plan_name',
                            'compare'       => 'EXISTS'
                        )
                    )
                );

                // query
                $the_query = new WP_Query( $args );

                ?>

                <?php if( $the_query->have_posts() ): ?>

                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>   

                    <div class="individual-floorplan-tile">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php the_field('floorplan_overview_page_image'); ?>">
                            <div class="individual-floorplan-text">
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_field('f_floorplan_size'); ?> Sq. Ft.<br><?php the_field('f_number_of_bedrooms'); ?> BD | <?php the_field('f_number_of_bathrooms'); ?> BA</p>
                            </div>
                        </a>
                    </div>

                <?php endwhile; ?>

            <?php endif; ?>

            <?php wp_reset_query();	?>

            </div>

        <!-- || SHAVER FLOORPLANS SECTION || -->    

            <!--<div class="floorplans-header">
                <h1>Shaver Lake Floorplans</h1>
                <div class="page-divider-gradient"></div>
            </div>-->

            <div class="floorplan-type-section" id="sunrock-floorplans">
                <div class="floorplan-overview-tile">
                    <div class="floorplan-overview-text">
                        <p><?php the_field('shaver_description'); ?></p>
                    </div>
                </div>

                <?php 

                // args
                $args = array(
                    'posts_per_page'     => -1,
                    'post_type'		     => 'floorplans',
                    'orderby' => array( 
                        'floorplan_sqft' => 'ASC',
                    ),
                    'meta_query'         => array(
                        'relation'          => 'AND',
                        array(
                            'key'           => 'floorplan_type',
                            'value'         => 'Shaver',
                            'compare'       => '='
                        ),
                        'floorplan_sqft' => array(
                            'key'           => 'f_floorplan_size',
                            'compare'       => 'EXISTS'
                        )
                    )
                );

                // query
                $the_query = new WP_Query( $args );

                ?>

                <?php if( $the_query->have_posts() ): ?>
                
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>   

                    <div class="individual-floorplan-tile">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php the_field('floorplan_overview_page_image'); ?>">
                            <div class="individual-floorplan-text">
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

        <div class="footer-cta-background">
            <div class="footer-cta-content">
                <div class="footer-cta-text">Your dream home could be waiting right now.</div>
                <div class="footer-cta-button"><a href="/property/" class="subtle-button">Move-in Ready Homes</a></div>
            </div>
        </div>
        <div style="height: 20px; background-color: #ffffff;"></div>
    </div>

    <?php get_footer(); ?>
