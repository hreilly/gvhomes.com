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
    }
    .pricing-title {
        text-transform: none;
        margin-bottom: 40px;
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
    .pricing-row-plan {
        width: 32%;
        text-transform: none;
        font-size: 1.8rem;
        font-weight: 900;
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

            $posts = get_field('available_floorplans');

            if( $posts ): ?>

                <?php 

                // Loop
                
                foreach( $posts as $p ): 
                    
                // Vars

                $commId = get_the_ID();
                $commName = get_the_title($commId);
                $id = $p->ID;
                $name = get_the_title($id);
                $starting_price = getFloorplanPrice($name, $commName);
                $planType = get_field('floorplan_type');
                ?>

                <?php if ( $planType = 'Traditional' ) : ?>

                    <div class="pricing-row">
                        <h2 class="pricing-row-plan"><a href="/floorplans/<?php echo get_the_title( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a></h2>
                        <p class="pricing-row-details"><?php the_field( 'f_floorplan_size', $p->ID ); ?> Sq. Ft.<br><?php the_field( 'f_number_of_bedrooms', $p->ID ); ?> Bedrooms | <?php the_field( 'f_number_of_bathrooms', $p->ID ); ?> Bathrooms <br><?php the_field( 'f_number_of_garages', $p->ID ); ?> Car Garage</p>
                        <h3 class="pricing-row-price">
                            <?php if ($starting_price) : ?>Starting at: <br><strong><?php echo $starting_price; ?></strong>*<?php endif; ?>
                        </h3>
                    </div>

                <?php elseif ( $planType = 'Canvas' ) : ?>



                <?php elseif ( $planType = 'Estates' ) : ?>



                <?php else : ?>



                <?php endif; ?>

                <?php endforeach; ?>

            <?php endif; ?>

            <!-- End Available Floorplans -->

        <?php endwhile; ?>

    <?php endif; ?>

</div>

<?php wp_footer(); ?>
</body>
</html>