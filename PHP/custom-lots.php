<?php
// Template Name: Custom Lots
/**
 * The template for displaying available custom lots.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

<!-- CSS is in _communities.scss -->

<div class="full-width-bg-image" style="background-image: url(<?php the_post_thumbnail_url( "full" ); ?>)"></div>

<div class="main-content-container">
    <div class="vs-overview-text" style="padding-top: 80px;">
        <h2>Custom Lots: Imagine the Possibilities.</h2>
        <p style="padding-bottom: 20px;">Fairway views, hillside retreats, quiet mountain getaways - with our custom lots, you have even more choices about where and how you'd like to build your home. Go for completely custom construction, or streamline your dream with Granville's painless Semi-Custom construction process.</p>
        <a href="/custom-vs-semi-custom/" class="subtle-button">Custom vs. Semi-Custom</a>
    </div>

    <div class="custom-lots-container">

    <!-- || COMMUNITIES SECTION || -->

            <?php 

            $args = array(
                'posts_per_page'     => -1,
                'post_type'		     => 'communities',
                'orderby'            => 'title',
                'order'              => 'DESC',
                'meta_query'         => array(
                    array(
                        'key'           => 'custom_lots_boolean',
                        'value'         => '1',
                        'compare'       => '='
                    )
                )
            );

            $the_query = new WP_Query( $args );

            ?>

            <?php if( $the_query->have_posts() ): ?>

            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>   

                <div class="breakout-container">
                    <div class="page-divider-box-shadow"></div>
                </div>
                
                <div class="custom-lots-block" id="<?php the_ID(); ?>">
                    <div class="custom-lots-block-overview">
                        <h1 style="color: #686868;"><?php the_title(); ?></h1>
                        <p style="padding-top: 15px; border-top: 1px solid #e2e2e2; max-width: 800px; margin: auto;"><?php the_field( 'short_description' ); ?></p>
                    </div>

                    <?php if (get_field( 'custom_lots_map' )) : ?>
                        <div style="padding-bottom: 20px;">
                            <img src="<?php the_field( 'custom_lots_map' ); ?>">
                        </div>
                    <?php endif; ?>

                    <!-- Custom Lots Pricing Table -->

                    <div class="card" style="max-width: 1024px; margin: auto;">

                        <div class="card-header" id="heading<?php the_ID(); ?>">
                            <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?php the_ID(); ?>" aria-expanded="false" aria-controls="collapse<?php the_ID(); ?>" style="color: #252425; text-decoration: none; width: 100%;">
                                <div class="collapse-label">View Lot Availability&nbsp;</div>
                            </button>
                            </h5>
                        </div>

                        <div id="collapse<?php the_ID(); ?>" class="collapse" aria-labelledby="heading<?php the_ID(); ?>">
                            <div class="card-body">

                                <div class="custom-lots-table">
                                    
                                    <?php 

                                    $table = get_field( 'custom_lots_table' );
                                    $disclaimer = get_field( 'custom_lots_disclaimer' );
                                    
                                    echo '<div class="custom-lots-table-headers">';

                                    foreach ( $table['header'] as $th ) {
                                        echo '<div>';
                                            echo $th['c'];
                                        echo '</div>';
                                    }

                                    echo '</div>';
                                    
                                    foreach ( $table['body'] as $tr ) {

                                        echo '<div class="custom-lots-table-rows">';

                                            foreach ( $tr as $td ) {

                                                echo '<div class="custom-lots-table-cell">';
                                                    echo $td['c'];
                                                echo '</div>';
                                            }

                                        echo '</div>';
                                    }

                                    echo '<div class="custom-lots-disclaimer">';
                                        echo $disclaimer;
                                    echo '</div>';

                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End Custom Lots Pricing Table -->
                    
                    <!-- Available Floorplans -->

                    <?php 

                    $posts = get_field('available_floorplans');

                    if( $posts ): ?>

                        <p style="padding: 60px 30px; max-width: 800px; margin: auto;"><span style="font-weight: 600;">If you would like Granville to build on your custom lot, <?php the_title(); ?> offers the following plans.</span> Pricing estimates include the lot and new construction, so costs will vary based on lot selection and options.</p>
                        <div class="page-divider-gradient"></div>
                        
                        <div class="estates-type-section">

                        <?php 

                        // Loop
                        
                        foreach( $posts as $p ): 
                            
                        // Vars

                        $commId = get_the_ID();
                        $commName = get_the_title($commId);
                        $id = $p->ID;
                        $name = get_the_title($id);
                        $starting_price = getFloorplanPrice($name, $commName);
                        ?>

                            <div class="individual-estates-tile" style="background-image: url(<?php echo get_field( 'floorplan_overview_page_image', $p->ID ); ?>)">
                                <a href="<?php echo get_the_permalink( $p->ID ); ?>">
                                    <div class="individual-estates-text">
                                        <h3><?php echo get_the_title( $p->ID ); ?></h3>
                                        <h5>
                                            <?php if ($starting_price) : ?>Starting at: <?php echo $starting_price; ?><span style="font-weight: 300;">*</span><?php endif; ?>
                                        </h5>
                                        <p style="padding: 20px 0 0 0;"><?php the_field( 'f_floorplan_size', $p->ID ); ?> Sq. Ft.<br><?php the_field( 'f_number_of_bedrooms', $p->ID ); ?> BD | <?php the_field( 'f_number_of_bathrooms', $p->ID ); ?> BA</p>
                                    </div>
                                </a>
                            </div>

                        <?php endforeach; ?>

                        </div>
                        <div class="page-divider-gradient"></div>

                    <?php endif; ?>

                    <!-- End Available Floorplans -->
                    <div style="padding-bottom: 60px;">
                        <p style="font-size: calc(.5vw + 1em);">Find out more about <span style="font-weight: 600;"><?php the_title(); ?></span>.</p>
                        <a href="<?php the_permalink(); ?>" class="subtle-button">Go to community</a>
                    </div>
                
                </div>

            <?php endwhile; ?>

        <?php endif; ?>

        <?php wp_reset_query();	?>

        <div class="breakout-container">
            <div class="page-divider-box-shadow"></div>
        </div>

    <?php echo do_shortcode('[customACform]'); ?>

    </div>

    <!--<div class="footer-cta-background">
        <div class="footer-cta-content">
            <div class="footer-cta-text">What makes your Granville Estate exceptional?</div>
            <div class="footer-cta-button"><a href="/granville-advantage/" class="subtle-button">The Granville Advantage</a></div>
        </div>
    </div>
    <div style="height: 20px; background-color: #ffffff;"></div>-->
</div>

<?php get_footer(); ?>