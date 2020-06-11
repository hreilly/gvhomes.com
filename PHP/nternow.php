<?php
// Template Name: NterNow
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */
echo '<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">';

get_header();

$container   = get_theme_mod('understrap_container_type');

?>

<style>
    .repeater-rows-container {
        max-width: 1024px;
        width: 100%;
        margin: auto;
    }
    .repeater-row {
        width: 100%;
        border-bottom: 1px solid #d2d2d2;
        display: flex;
        padding: 20px;
        align-items: center;
    }
    /*.repeater-row:nth-of-type(1) {
        border-top: 1px solid #d2d2d2;
    }*/
    .repeater-row:nth-of-type(even) {
        background-color: #f2f2f2;
    }
    .repeater-row-image {
        width: 15%;
    }
    .repeater-row-content {
        width: 55%;
    }
    .repeater-row-content-header {
        padding: 0px 20px;
    }
    .repeater-row-content-subhead {
        padding: 0px 20px;
        text-transform: uppercase;
    }
    .repeater-row-content-body {
        padding: 0px 20px;
        display: flex;
        justify-content: space-between;
    }
    .repeater-row-button {
        width: 30%;
        text-align: center;
    }
    .nternow-app-badges {
      display: none;
    }
    @media screen and (max-width: 700px) {
      .repeater-row {
        flex-flow: row wrap;
        justify-content: center;
        margin: auto;
        flex-direction: column;
      }
      .repeater-row-image {
        width: 100%;
        max-width: 300px;
        padding-bottom: 20px;
        padding-top: 20px;
      }
      .repeater-row-content {
        width: 100%;
        text-align: center;
        justify-content: center;
        padding-bottom: 20px;
      }
      .repeater-row-content-body {
        flex-flow: row wrap;
        justify-content: space-around;
      }
      .repeater-row-button {
        width: 50%;
        min-width: 200px;
        padding-bottom: 20px;
      }
      .nternow-app-badges {
        display: block;
        margin: auto;
        max-width: 200px;
      }
      .nternow-app-badges a {
        max-width: 200px;
      }
    }
</style>

<img class="full-width-header" src="<?php the_post_thumbnail_url( "full" ); ?>" alt="" />

<div class="main-content-container floorplan-container">

<!-- Coming Soon Query -->

  <div style="padding-top: 50px; margin:auto; max-width: 1080px;">
  
  <div style="text-align: center;">
    <div style="width: 100%; text-align: center;">
      <img src="/wp-content/uploads/2019/12/nternow_logo.jpg" style="max-width: 100%; padding: 30px; margin: auto;" alt="" />
    </div>
    <h3 style="text-align: center;">See the homes you want when you want.</h3>
    <p style="margin: 40px; text-align: center;">We're always working to make your home search easier - that's why we've partnered with NterNow to provide <strong>on-demand access</strong> at select move-in ready homes. Explore on your own schedule without the need to stop by our offices or make an appointment. Grab your phone, download the app (or call in), and unlock a whole new walkthrough experience.</p>
    <a class="subtle-button" style="text-align: center; background-color:#dc611d;" href="https://player.vimeo.com/video/374493458?&transparent=0" 
                data-featherlight="iframe" 
                data-featherlight-iframe-frameborder="0"  
                data-featherlight-iframe-allowfullscreen="true" 
                data-featherlight-iframe-style="display:block;height:70vh;width:90vw;max-width:1280px;max-height:720px;">WATCH&nbsp;the&nbsp;VIDEO</a>
    <p style="margin: 40px; text-align: center; font-style: italic; color: #dc611d;">Available from sun-up to sun-down at any home with an orange "NterNow" sign.</p>
  </div>

  <div class="nternow-app-badges">
  <a href='https://play.google.com/store/apps/details?id=com.nternow.android&hl=en_US&utm_source=nternow_page&utm_campaign=gvhomes&pcampaignid=pcampaignidMKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'><img alt='Download NterNow on Google Play' src='https://play.google.com/intl/en_us/badges/static/images/badges/en_badge_web_generic.png'/></a>
  <a href="https://apps.apple.com/us/app/nternow-app/id1187749768"><img alt="Download NterNow on the App Store" src="/wp-content/uploads/2019/12/Download_on_the_App_Store_Badge_US-UK_blk_092917-01.png" /></a>
  </div>

  <h3 style="text-align: center; text-transform: none; font-weight: bold; padding-top: 30px; padding-bottom: 20px;">NterNow Homes by Community:</h3>

  <?php

  // Define query for "parent" communities

  $comm_args = array(
    'posts_per_page' => -1,
    'post_type'      => 'communities',
    'orderby'        => 'title',
    'order'          => 'ASC',
    'meta_query'     => array(
      'relation'   => 'AND',
      'parent_comm'  => array(
        'key'      => 'show_in_homes_widget',
        'value'    => 1
      )
    )
  );

  $comm_query = new WP_Query( $comm_args );

  ?>

  <?php // Check for valid communities
  
  if ( $comm_query->have_posts() ): ?>

    <?php // Begin community loop
    
    while ( $comm_query->have_posts() ) : $comm_query->the_post(); 
    
    $comm_id = get_the_ID();
    $comm_name = get_the_title();
    $comm_name_nospc = str_replace(' ', '', $comm_name);
    
    ?>

      <!-- Begin Looped Content -->

      <div id="<?php echo $comm_name_nospc; ?>ComingSoon" style="border: 1px solid rgba(37,36,37,.125); border-radius: 3px; max-width: 1080px; margin: auto auto 30px auto;" class="card">

        <!-- Accordian Trigger -->

        <div class="card-header" id="heading<?php the_ID(); ?>">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?php the_ID(); ?>" aria-expanded="false" aria-controls="collapse<?php the_ID(); ?>" style="color: #252425; text-decoration: none; width: 100%;">
              <div class="collapse-label" style="font-size: calc(.9vw + 1rem);"><?php echo $comm_name ; ?>&nbsp;</div>
            </button>
          </h5>
        </div>
        
        <?php
        
        // Define property args to capture property listings by parent community

        $prop_args = array(
          'posts_per_page' => -1,
          'post_type'      => 'property',
          'orderby'        => 'clean_price',
          'order'          => 'ASC',
          'meta_query'     => array(
            'relation'   => 'AND',
            'clean_price'  => array(
              'key'      => 'clean_price',
              'compare'  => 'EXISTS'
            ),
            'coming_soon'  => array(
              'key'      => 'nternow_available',
              'value'    => 1
            ),
            'sq_ft'      => array(
              'key'      => 'clean_sqft',
              'compare'  => 'EXISTS'
            ),
            'parent_comm' => array(
              'key'      => 'property_parent_community',
              'value'    => $comm_id
            ),
            'sold'        => array(
              'key'     => 'sold',
              'value' => 0
            )
          )
        );

        $prop_query = new WP_Query( $prop_args );

        ?>

        <?php // Begin "Property" subloop 
        
        if ( $prop_query->have_posts() ): ?>

          <div class="repeater-rows-container collapse" style="padding-bottom: 40px;" id="collapse<?php the_ID(); ?>" aria-labelledby="heading<?php the_ID(); ?>">

            <?php // Generate looped content
            
            while ( $prop_query->have_posts() ) : $prop_query->the_post(); 
            
            $prop_id = get_the_ID();
            $prop_title = get_the_title();

            // define 'property_parent_community' post object variable for calling title from parent community (used for search filter)

            $parent_post_object = get_field('property_parent_community');
            $plan_post_object = get_field('floorplan');

            // Cache post data for later in the loop

            $preserve_post = get_post();

            ?>

              <!-- Single Property Listings Markup -->

              <div class="repeater-row">
                <div class="repeater-row-image">
                  <?php if ( get_the_post_thumbnail() ) : ?>
                    <img src="<?php the_post_thumbnail_url( "medium" ); ?>" width="100%" height="auto" style="max-width: 100%;" alt="<?php echo get_the_title($plan_post_object->ID); ?> <?php echo get_field('elevation'); ?>" />
                  <?php else :?>
                    <img src="https://s3-us-west-1.amazonaws.com/gvhomes/images/copper_river_community_map.jpg">
                  <?php endif; ?>
                </div>
                <div class="repeater-row-content">
                  <div class="repeater-row-content-header">
                    <h4><span style="font-weight: 700; text-transform: none;"><?php echo get_the_title($plan_post_object->ID); ?></span><span style="font-weight: 400;"> &nbsp;|&nbsp; <?php echo get_field('price'); ?></span></h4>
                  </div>
                  <div class="repeater-row-content-subhead">
                    <?php echo get_field('elevation'); ?>
                  </div>
                  <div style="padding: 0px 20px 0px 20px;">
                    <hr style="margin-top: 0px; margin-bottom: 10px;">
                  </div>
                  <div class="repeater-row-content-body">
                    <div><strong><?php echo get_field('bedrooms'); ?></strong> BD</div>
                    <div><strong><?php echo get_field('bathrooms'); ?></strong> BA</div>
                    <div><strong><?php echo get_field('garage_spaces'); ?></strong> Car Garage</div>
                    <div><strong><?php echo get_field('square_footage'); ?></strong> Sq. Ft.</div>
                  </div>
                </div>
                <div class="repeater-row-button">
                  <a href="<?php the_permalink(); ?>" class="subtle-button">VIEW DETAILS</a>
                </div>
              </div>

            <?php endwhile; ?>

          </div>

        <?php // Define case for empty property queries
        
        else: 
        
        $post = $preserve_post;
        setup_postdata( $post );
        
        ?>

          <style>
              
            /* styling applies only to communities that don't have listings populated from the nested loop */
            #<?php echo $comm_name_nospc; ?>ComingSoon {
              display: none;
            }
          
          </style>

          <div class="repeater-rows-container" style="padding-bottom: 60px;">Please check back soon.</div>

        <?php endif; ?>

      </div>

    <?php endwhile; ?>

    <?php wp_reset_query();	?>

  <?php endif; ?>

    <!-- Google Maps Script -->

    <script>
    // Note: This example requires that you consent to location sharing when
    // prompted by your browser. If you see the error "The Geolocation service
    // failed.", it means you probably did not give permission for the browser to
    // locate you.

    // Initiate variables
    var map;
    var infowindow;
    var markers = [];
    var infoWindows = [];

////// General map function
    function initMap() {
      var clovis = {lat: 36.8399395, lng: -119.735154};
      map = new google.maps.Map(document.getElementById('map'), {
        center: clovis,
        zoom: 11
      });

      infoWindow = new google.maps.InfoWindow;

//////// Try HTML5 geolocation.
//      if (navigator.geolocation) {
//        navigator.geolocation.getCurrentPosition(function(position) {
//          var pos = {
//            lat: position.coords.latitude,
//            lng: position.coords.longitude
//          };

//          infoWindow.setPosition(pos);
//          infoWindow.setContent('Your Location.');
//          infoWindow.open(map);
//          map.setCenter(pos);
//        }, function() {
//          handleLocationError(true, infoWindow, map.getCenter());
//        });
//      } else {
//        // Browser doesn't support Geolocation
//        handleLocationError(false, infoWindow, map.getCenter());
//      }

//////// Post query
      <?php 

      $args = array(
        'posts_per_page' => -1,
        'post_type'      => 'property',
        'meta_query'     => array(
          array(
            'location'  => array(
              'key'      => 'property_map_location',
              'compare'  => 'EXISTS'
            ),
            'coming_soon' => array(
              'key' => 'nternow_available',
              'value' => 1
          )
        )
      ));

      $the_query = new WP_Query( $args );

      // Loop (final curly bracket is purposely open)
      if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
          $the_query->the_post();
      ?>

        <?php 
        
        // PHP listing variables for infowindows
        $address = get_the_title();
        $price = get_field('price');
        $beds = get_field('bedrooms');
        $baths = get_field('bathrooms');
        $sqft = get_field('square_footage');
        $link = get_the_permalink();
        
        if (!empty( get_field('property_map_location') ) ) :?>
          
          // Add marker for each listing to array
          markers[<?php echo $the_query->current_post ?>] = new google.maps.Marker({
            position: {lat: <?php echo get_field('property_map_location')['lat'] ?>, lng: <?php echo get_field('property_map_location')['lng'] ?>},
            map: map,
            animation: google.maps.Animation.DROP,
          });

          var listingContent = '<div style="margin: auto; text-align: left; padding: 20px 0px 20px 5%;">' +
              '<h4><?php $plan = get_field('floorplan'); if( $plan ) :?><?php echo get_the_title( $plan->ID ); ?><?php endif; ?></h4>' +
              '<h5 style="font-weight: 400;"><?php echo $price; ?></h5>' +
              '<div class="page-divider-gradient"></div>' +
              '<p style="font-weight: 700;"><?php echo $beds; ?> BD &nbsp;|&nbsp; <?php echo $baths; ?> BA &nbsp;|&nbsp; <?php echo $sqft; ?> Sq. Ft.</p>' +
              '<p style="font-weight: bold;"><?php echo $address; ?></p>' +
              '<a class="subtle-button" href="<?php echo $link; ?>">Details &amp; Photos</a>' +
            '</div>';
          
          // info window for each listing
          infoWindows[<?php echo $the_query->current_post ?>] = new google.maps.InfoWindow({
            content: listingContent,
            maxWidth: 400,
          });

          // open each infoWindow on click
          markers[<?php echo $the_query->current_post ?>].addListener('click', function() {
            // close all other infoWindows (this isn't working)
            for (var i = 0; i < infoWindows.length; i++) {
              if (infoWindow) {
                infoWindow.close();
              }
            }

            infoWindows[<?php echo $the_query->current_post ?>].open(map, markers[<?php echo $the_query->current_post ?>]);

          });

        <?php endif; ?>

      // End Loop (close open curly brackets)
      <?php } wp_reset_postdata(); } else {
          // no posts found
        }
      ?>

    }
    
  </script>
  <h3 style="text-align: center; padding-top: 60px;">All Granville Homes Featuring NterNow:</h3>
  <div class="page-divider-gradient" style="padding-top: 5px;"></div>
  <div id="map" style="height: 70vh;" class="map col m-0">
  </div>
  <div style="padding: 20px;"></div>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMyyKNa3xIux_wOcSN5lCVFzfvlB1SQ3c&callback=initMap">
</script>

  <!-- Disclaimer -->

  <!-- These values are now universal and can be found in shortcodes.php -->
  <?php echo do_shortcode( '[siteDisclaimer]' ); ?>

  </div>

</div>

<?php get_footer(); ?>