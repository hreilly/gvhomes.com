<?php
// Template Name: Promotions Overview
/**
 * The template for displaying the promotions overview page.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

<!--
    
/*-------------------------*\
    GENERAL GUIDELINES:
\*-------------------------*/

These grid containers will take images of any size, but the following are the recommended dimensions:
  Main promotion - right and left: 450px x 450px; mobile: 450px x 250px
  Secondary promotions - 450px x 250px
The fallback styling uses a set max-width of 450px for all images. You shouldn't need to worry about any special formatting for the fallback.
Pay attention to copy length in the main promotion; too much verbiage will result in spillage below the images; this can be adjusted for by altering the fractional size of the main-promotion-inner-grid center column, though I wouldn't reccomend it.

-->

<img class="full-width-header" src="/wp-content/uploads/2018/10/incentives_header.jpg">

<div class="main-content-container" style="padding-bottom: 50px;">
  <div class="promotions-overview-text" style="margin-bottom: 50px;">
        <img src="/wp-content/uploads/2018/10/limited_time_offers.png">
        <p>Make it a year to remember with special pricing and incentives on select Granville plans and neighborhoods. Hurry – these programs won’t last long!</p>
        <!--<div class="page-divider-narrow" style="margin: 0 20%; width: auto;"></div>-->
    </div>
  <div class="promotions-grid-container">
    <!--This is the top promotion that spans all columns-->
    <?php 

    // args
    $args = array(
        'posts_per_page'	=> 1,
        'offset'          => 0,
        'post_type'		    => 'promotions',
        'meta_key'	    	=> 'set_as_main_promotion',
        'meta_value'	    => '1'
    );

    // query
    $the_query = new WP_Query( $args );

    ?>

    <?php if( $the_query->have_posts() ): ?>

        <div class="main-promotion" id="promotion1">
            <div class="main-promotion-inner-grid">
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <!--Left image on the top promotion-->
                    <img src="<?php the_field('left_promotion_image'); ?>" class="main-promotion-left-image" alt="Promotion">
                    <!--Mobile image on the top promotion-->
                    <img src="<?php the_field('promotions_overview_image'); ?>" class="main-promotion-mobile-image" alt="Promotion">
                    <div class="main-promotion-text">
                        <h3><?php the_field('promotions_overview_header'); ?></h3>
                        <p><?php the_field('promotions_overview_text'); ?></p>
                        <a class="subtle-button" href="
                        
                        <?php 
                        
                        // This statement looks for an override link that will replace the individual promotions post link.

                        //var
                        $promolink = get_permalink();
                        $overridelink = get_field('override_promotions_overview_link');
                        
                        if ( get_field('override_promotions_overview_link') ) {
                          echo $overridelink;
                        } else {
                          echo $promolink;
                        }; ?>">
                        <?php the_field('promotions_overview_button'); ?></a>
                    </div>
                    <!--Right image on the top promotion-->
                    <img src="<?php the_field('right_promotion_image'); ?>" class="main-promotion-right-image" alt="Promotion">
                <?php endwhile; ?>
            </div>
        </div>
    
    <?php endif; ?>

    <?php wp_reset_query();	?>

    <?php 

    // args
    $args = array(
        'numberposts'	=> -1,
        'post_type'		=> 'promotions',
        'meta_key'		=> 'set_as_main_promotion',
        'meta_value'	=> '0',
        'orderby'     => 'modified'
    );

    // query
    $the_query = new WP_Query( $args );

    ?>

    <?php if( $the_query->have_posts() ): ?>
    
        <!--The following divs each take up one column on desktop/tablet and span the same width as the main promotion on mobile-->
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <div class="secondary-promotion">
              <div class="secondary-promotion-inner-grid">
                <a href="<?php 
                        
                        //var
                        $promolink = get_permalink();
                        $overridelink = get_field('override_promotions_overview_link');
                        
                        if ( get_field('override_promotions_overview_link') ) {
                          echo $overridelink;
                        } else {
                          echo $promolink;
                        }; ?>"><img src="<?php the_field('promotions_overview_image'); ?>" class="secondary-promotion-image" alt="Promotion"></a>
                <div class="secondary-promotion-text">
                    <h3><?php the_field('promotions_overview_header'); ?></h3>
                    <p><?php the_field('promotions_overview_text'); ?></p>
                    <a class="subtle-button" href="<?php 
                        
                        //var
                        $promolink = get_permalink();
                        $overridelink = get_field('override_promotions_overview_link');
                        
                        if ( get_field('override_promotions_overview_link') ) {
                          echo $overridelink;
                        } else {
                          echo $promolink;
                        }; ?>"><?php the_field('promotions_overview_button'); ?></a>
                </div>
              </div>
          </div>
        <?php endwhile; ?>

    <?php endif; ?>

    <?php wp_reset_query();	?>

  </div>
</div>

<?php get_footer(); ?>
