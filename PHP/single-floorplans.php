<?php
// Template Name: Single Floorplans
/**
 * Working template for re-structured individual floorplans.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

<!-- CSS is in _floorplans.scss -->

<!-- FULL WIDTH IMAGE -->

<div class="full-width-bg-image" style="background-image: url(<?php the_post_thumbnail_url( "full" ); ?>)"></div>

<!-- STICKY NAV BAR -->

<section id="stickyBar" class="navbar">
    <div class="container" style="max-width: 100vw; padding-left: 0; padding-right: 0;">
        <ul class="nav nav-pills anchor-list">
            <li class="nav-item">
                <a class="nav-link scroll active" href="#overview">Overview</a>
            </li>  
            <li class="nav-item">
                <a class="nav-link scroll" href="#gallery">Gallery & Tours</a>
            </li>
            <?php if ( get_field( 'floor_plan_url' ) ) : ?>
                <li class="nav-item">
                    <a class="nav-link scroll" href="#interactive">Floor Plan</a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link scroll" href="#features">Standard Features</a>
            </li>
        </ul>
    </div>
</section>

<!-- MAIN CONTENT -->

<div class="main-content-container floorplan-container">

    <!-- FLOORPLAN DETAILS -->

    <div id="overview" class="floorplan-overview">
        <h1><span style="font-weight: 400;">The</span> <?php the_title(); ?></h1>
        <div class="additional-floorplan-details">
            <div class="floorplan-detail-item">
                <h4><?php the_field('f_floorplan_size'); ?></h4>
                <p>Square Feet</p>
            </div>
            <div class="floorplan-detail-item">
                <h4><?php the_field('f_number_of_bedrooms'); ?></h4>
                <p>Bedrooms</p>
            </div>
            <div class="floorplan-detail-item">
                <h4><?php the_field('f_number_of_bathrooms'); ?></h4>
                <p>Bathrooms</p>
            </div>
            <div class="floorplan-detail-item">
                <h4><?php the_field('f_number_of_garages'); ?></h4>
                <p>Garage Spaces</p>
            </div>
            <div class="floorplan-description">
                <p><?php the_field('floorplan_description'); ?></p>

                <!-- Check for available models -->

                <?php 

                // Added on 03/14/19, relies on "Communities" post types (hreilly)

                $models = array(
                    'post_type' => 'communities',
                    'meta_query' => array(
                        'relation'          => 'AND',
                        array(
                            'key' => 'models_available',
                            'value' => '"' . get_the_ID() . '"',
                            'compare' => 'LIKE'
                        ),
                        array(
                            'key' => 'child_communities',
                            'value' => '',
                            'compare' => 'EXISTS'
                        )
                    )
                );

                $the_query = new WP_Query( $models );

                ?>

                <style>
                    .model-community::after{
                        content: ','
                    }
                    .model-community:last-of-type::after{
                        content: ' '
                    }
                </style>

                <?php if( $the_query->have_posts() ): ?>

                    <p style="text-align: center; font-weight: bold; font-style: italic;">Model Home Located at:

                    <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

                        <a href="<?php echo the_permalink(); ?>" class="model-community"><?php echo the_title(); ?></a>

                    <?php endwhile; ?>

                    </p>

                <?php endif; ?>

                <?php wp_reset_query(); ?>
                        
            </div>
        </div>

        <hr style="max-width: 1004px;">

        <!-- COMMUNITY PRICE SELECTION -->

        <?php $communities = get_field('available_at'); ?>
        
        <?php if ($communities) : ?>
        <section id="pricing" class="container my-5">
            <div class="row justify-content-center">
                <div class="text-center col-xs-12 col-md-4 col-sm-6 communityDropdown my-3 my-sm-0">
                    <h5>Available at:</h5>
                    <div class="customDropdown">
                        <select id="comDrop" class="dropdown" name="communities" onchange="updatePrice()">
                            <option id="noComm" value="noComm">&nbsp;Select a community...</option>
                            <?php foreach ($communities as $ind=>$post): ?>
                                <?php setup_postdata($post); ?>
                                    <option id="comm-<?php echo $ind ?>" value="<?php echo $ind ?>">&nbsp;<?php the_title()?></option>
                                <?php wp_reset_postdata(); ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-md-4 col-sm-6 price my-3 my-sm-0">
                    <h5 class="text-center">Starting from:</h5>
                    <h2 id="noPrice" class="floorplanPrices">$ - -</h2>
                    <?php $fpost = $post; ?>

                    <?php foreach ($communities as $ind=>$post): ?>
                        <?php setup_postdata($post); ?>
                            <h2 id="price-<?php echo $ind ?>" class="floorplanPrices dark"><?php echo getFloorplanPrice($fpost->post_title, $post->post_title); ?>
                                
                                <?php 
                                // Special formatting for Granville at Copper River
                                $commid = get_the_id();
                                if ($commid == '17564'): ?>
                                    <p style="font-style: italic; font-size: 14px; text-transform: none; font-weight: 400; padding-top: 20px;">All Granville at Copper River Ranch homes include additional standard features. <a href="/promotions/granville-at-copper-river-ranch/" style="font-weight: 700;">Learn more &#9658;</a></p>
                                <?php endif; ?>

                            </h2>

                        <?php wp_reset_postdata(); ?>
                    <?php endforeach; ?>
                </div>

                <!-- COMMUNITY PRICE SELECTION SCRIPT -->

                <script>

                    var updatePrice = function() {
                        // pricing dropdown
                        let prices = document.getElementsByClassName('floorplanPrices');
                        // communities dropdown
                        let comDrop = document.querySelector('#comDrop');
                        // current selection
                        let select = comDrop.value;

                        // hide every price
                        for (var i = 0; i < prices.length; i++) {
                            prices[i].style.display = "none";
                        }

                        if ( select != "noComm" ) {
                            // show selected price
                            let price = document.getElementById( 'price-' + select );
                            price.style.display = "block";
                        } else {
                            // show selected price
                            let price = document.getElementById( 'noPrice' );
                            price.style.display = "block";
                        }
                    }

                    updatePrice();
                
                </script>

            </div>
        </section>

        <?php endif; ?>

        <hr style="max-width: 1004px;">

    </div>

    <!-- GALLERY, WALKTHROUGH, & MATTERPORT -->


    <?php if (get_field('masterslider_id')): ?>
        <div id="gallery" style="padding-top: 50px; pointer-events: auto">
            <h3><span style="font-weight: 400;"><?php the_title(); ?>:</span> Gallery 
            <?php if (get_field('video_url')): ?>
                <span style="font-weight: 400;">\</span> Video <?php endif; ?>
            <?php if (get_field('tour_url')): ?>
                <span style="font-weight: 400;">\</span> Virtual Tour<?php endif; ?>
            </h3>
            <div class="page-divider-gradient" style="padding-top: 5px;"></div>
            <?php if (get_field('masterslider_id')): ?>
                <?php
                    $string = '[masterslider alias="' . get_field("masterslider_id") . '"]';
                    echo do_shortcode( $string ); ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <!-- BDX INTERACTIVE -->

    <?php if ( get_field( 'floor_plan_url' ) ) : ?>
    
    <div id="interactive" style="padding-top: 50px; margin:auto;">

        <h3>Interactive Plan: <span style="font-weight: 400;">Customize your <?php the_title(); ?>.</span></h3>
        <div class="page-divider-gradient" style="padding-top: 5px;"></div>

        <div class="bdx-iframe floorplan" style="max-width: 1024px;">
            <a href="<?php the_field( 'floor_plan_url' ); ?>" class="subtle-button" target="_blank">View Floor Plan</a>
            <iframe src="<?php the_field( 'floor_plan_url' ); ?>" width="320" height="240" frameborder="0" allowfullscreen="allowfullscreen" style="pointer-events: auto;"></iframe>
        </div>

    </div>

    <?php endif; ?>

    <!-- STANDARD FEATURES -->

    <?php 
    
    // Used for calling standard features from data post
    $planType = get_field( 'floorplan_type' );
    
    if ( get_field( 'floorplan_type' ) ) : ?>

    <div id="features" class="floorplan-features" style="padding-top: 50px; margin:auto;">
        <h3><span style="font-weight: 400;">Included </span>Features</h3>
        <div class="page-divider-gradient" style="padding-top: 5px;"></div>
        <div id="accordion" style="">

        <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Exterior
            </button>
            </h5>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">

                <ul class="additional-features floorplanfeatures">

                <?php // References "Standard Features" data post and uses floorplan_type field to determine the correct content
                $exteriorString = strtolower( $planType . '_exterior' );
                $exteriorFeatures = get_field( $exteriorString, 20901 );
                ?>

                <?php echo $exteriorFeatures; ?>
                    
                <?php if ( get_field( 'exterior_features' ) ) : ?>
                    <?php the_field( 'exterior_features' ); ?>
                <?php endif; ?>

                </ul>

            </div>
        </div>
        </div>

        <div class="card">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Interior
            </button>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">

                <ul class="additional-features floorplanfeatures">

                <?php 
                $interiorString = strtolower( $planType . '_interior' );
                $interiorFeatures = get_field( $interiorString, 20901 );
                ?>

                <?php echo $interiorFeatures; ?>
                    
                <?php if ( get_field( 'interior_features' ) ) : ?>
                    <?php the_field( 'interior_features' ); ?>
                <?php endif; ?>

                </ul>

            </div>
        </div>
        </div>

        <div class="card">
        <div class="card-header" id="headingFive">
            <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                Kitchen
            </button>
            </h5>
        </div>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
            <div class="card-body">

                <ul class="additional-features floorplanfeatures">

                <?php 
                $kitchenString = strtolower( $planType . '_kitchen' );
                $kitchenFeatures = get_field( $kitchenString, 20901 );
                ?>

                <?php echo $kitchenFeatures; ?>
                    
                <?php if ( get_field( 'kitchen_features' ) ) : ?>
                    <?php the_field( 'kitchen_features' ); ?>
                <?php endif; ?>

                </ul>

            </div>
        </div>
        </div>

        <div class="card">
        <div class="card-header" id="headingThree">
            <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Owner Suite
            </button>
            </h5>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">

                <ul class="additional-features floorplanfeatures">

                <?php
                $ownerString = strtolower( $planType . '_owner_suite' );
                $ownerFeatures = get_field( $ownerString, 20901 );
                ?>

                <?php echo $ownerFeatures; ?>
                    
                <?php if ( get_field( 'master_features' ) ) : ?>
                    <?php the_field( 'master_features' ); ?>
                <?php endif; ?>

                </ul>

            </div>
        </div>
        </div>

        <div class="card">
        <div class="card-header" id="headingSeven">
            <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                Laundry Room
            </button>
            </h5>
        </div>
        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
            <div class="card-body">

                <ul class="additional-features floorplanfeatures">

                <?php 
                $laundryString = strtolower( $planType . '_laundry_room' );
                $laundryFeatures = get_field( $laundryString, 20901 );
                ?>

                <?php echo $laundryFeatures; ?>
                    
                <?php if ( get_field( 'laundry_features' ) ) : ?>
                    <?php the_field( 'laundry_features' ); ?>
                <?php endif; ?>

                </ul>

            </div>
        </div>
        </div>   

        <div class="card">
        <div class="card-header" id="headingFour">
            <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                Garage
            </button>
            </h5>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
            <div class="card-body">

                <ul class="additional-features floorplanfeatures">

                <?php 
                $garageString = strtolower( $planType . '_garage' );
                $garageFeatures = get_field( $garageString, 20901 );
                ?>

                <?php echo $garageFeatures; ?>
                    
                <?php if ( get_field( 'garage_features' ) ) : ?>
                    <?php the_field( 'garage_features' ); ?>
                <?php endif; ?>

                </ul>

            </div>
        </div>
        </div>

        <div class="card">
        <div class="card-header" id="headingEight">
            <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                Efficiency
            </button>
            </h5>
        </div>
        <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion">
            <div class="card-body">

                <ul class="additional-features floorplanfeatures">

                <?php 
                $efficiencyString = strtolower( $planType . '_efficiency' );
                $efficiencyFeatures = get_field( $efficiencyString, 20901 );
                ?>

                <?php echo $efficiencyFeatures; ?>
                    
                <?php if ( get_field( 'efficiency_features' ) ) : ?>
                    <?php the_field( 'efficiency_features' ); ?>
                <?php endif; ?>

                </ul>

            </div>
        </div>
        </div>      

        <div class="card">
        <div class="card-header" id="headingSix">
            <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                Tech
            </button>
            </h5>
        </div>
        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
            <div class="card-body">
                <ul class="additional-features floorplanfeatures">

                <?php 
                $techString = strtolower( $planType . '_tech' );
                $techFeatures = get_field( $techString, 20901 );
                ?>

                <?php echo $techFeatures; ?>
                    
                <?php if ( get_field( 'tech_features' ) ) : ?>
                    <?php the_field( 'tech_features' ); ?>
                <?php endif; ?>

                </ul>
            </div>
        </div>
        </div>

        </div>
        </div>
    <?php endif; ?>

    <!-- MOVE-IN READY QUERY/CONTACT AN AGENT -->

    <div id="floorplan-mir" style="padding-top: 50px; margin:auto;">

        <?php 

        $args = array(
            'posts_per_page' => 2,
            'post_type'      => 'property',
            'orderby'        => 'rand',
            'order'          => 'ASC',
            'meta_query'     => array(
                'relation'   => 'AND',
                array(
                    'key'      => 'floorplan', 
                    'value'    => get_the_ID(),
                    'compare'  => 'EXISTS'
                ),
                'clean_price'  => array(
                    'key'      => 'clean_price',
                    'compare'  => 'EXISTS'
                ),
                'coming_soon'  => array(
                    'key'      => 'coming_soon',
                    'value'    => 0
                ),
                'sold'        => array( // added filter 03/13/19 (hreilly)
                    'key'     => 'sold',
                    'value'   => 0
                )
            )
        );

        $the_query = new WP_Query( $args );

        ?>

        <?php if( $the_query->have_posts() ): ?>

            <h3><span style="font-weight: 400;">Move-in Ready </span><?php the_title(); ?> <span style="font-weight: 400;">Homes:</span></h3>
            <div class="page-divider-gradient" style="padding-top: 5px;"></div>

            <div class="hfth-type-section" style="padding-bottom: 40px;">

                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                <?php 

                // define 'property_parent_community' post object variable for calling title from parent community (used for search filter)

                $parent_post_object = get_field('property_parent_community');

                ?>

                <!-- MOVE-IN READY LISTINGS -->

                <div class="individual-property-tile" style="background-image: url(<?php the_post_thumbnail_url( "medium-large" ); ?>)">
                    <a href="<?php the_permalink(); ?>">
                        <div class="individual-property-text">
                            <h3><?php the_field( 'price' ); ?><br><br><?php echo get_the_title($parent_post_object->ID); ?></h3>
                        </div>
                    </a>
                </div>

                <?php endwhile; ?>

                <?php wp_reset_query();	?>

                <!-- ALL PLAN LISTINGS TILE -->

                <div class="individual-property-tile" style="background-image: url(<?php the_post_thumbnail_url( "medium-large" ); ?>)">
                    <a href="/property/?_sfm_floorplan=<?php the_ID(); ?>">
                        <div class="individual-property-text">
                            <br><br>
                            <h3>All <?php the_title(); ?> Homes &#8594;&#xFE0E;</h3>
                        </div>
                    </a>
                </div>

            </div>

        <?php endif; ?>

            <!-- SALES MESSAGE FORM -->

            <?php echo do_shortcode( '[customACform]' ); ?>

        <!-- Disclaimer -->

        <!-- These values are now universal and can be found in shortcodes.php -->
        <?php echo do_shortcode( '[siteDisclaimer]' ); ?>

    </div>

</div>


<!-- Scripts -->

<script type="text/javascript">
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
/*
Sticky-kit v1.1.2 | WTFPL | Leaf Corcoran 2015 | http://leafo.net
*/
(function(){var b,f;b=this.jQuery||window.jQuery;f=b(window);b.fn.stick_in_parent=function(d){var A,w,J,n,B,K,p,q,k,E,t;null==d&&(d={});t=d.sticky_class;B=d.inner_scrolling;E=d.recalc_every;k=d.parent;q=d.offset_top;p=d.spacer;w=d.bottoming;null==q&&(q=0);null==k&&(k=void 0);null==B&&(B=!0);null==t&&(t="is_stuck");A=b(document);null==w&&(w=!0);J=function(a,d,n,C,F,u,r,G){var v,H,m,D,I,c,g,x,y,z,h,l;if(!a.data("sticky_kit")){a.data("sticky_kit",!0);I=A.height();g=a.parent();null!=k&&(g=g.closest(k));
if(!g.length)throw"failed to find stick parent";v=m=!1;(h=null!=p?p&&a.closest(p):b("<div />"))&&h.css("position",a.css("position"));x=function(){var c,f,e;if(!G&&(I=A.height(),c=parseInt(g.css("border-top-width"),10),f=parseInt(g.css("padding-top"),10),d=parseInt(g.css("padding-bottom"),10),n=g.offset().top+c+f,C=g.height(),m&&(v=m=!1,null==p&&(a.insertAfter(h),h.detach()),a.css({position:"",top:"",width:"",bottom:""}).removeClass(t),e=!0),F=a.offset().top-(parseInt(a.css("margin-top"),10)||0)-q,
u=a.outerHeight(!0),r=a.css("float"),h&&h.css({width:a.outerWidth(!0),height:u,display:a.css("display"),"vertical-align":a.css("vertical-align"),"float":r}),e))return l()};x();if(u!==C)return D=void 0,c=q,z=E,l=function(){var b,l,e,k;if(!G&&(e=!1,null!=z&&(--z,0>=z&&(z=E,x(),e=!0)),e||A.height()===I||x(),e=f.scrollTop(),null!=D&&(l=e-D),D=e,m?(w&&(k=e+u+c>C+n,v&&!k&&(v=!1,a.css({position:"fixed",bottom:"",top:c}).trigger("sticky_kit:unbottom"))),e<F&&(m=!1,c=q,null==p&&("left"!==r&&"right"!==r||a.insertAfter(h),
h.detach()),b={position:"",width:"",top:""},a.css(b).removeClass(t).trigger("sticky_kit:unstick")),B&&(b=f.height(),u+q>b&&!v&&(c-=l,c=Math.max(b-u,c),c=Math.min(q,c),m&&a.css({top:c+"px"})))):e>F&&(m=!0,b={position:"fixed",top:c},b.width="border-box"===a.css("box-sizing")?a.outerWidth()+"px":a.width()+"px",a.css(b).addClass(t),null==p&&(a.after(h),"left"!==r&&"right"!==r||h.append(a)),a.trigger("sticky_kit:stick")),m&&w&&(null==k&&(k=e+u+c>C+n),!v&&k)))return v=!0,"static"===g.css("position")&&g.css({position:"relative"}),
a.css({position:"absolute",bottom:d,top:"auto"}).trigger("sticky_kit:bottom")},y=function(){x();return l()},H=function(){G=!0;f.off("touchmove",l);f.off("scroll",l);f.off("resize",y);b(document.body).off("sticky_kit:recalc",y);a.off("sticky_kit:detach",H);a.removeData("sticky_kit");a.css({position:"",bottom:"",top:"",width:""});g.position("position","");if(m)return null==p&&("left"!==r&&"right"!==r||a.insertAfter(h),h.remove()),a.removeClass(t)},f.on("touchmove",l),f.on("scroll",l),f.on("resize",
y),b(document.body).on("sticky_kit:recalc",y),a.on("sticky_kit:detach",H),setTimeout(l,0)}};n=0;for(K=this.length;n<K;n++)d=this[n],J(b(d));return this}}).call(this);

if ( getInternetExplorerVersion() == -1) {
    document.addEventListener("DOMContentLoaded",function(){var e=function(){if("scrollingElement"in document)return document.scrollingElement;var a=document.documentElement,b=a.scrollTop;a.scrollTop=b+1;var c=a.scrollTop;a.scrollTop=b;return c>b?a:document.body}(),h=function(a){var b=e.scrollTop;if(2>a.length)a=-b;else if(a=document.querySelector(a)){a=a.getBoundingClientRect().top;var c=e.scrollHeight-window.innerHeight;a=b+a<c?a:c-b}else a=void 0;if(a)return new Map([["start",b],["delta",a]])},m=function(a){var b=
    a.getAttribute("href"),c=h(b);if(c){var d=new Map([["duration",800]]),k=performance.now();requestAnimationFrame(function l(a){d.set("elapsed",a-k);a=d.get("duration");var f=d.get("elapsed"),g=c.get("start"),h=c.get("delta");e.scrollTop=Math.round(h*(-Math.pow(2,-10*f/a)+1)+g);d.get("elapsed")<d.get("duration")?requestAnimationFrame(l):(history.pushState(null,null,b),e.scrollTop=c.get("start")+c.get("delta"))})}},n=function b(c,d){var e=c.item(d);e.addEventListener("click",function(b){b.preventDefault();
    m(e)});if(d)return b(c,d-1)},f=document.querySelectorAll("a.scroll"),g=f.length-1;0>g||n(f,g)});
}


  $(document).ready(function(){
    // initialize sticky bar
    $("#stickyBar").stick_in_parent();

    $('body').scrollspy({ target: '#stickyBar' });
  });

</script>

<?php get_footer(); ?>