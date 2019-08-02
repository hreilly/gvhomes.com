<?php
/**
 * The template for displaying all single promotion posts.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

<style>
    .promotion-content {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        width: 100%;
    }
    .promotion-primary-container {
        width: 65%;
        padding: 15px 50px 30px 0px;
        margin: 10px auto 30px auto;
    }
    .promotion-aside-container {
        width: 35%;
        margin: 30px 0px;
        padding: 40px;
        background-color: #fcfcfc;
        box-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        align-self: flex-start;
        flex-grow: 1;
        flex-shrink: 1;
    }
    .promotion-primary-header {
        padding: 10px 0px 5px 0px;
        margin-bottom: 30px;
        border-bottom: 3px solid #e8bf53;
        font-size: calc(.9vw + 1.5rem);
    }
    .promotion-primary-header h1 {
        font-size: calc(.9vw + 1.5rem);
    }
    .promotion-primary-subheader h4 {
        text-transform: none;
        font-weight: 600;
        margin-bottom: .8em;
        padding-right: 50px;
    }
    .promotion-primary-text p {
        line-height: 2em;
    }
    .promotion-aside-header {
        margin-bottom: 20px;
    }
    .promotion-aside-text {
        margin-bottom: 30px;
    }
    .promotion-aside-buttons {
        width: 70%;
        margin: auto;
    }
    .promotion-aside-action-button .subtle-button {
        width: 100%;
    }
    .promotion-aside-flyer-button .subtle-button {
        width: 100%;
        margin: 10px 0 0 0;
    }
    .promotion-terms-cond {
        display: block;
        font-style: italic;
        font-size: 10px;
        line-height: 1rem;
        margin: 60px 0px 20px 0px;
    }
    .on-light {
        color: #252425;
    }
    .main-content-container {
        max-width: 1370px;
        width: 100%;
        margin: auto;
    }
    .main-content-container h3 {
        font-size: calc(.9vw + 1rem);
    }
    @media (max-width: 1370px) {
        .promotion-primary-container {
            width: 65%;
            padding: 30px 50px 30px 30px;
            margin: 10px auto;
        }
        .promotion-aside-container {
            width: 35%;
            margin: 30px 30px 30px 0px;
            padding: 40px;
        }
    }
    @media (max-width: 1080px) {
        .promotion-content {
            flex-direction: column;
        }
        .promotion-primary-container {
            width: 80%;
            padding: 30px;
            margin: auto;
        }
        .promotion-aside-container {
            width: 70%;
            margin: 0 auto 50px auto;
            padding: 40px;
        }
    }
    @media (max-width: 600px) {
        .promotion-primary-container {
            width: 100%;
            padding: 30px;
        }
        .promotion-aside-container {
            width: 95%;
            margin: 0 auto 50px auto;
            padding: 40px;
        }
    }
</style>

<div class="main-content-container">
    <!-- This will display the image with the native ratio. 1600x600 (sized down to a max-width of 1370px) -->
    <img src="<?php the_post_thumbnail_url( "full" ); ?>">
    <div class="promotion-content">
        <div class="promotion-primary-container">
            <div class="promotion-primary-header">
                <?php if ( get_field('promo_header') ): ?>
                    <h1><?php the_field( 'promo_header' ); ?></h1>
                <?php endif; ?>
            </div>
            <div class="promotion-primary-subheader">
                <?php if ( get_field('promo_subheader') ): ?>
                    <h4><?php the_field( 'promo_subheader' ); ?></h4>
                <?php endif; ?>
            </div>
            <div class="promotion-primary-text">
                <?php if ( get_field('promo_description') ): ?>
                    <p><?php the_field( 'promo_description' ); ?></p>
                <?php endif; ?>
            </div>
            <div class="promotion-terms-cond">
                <?php if ( get_field('promo_terms_conditions') ): ?>
                    <p>*<?php the_field( 'promo_terms_conditions' ); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php if ( get_field('include_promo_aside') ): ?>
            <div class="promotion-aside-container">
                <div class="promotion-aside-header">
                    <?php if ( get_field('promo_aside_header') ): ?>
                        <h4><?php the_field( 'promo_aside_header' ); ?></h4>
                    <?php endif; ?>
                </div>
                <div class="promotion-aside-text">
                    <?php if ( get_field('promo_aside_description') ): ?>
                        <p><?php the_field( 'promo_aside_description' ); ?></p>
                    <?php endif; ?>
                </div>
                <div class="promotion-aside-buttons">
                    <div class="promotion-aside-action-button">
                        <?php if ( get_field('promo_action_button_link') ): ?>
                            <a class="subtle-button" href="<?php the_field( 'promo_action_button_link' ); ?>">
                                <?php if ( get_field('promo_action_button') ): ?>
                                    <?php the_field( 'promo_action_button' ); ?>
                                <?php endif; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="promotion-aside-flyer-button">
                        <?php if ( get_field('promo_flyer_button_link') ): ?>
                            <a class="subtle-button" href="<?php the_field( 'promo_flyer_button_link' ); ?>">
                                <?php if ( get_field('promo_flyer_button') ): ?>
                                    <?php the_field( 'promo_flyer_button' ); ?>
                                <?php endif; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <hr>
    <?php echo do_shortcode( '[customACform]' ); ?> 
</div>

<?php get_footer(); ?>