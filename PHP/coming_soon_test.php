<?php
// Template Name: Coming Soon Test
/**
 * Working template for re-structured individual floorplans.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
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
    .repeater-row:nth-of-type(1) {
        border-top: 1px solid #d2d2d2;
    }
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
</style>

<div class="main-content-container floorplan-container">

<!-- Coming Soon Query -->

    <div style="padding-top: 50px; margin:auto;">

        <?php 

        $args = array(
            'posts_per_page' => -1,
            'post_type'      => 'property',
            'orderby'        => 'sq_ft',
            'order'          => 'ASC',
            'meta_query'     => array(
                'relation'   => 'AND',
                'clean_price'  => array(
                    'key'      => 'clean_price',
                    'compare'  => 'EXISTS'
                ),
                'coming_soon'  => array(
                    'key'      => 'coming_soon',
                    'value'    => 1
                ),
                'sq_ft'      => array(
                    'key'      => 'clean_sqft',
                    'compare'  => 'EXISTS'
                )
            )
        );

        $the_query = new WP_Query( $args );

        ?>

        <?php if( $the_query->have_posts() ): ?>

            <h3>Coming Soon:</h3>
            <div class="page-divider-gradient" style="padding-top: 5px;"></div>
            <p>These homes are in the early stages of construction, meaning you can still select a number of finishes and custom options. Get on the fast track to a home that's uniquely your own. Contact an agent to learn more.</p>

            <div class="repeater-rows-container" style="padding-bottom: 40px;">

                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                <?php 

                // define 'property_parent_community' post object variable for calling title from parent community (used for search filter)

                $parent_post_object = get_field('property_parent_community');
                $plan_post_object = get_field('floorplan');

                ?>

                <!-- MOVE-IN READY LISTINGS -->

                <div class="repeater-row">
                    <div class="repeater-row-image">
                        <?php if ( get_the_post_thumbnail() ) : ?>
                            <img class="object-fit-img" src="<?php the_post_thumbnail_url( "medium" ); ?>" width="100%" height="100%" alt="<?php echo get_the_title($plan_post_object->ID); ?> <?php echo get_field('elevation'); ?>" />
                        <?php else :?>
                            <img src="https://s3-us-west-1.amazonaws.com/gvhomes/images/copper_river_community_map.jpg">
                        <?php endif; ?>
                    </div>
                    <div class="repeater-row-content">
                        <div class="repeater-row-content-header">
                            <h4><span style="font-weight: 700; text-transform: none;"><?php echo get_the_title($plan_post_object->ID); ?></span><span style="font-weight: 400;"> &nbsp;|&nbsp; <?php echo get_field('price'); ?></span></h4>
                        </div>
                        <div class="repeater-row-content-subhead">
                            <?php echo get_field('elevation'); ?> &bull; <span style="text-transform: none;">Lot <?php echo get_field('lot'); ?></span>
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
                        <button onclick="tract<?php echo get_field('tract'); ?>lot<?php echo get_field('lot'); ?>()" href="#" data-featherlight="#ac-inquiry-form-16" data-featherlight-persist="false" class="subtle-button" style="cursor: pointer;
                        color: #ffffff;
                        box-sizing: border-box;
                        border-width: 0px;
                        border-style: none;">Contact an Agent</button>
                    </div>
                </div>

                <?php endwhile; ?>

                <!-- Functions for setting fields in Active Campaign form using data attributes and button clicks -->

                <script>

                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
                    
                    $plan_post_object = get_field('floorplan');
                    
                    ?>

                        // Loops through posts and creates a function associated with each button, then sets the value of the "Tract and Lot" field in the Active Campaign form using post meta.
                        function tract<?php echo get_field('tract'); ?>lot<?php echo get_field('lot'); ?>() {
                            document.getElementById('tractandlot').setAttribute('value','<?php echo get_field('tract'); ?> Lot <?php echo get_field('lot'); ?>');
                            var element = document.getElementById('plan_name_var');
                            element.innerHTML = '<?php echo get_the_title($plan_post_object->ID); ?>';
                        }

                    <?php endwhile; ?>

                </script>

                <!-- Coming Soon Form (hidden lightbox) -->

                <?php 

                // Get the current URI
                $pageuri = $_SERVER['REQUEST_URI'];
                // Get the previous page from a user's history
                $referrer = $_SERVER['HTTP_REFERER'];

                ?>

                <div style="display:none;">
                    <div id="ac-inquiry-form-16">
                        <form method="POST" action="https://granvillehomes.activehosted.com/proc.php" id="_form_16_" class="_form _form_16 _inline-form  _dark" novalidate>
                        <input type="hidden" name="u" value="16" />
                        <input type="hidden" name="f" value="16" />
                        <input type="hidden" name="s" />
                        <input type="hidden" name="c" value="0" />
                        <input type="hidden" name="m" value="0" />
                        <input type="hidden" name="act" value="sub" />
                        <input type="hidden" name="v" value="2" />
                        <div class="_form-content">
                            <div class="_form_element _x85408846 _full_width _clear" >
                            <div class="_form-title">
                                Get more information about this home.
                            </div>
                            </div>
                            <div class="_form_element _x87547384 _full_width _clear" >
                            <div class="_html-code">
                                <p>
                                If you'd like to learn more about this <span id="plan_name_var"></span> currently under construction, please fill out this form and an agent will contact you soon.
                                </p>
                            </div>
                            </div>
                            <div class="_form_element _x05349138 _full_width " >
                            <label class="_form-label">
                                Full Name
                            </label>
                            <div class="_field-wrapper">
                                <input type="text" name="fullname" placeholder="Type your name" />
                            </div>
                            </div>
                            <div class="_form_element _x32304360 _full_width " >
                            <label class="_form-label">
                                Email*
                            </label>
                            <div class="_field-wrapper">
                                <input type="text" name="email" placeholder="Type your email" required/>
                            </div>
                            </div>
                            <div class="_form_element _x61506501 _full_width " >
                            <label class="_form-label">
                                Phone (Opt.)
                            </label>
                            <div class="_field-wrapper">
                                <input type="text" name="phone" placeholder="Type your phone number" />
                            </div>
                            </div>
                            <div class="_form_element _field18 _full_width " >
                            <label class="_form-label">
                                Do you have additional questions?
                            </label>
                            <div class="_field-wrapper">
                                <textarea name="field[18]" placeholder="" style="height: 91px;" ></textarea>
                            </div>
                            </div>
                            <div class="_form_element _field24 _full_width " style="display: none;">
                            <label class="_form-label">
                                Tract & Lot
                            </label>
                            <div class="_field-wrapper">
                                <input type="text" id="tractandlot" name="field[24]" value="" placeholder="" />
                            </div>
                            </div>
                            <div class="_form_element _field25 _full_width " style="display: none;">
                            <label class="_form-label">
                                Lot #
                            </label>
                            <div class="_field-wrapper">
                                <input type="text" name="field[25]" value="" placeholder="" />
                            </div>
                            </div>
                            <div class="_form_element _field20 _full_width " style="display: none;" >
                            <label class="_form-label">
                                Current Page
                            </label>
                            <div class="_field-wrapper">
                                <input type="text" name="field[20]" value="<?php echo $pageuri; ?>" placeholder="" />
                            </div>
                            </div>
                            <div class="_form_element _field21 _full_width " style="display: none;" >
                            <label class="_form-label">
                                Referrer
                            </label>
                            <div class="_field-wrapper">
                                <input type="text" name="field[21]" value="<?php echo $referrer; ?>" placeholder="" />
                            </div>
                            </div>
                            <div class="_form_element _field22 _full_width " >
                            <input type="hidden" name="field[22]" value="" />
                            </div>
                            <div class="_button-wrapper _full_width">
                            <button id="_form_16_submit" class="_submit subtle-button" type="submit">
                                Submit
                            </button>
                            </div>
                            <div class="_clear-element">
                            </div>
                        </div>
                        <div class="_form-thank-you" style="display:none;">
                        </div>
                        <div class="_form-branding" style="display:none;">
                            <div class="_marketing-by">
                            Marketing by
                            </div>
                            <a href="http://www.activecampaign.com" class="_logo"></a>
                        </div>
                        </form>
                        <!-- Link to JS File -->
                        <script src="/wp-content/themes/understrap/js/ac-inquiry-form-16.js"></script>
                    </div>
                </div>

                <?php wp_reset_query();	?>

            </div>

        <?php endif; ?>

        <!-- SALES MESSAGE FORM -->

        <?php echo do_shortcode( '[customACform]' ); ?>

        <!-- Disclaimer -->

        <!-- These values are now universal and can be found in shortcodes.php -->
        <?php echo do_shortcode( '[siteDisclaimer]' ); ?>

    </div>

</div>

<?php get_footer(); ?>