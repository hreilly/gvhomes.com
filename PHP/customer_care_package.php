<?php
// Template Name: Customer Care Package
/**
 * The template to display pricing for various customer care packages.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

<style>

.services-flex {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;

    -webkit-flex-flow: row wrap;
    flex-flow: row wrap;
    justify-content: center;
    margin: auto;
    padding-bottom: 50px;
}
.services-flex-item {
    width: 18%;
    min-width: 200px;
    max-width: 700px;
    margin: 5px;
    background-color: #fcfcfc;
    box-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    flex: 1 0 auto;
    border-radius: 5px;
    text-align: center;
    padding: 30px;
    position: relative;
}
.services-flex-item h5, .services-flex-item p, .services-flex-item h3 {
    text-align: left;
}
.services-flex-item p {
    margin-bottom: 90px;
}
.services-flex-item h3 {
    font-weight: 700;
}
.flex-item-price {
    position: absolute;
    bottom: 20px;
}
.services-flex-item img {
    margin: auto;
    max-width: 80%;
    padding: 10px 10px 40px 10px;
}
.custom-lots-table-cell:nth-of-type(2) {
    text-align: right;
}
.custom-lots-table-headers {
    text-align: center;
    text-transform: uppercase;
}
#collapseOneStory .custom-lots-table-headers div:nth-of-type(2):before {
    content: '$1,245.00';
    padding-right: 10px;
    color: #b1b1b1;
    text-decoration: line-through;
}
#collapseTwoStory .custom-lots-table-headers div:nth-of-type(2):before {
    content: '$1,625.00';
    padding-right: 10px;
    color: #b1b1b1;
    text-decoration: line-through;
}
#collapseEstates .custom-lots-table-headers div:nth-of-type(2):before {
    content: '$1,895.00';
    padding-right: 10px;
    color: #b1b1b1;
    text-decoration: line-through;
}
@media screen and (max-width:1080px) {
    .services-flex-item {
        width: 30%;
        min-width: 250px;
    }
}
</style>

<!-- Featured Lead Image -->
<div class="full-width-bg-image" style="background-image: url(<?php the_post_thumbnail_url( "full" ); ?>); background-position: 0;"></div>

<!-- Limited width content -->
<div class="main-content-container">

    <!-- Note: Prices here are set in the base price fields on the admin page. -->

    <div class="vs-overview-text" style="padding-top: 80px;">
        <h2>Granville Homes Care Packages</h2>
        <p>Taking care of your home is an important part of maintaining your warranty, retaining your home's value, and increasing the longevity of crucial systems. With Granville's care packages, our Customer Care team takes the hassle out of home maintenance. Purchase single services on our a la carte menu, or bundle your services for even more savings.</p>
    </div>

    <div class="services-flex">
        <div class="services-flex-item">
            <img src="/wp-content/uploads/2018/12/customer_care_package_icon_roof.png" alt="House icon with crossed hammer and screwdriver in bottom right">
            <h5>Roof Clean-up &amp; Inspection</h5>
            <p>Includes cleaning debris off the roof and roof valleys, roof inspection, and resealing of roof jacks.</p>
            <div class="flex-item-price">
                <h5>Starting at:</h5>
                <h3>$<?php echo get_field( 'roof_base_price' ); ?><span style="font-weight: 400;">*</span></h3>
            </div>
        </div>
        <div class="services-flex-item">
            <img src="/wp-content/uploads/2018/12/customer_care_package_icon_leaf.png" alt="Simplified maple leaf icon">
            <h5>Rain Gutter Clean-up &amp; Inspection</h5>
            <p>Includes cleaning of rain gutters, adjusting pitch if necessary, sealing any leaks, and re-attaching gutters if necessary.</p>
            <div class="flex-item-price">
                <h5>Starting at:</h5>
                <h3>$<?php echo get_field( 'rain_gutter_base_price' ); ?><span style="font-weight: 400;">*</span></h3>
            </div>
        </div>
        <div class="services-flex-item">
            <img src="/wp-content/uploads/2018/12/customer_care_package_icon_hvac.png" alt="House icon with fan outline in the middle">
            <h5>HVAC Inspection &amp; Service</h5>
            <p>Includes replacement of HVAC air filters, testing of HVAC low voltage system, and inspection, cleaning, and lubrication of HVAC equipment.</p>
            <div class="flex-item-price">
                <h5>Starting at:</h5>
                <h3>$<?php echo get_field( 'hvac_base_price' ); ?><span style="font-weight: 400;">/unit*</span></h3>
            </div>
        </div>
        <div class="services-flex-item">
            <img src="/wp-content/uploads/2018/12/customer_care_package_icon_pipe.png" alt="U-bend pipe icon">
            <h5>Plumbing Inspection</h5>
            <p>Includes cleaning of sewer lines, inspection of toilets and under sinks for leaks, and inspection of all faucets and fixtures.</p>
            <div class="flex-item-price">
                <h5>Starting at:</h5>
                <h3>$<?php echo get_field( 'plumbing_base_price' ); ?><span style="font-weight: 400;">*</span></h3>
            </div>
        </div>
        <div class="services-flex-item">
            <img src="/wp-content/uploads/2018/12/customer_care_package_icon_water.png" alt="Single droplet of water icon">
            <h5>Tankless Water Heater Flush</h5>
            <p>Includes vinegar flush and cleaning to remove mineral build-up and ensure that system is running at full capacity.</p>
            <div class="flex-item-price">
                <h5>Starting at:</h5>
                <h3>$<?php echo get_field( 'tankless_base_price' ); ?><span style="font-weight: 400;">/unit*</span></h3>
            </div>
        </div>
    </div>

    <div class="page-divider-narrow">&nbsp;</div>

    <div class="vs-overview-text" style="padding-top: 80px;">
        <h3>Save up to <span style="font-weight: 700;">15%</span>, with packages starting at <span style="font-weight: 700;">$1,065</span><span style="font-weight: 400;">*</span></h3>
    </div>

<!-- Sum prices below must be updated in the CSS :before elements -->

    <!-- Single Story Pricing Table -->

    <div class="card" style="max-width: 1024px; margin: auto;">

        <div class="card-header" id="headingOneStory">
            <h5 class="mb-0">
            <button class="btn btn-link expanded" data-toggle="collapse" data-target="#collapseOneStory" aria-expanded="true" aria-controls="collapseOneStory" style="white-space: normal; color: #252425; text-decoration: none; width: 100%;">
                <div class="collapse-label">Single Story Traditional &amp; Canvas Homes&nbsp;</div>
            </button>
            </h5>
        </div>

        <div id="collapseOneStory" class="collapse show" aria-labelledby="headingOneStory">
            <div class="card-body">

                <div class="custom-lots-table">
                    
                    <?php 

                    $table = get_field( 'one_story_pricing' );
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

    <!-- End Single Story Pricing Table -->

    <!-- Two Story Pricing Table -->

    <div class="card" style="max-width: 1024px; margin: auto;">

        <div class="card-header" id="headingTwoStory">
            <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwoStory" aria-expanded="false" aria-controls="collapseTwoStory" style="white-space: normal; color: #252425; text-decoration: none; width: 100%;">
                <div class="collapse-label">Two Story Traditional &amp; Canvas Homes&nbsp;</div>
            </button>
            </h5>
        </div>

        <div id="collapseTwoStory" class="collapse" aria-labelledby="headingTwoStory">
            <div class="card-body">

                <div class="custom-lots-table">
                    
                    <?php 

                    $table = get_field( 'two_story_pricing' );
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

    <!-- End Two Story Pricing Table -->

    <!-- Estates Pricing Table -->

    <div class="card" style="max-width: 1024px; margin: auto;">

        <div class="card-header" id="headingEstates">
            <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEstates" aria-expanded="false" aria-controls="collapseEstates" style="white-space: normal; color: #252425; text-decoration: none; width: 100%;">
                <div class="collapse-label">Semi Custom Estates&nbsp;</div>
            </button>
            </h5>
        </div>

        <div id="collapseEstates" class="collapse" aria-labelledby="headingEstates">
            <div class="card-body">

                <div class="custom-lots-table">
                    
                    <?php 

                    $table = get_field( 'estates_pricing' );
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

    <!-- End Estates Pricing Table -->

    <!-- Disclaimer -->

    <div class="custom-lots-disclaimer" style="padding: 20px; max-width: 1024px; margin: auto; text-align: center;">*Price for single story Traditional and Canvas homes only. Please see appropriate pricing tables for two story and Estates plans. Costs subject to change at any time and may be affected by age and condition of home. Please contact Customer Care for full terms and conditions.</div>
    <p>&nbsp;</p>

    <div class="footer-cta-background">
        <div class="footer-cta-content">
            <div class="footer-cta-text">Have questions? Our team is here to help.</div>
            <div class="footer-cta-button"><a href="/customer-care/#cust-care-pack-contact" class="subtle-button">Contact Customer Care</a></div>
        </div>
    </div>
    <div style="height: 20px; background-color: #ffffff;"></div>

</div>

<?php get_footer(); ?>