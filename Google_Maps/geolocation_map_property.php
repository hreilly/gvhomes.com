<?php
// Template Name: Geolocation Property Map
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */
echo '<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">';

get_header();

$container   = get_theme_mod('understrap_container_type');

?>

  <!-- Google Maps Script -->

  <script>
    // Note: This example requires that you consent to location sharing when
    // prompted by your browser. If you see the error "The Geolocation service
    // failed.", it means you probably did not give permission for the browser to
    // locate you.

    // Initiate variables
    var map, infoWindow;

    // General map function
    function initMap() {
      var clovis = {lat: 36.8399395, lng: -119.735154};
      map = new google.maps.Map(document.getElementById('map'), {
        center: clovis,
        zoom: 15
      });

      infoWindow = new google.maps.InfoWindow;

      // Try HTML5 geolocation.
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };

          infoWindow.setPosition(pos);
          infoWindow.setContent('Your Location.');
          infoWindow.open(map);
          map.setCenter(pos);
        }, function() {
          handleLocationError(true, infoWindow, map.getCenter());
        });
      } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
      }
      
      // Defines an empty array for property markers to fill
      var markers = [];

      // Post query
      <?php 

      $args = array(
          'posts_per_page' => -1,
          'post_type'      => 'property',
          'meta_query'     => array(
              array(
              'location'  => array(
                  'key'      => 'property_map_location',
                  'compare'  => 'EXISTS'
              )
          )
      ));

      $the_query = new WP_Query( $args );

      // Global variables
      $address = get_the_title();
      $plan = get_field('floorplan');
      $price = get_field('price');
      $beds = get_field('bedrooms');
      $baths = get_field('bathrooms');
      $sqft = get_field('square_footage');
      $link = get_the_permalink();

      // Loop
      if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
          $the_query->the_post();
      ?>

        <?php if (!empty( get_field('property_map_location') ) ) :?>
          // populate map with marker for each listing
          markers[<?php echo $the_query->current_post ?>] = new google.maps.Marker({
              position: {lat: <?php echo get_field('property_map_location')['lat'] ?>, lng: <?php echo get_field('property_map_location')['lng'] ?>},
              map: map,
              animation: google.maps.Animation.DROP,
          });
        <?php endif; ?>
          
      <?php
          }
        /* Restore original Post Data */
        wp_reset_postdata();
      } else {
        // no posts found
      }
      ?>

    }
    
    // Handles errors in location services
    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
      infoWindow.setPosition(pos);
      infoWindow.setContent(browserHasGeolocation ?
                            'Error: This service doesn\'t work without your location.' :
                            'Error: Your browser doesn\'t support geolocation.');
      infoWindow.open(map);
      
    }
    google.maps.event.addDomListener(window, 'load', initialize);
  </script>

  <div id="map" class="map col m-0">
  </div>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMyyKNa3xIux_wOcSN5lCVFzfvlB1SQ3c&callback=initMap">
</script>

<?php get_footer(); ?>