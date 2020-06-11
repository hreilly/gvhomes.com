<!--Printable price sheet template

<logo>

<homes>

<contact>

<disclaimer>

<date>-->

<?php
/**
 * Template Name: Price Sheet Template
 *
 * Template for displaying a community price sheet.
 *
 * @package understrap
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title"
		content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body>

<style>
    .pricing-wrapper {
        max-width: 820px;
        width: 100%;
        margin: auto;
        padding: 20px;
    }
    .pricing-title {
        text-transform: none;
    }
    .pricing-row {
        display: flex;
        flex-direction: row;
        border-bottom: 1px solid #757575;
        margin-bottom: 20px;
    }
    .pricing-row:last-of-type {
        border-bottom: 0px;
    }
    .pricing-traditional:first-of-type, .pricing-canvas:first-of-type, .pricing-estates:first-of-type {
        margin-top: 50px;
        border-top: 10px solid #e8bf53;
        padding-top: 20px;
    }
    .pricing-row-plan {
        width: 32%;
        text-transform: none;
        font-size: 1.8rem;
        font-weight: 900;
        margin-right: 20px;
    }
    .pricing-row-details {
        width: 40%;
    }
    .pricing-row-price {
        width: 28%;
        text-transform: none;
        text-align: right;
        font-size: 1.4rem;
    }
    .pricing-phone {
        font-weight: 900;
        text-align: center;
        text-transform: none;
    }
    .pricing-disclaimer {
        font-style: italic;
        margin: 30px 0px;
    }
    .pricing-licenses {
        font-weight: bold;
        text-align: center;
    }
    .print-button {
        text-align: center;
        margin-bottom: 40px;
    }
    .print-button button {
        text-align: center; 
        margin: auto; 
        cursor: pointer;
    }
    @media screen and (max-width: 600px) {
        .print-button {
            display: none;
        }
    }
</style>

<div class="pricing-wrapper">

    <?php

    $commMaster = get_the_title();

    $args = array(
        'posts_per_page'     => 1,
        'post_type'		     => 'communities',
        'title'              => $commMaster
    );

    $the_query = new WP_Query( $args );

    ?>
    <img src="" alt="" />

    <h1 class="pricing-title">Plans Available at: <br><span style="font-weight: 900;"><?php echo $commMaster; ?></span></h1>

    <?php if( $the_query->have_posts() ): ?>

        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <!-- Available Floorplans -->

            <?php

            $plan_list = get_field('available_floorplans');

			// Sorts plan_list array by plan_name value in post_object (hreilly)
			usort($plan_list, function($a, $b) {
				return strcmp($a->plan_name,$b->plan_name);
			});


            if( $plan_list ): ?>

            <div>

                <?php

                // Loop
                
                foreach( $plan_list as $p ): 
                    
                // Vars

                $commId = get_the_ID();
                $commName = get_the_title($commId);
                $id = $p->ID;
                $name = get_the_title($id);
                $starting_price = getFloorplanPrice($name, $commName);
                $planType = get_field('floorplan_type', $id );

                ?>

                    <?php if ( $planType == 'Traditional' ) : ?>

                        <div class="pricing-row pricing-traditional">
                            <h2 class="pricing-row-plan"><a href="<?php echo get_the_permalink( $p->ID ); ?>" target="_PARENT"><?php echo get_the_title( $p->ID ); ?></a></h2>
                            <p class="pricing-row-details"><strong><?php the_field( 'f_floorplan_size', $p->ID ); ?></strong> <span aria-label="square feet">Sq. Ft.</span><br><?php the_field( 'f_number_of_bedrooms', $p->ID ); ?> Bedrooms | <?php the_field( 'f_number_of_bathrooms', $p->ID ); ?> Bathrooms <br><?php the_field( 'f_number_of_garages', $p->ID ); ?> Car Garage</p>
                            <h3 class="pricing-row-price">
                                <?php if ($starting_price) : ?>Starting at: <br><strong><?php echo $starting_price; ?></strong><?php endif; ?>
                            </h3>
                        </div>

                    <?php endif; ?>

                <?php endforeach; ?>

                </div>

                <div>

                <?php 

                // Loop
                
                foreach( $plan_list as $p ): 
                    
                // Vars

                $commId = get_the_ID();
                $commName = get_the_title($commId);
                $id = $p->ID;
                $name = get_the_title($id);
                $starting_price = getFloorplanPrice($name, $commName);
                $planType = get_field('floorplan_type', $id );

                ?>

                    <?php if ( $planType == 'Canvas' ) : ?>

                        <div class="pricing-row pricing-canvas">
                            <h2 class="pricing-row-plan"><a href="<?php echo get_the_permalink( $p->ID ); ?>" target="_PARENT"><?php echo get_the_title( $p->ID ); ?></a></h2>
                            <p class="pricing-row-details"><strong><?php the_field( 'f_floorplan_size', $p->ID ); ?></strong> <span aria-label="square feet">Sq. Ft.</span><br><?php the_field( 'f_number_of_bedrooms', $p->ID ); ?> Bedrooms | <?php the_field( 'f_number_of_bathrooms', $p->ID ); ?> Bathrooms <br><?php the_field( 'f_number_of_garages', $p->ID ); ?> Car Garage</p>
                            <h3 class="pricing-row-price">
                                <?php if ($starting_price) : ?>Starting at: <br><strong><?php echo $starting_price; ?></strong><?php endif; ?>
                            </h3>
                        </div>

                    <?php endif; ?>

                <?php endforeach; ?>

                </div>

                <div>

                <?php 

                // Loop
                
                foreach( $plan_list as $p ): 
                    
                // Vars

                $commId = get_the_ID();
                $commName = get_the_title($commId);
                $id = $p->ID;
                $name = get_the_title($id);
                $starting_price = getFloorplanPrice($name, $commName);
                $planType = get_field('floorplan_type', $id );

                ?>

                    <?php if ( $planType == 'Estates' ) : ?>

                        <div class="pricing-row pricing-estates">
                            <h2 class="pricing-row-plan"><a href="<?php echo get_the_permalink( $p->ID ); ?>" target="_PARENT"><?php echo get_the_title( $p->ID ); ?></a></h2>
                            <p class="pricing-row-details"><strong><?php the_field( 'f_floorplan_size', $p->ID ); ?></strong> <span aria-label="square feet">Sq. Ft.</span><br><?php the_field( 'f_number_of_bedrooms', $p->ID ); ?> Bedrooms | <?php the_field( 'f_number_of_bathrooms', $p->ID ); ?> Bathrooms <br><?php the_field( 'f_number_of_garages', $p->ID ); ?> Car Garage</p>
                            <h3 class="pricing-row-price">
                                <?php if ($starting_price) : ?>Starting at: <br><strong><?php echo $starting_price; ?></strong><?php endif; ?>
                            </h3>
                        </div>

                    <?php endif; ?>

                <?php endforeach; ?>

                </div>

            <?php endif; ?>

            <!-- End Available Floorplans -->

        <?php endwhile; ?>

    <h4 class="pricing-phone">Office Number: <?php echo get_field('model_center_phone'); ?></h4>

    <?php endif; ?>

    <p class="pricing-disclaimer">Pricing only valid at the listed community. Granville Homes reserves the right to alter prices, features, floorplans, elevations and availability at any time without notice or obligation. Model homes feature optional selections which may increase the price above starting price. Square Footage is approximate and some selections alter square footage and/or have lot requirements resulting in additional cost. See an agent for most accurate and current information.</p>
    <p class="pricing-licenses">RE License # 01258537 &nbsp;|&nbsp; Contractor License # 586845 &nbsp;&nbsp;<img src="/wp-content/uploads/2019/11/equal-housing-150x150-dark.png" alt="Equal Housing Opportunity" style="max-width: 30px;"></p>
    <div class="print-button">
        <button onclick="printPage()" role="print">Print This Page &#128438;</button>
    </div>

</div>

<?php wp_footer(); ?>

<script>
function printPage() {
  window.print();
}
</script>

</body>
</html>