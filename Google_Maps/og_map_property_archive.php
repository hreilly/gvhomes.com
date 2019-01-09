<?php
// Template Name: OG Property Map
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */
echo '<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">';

get_header();

$container   = get_theme_mod('understrap_container_type');

?>

<!-- init google map  -->
    <script>
        function getInternetExplorerVersion() {
          var rv = -1;
          if (navigator.appName == 'Microsoft Internet Explorer')
          {
            var ua = navigator.userAgent;
            var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
            if (re.exec(ua) != null)
              rv = parseFloat( RegExp.$1 );
          }
          else if (navigator.appName == 'Netscape')
          {
            var ua = navigator.userAgent;
            var re  = new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})");
            if (re.exec(ua) != null)
              rv = parseFloat( RegExp.$1 );
          }
          return rv;
        }

       function initMap() {
         // set center to clovis center
         var clovis = {lat: 36.8399395, lng: -119.735154};
         var map = new google.maps.Map(document.getElementById('map'), {
           zoom: 10,
           center: clovis
         });

         var markers = [];
         var infowindows = [];

         <?php while ( have_posts() ) : the_post(); ?>
            <?php if (!empty( get_field('property_map_location') ) ) :?>

            // populate map with marker for each community
            markers[<?php echo $wp_query->current_post ?>] = new google.maps.Marker({
              position: {lat: <?php echo get_field('property_map_location')['lat'] ?>, lng: <?php echo get_field('property_map_location')['lng'] ?>},
              map: map,
              animation: google.maps.Animation.DROP,
            });

            if ( getInternetExplorerVersion() == -1 ) {
            // if not IE do this
                var infoWindowContent = '<div class="row map-infowindow">' +
                  '<div class="col">' +
                    '<h4 class="tt-title property mb-3"><?php the_title(); ?></h4>' +
                    '<a class="btn btn-sm btn-block px-3 btn-dark" href="<?php the_permalink(); ?>">View Property</a>' +
                  '</div>' +
                  '</div>';

                // info window for each community
                infowindows[<?php echo $wp_query->current_post ?>] = new google.maps.InfoWindow({
                  content: infoWindowContent,
                  maxWidth: 230,
                });

                // open each infowindow on click
                markers[<?php echo $wp_query->current_post ?>].addListener('click', function() {
                    // close all other infowindows
                    for (var ind = 0; ind < infowindows.length; ind++) {
                      if (infowindow) {
                        infowindow.close();
                      }
                    }

                    infowindows[<?php echo $wp_query->current_post ?>].open(map, markers[<?php echo $wp_query->current_post ?>]);

                    // fixes styling of infowindow
                    $(".map-infowindow").parent().addClass("overHide");
                });
            }
          <?php endif; ?>

        <?php endwhile; // end of the loop. ?>
    }
    </script>

    <div id="map" class="map col m-0">
    </div>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMyyKNa3xIux_wOcSN5lCVFzfvlB1SQ3c&callback=initMap">
</script>

<?php get_footer(); ?>