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

<?php 

$args = array(
    'post_type'      => 'property',
    'meta_query'     => array(
        array(
        'clean_price'  => array(
            'key'      => 'clean_price',
            'compare'  => 'EXISTS'
        )
    )
));

$the_query = new WP_Query( $args );

$link = get_the_permalink();

?>

<?php if( $the_query->have_posts() ): ?>

    <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var map, infoWindow;
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
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: This service doesn\'t work without your location.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
        
      }
    </script>

    <div id="map" class="map col m-0">
    </div>

<?php endif; ?>

<?php wp_reset_query();	?>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMyyKNa3xIux_wOcSN5lCVFzfvlB1SQ3c&callback=initMap">
</script>

<?php get_footer(); ?>