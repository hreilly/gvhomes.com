From Floor Plans:

<!-- Check for available models -->

<?php 

$models = array(
    'post_type' => 'communities',
    'meta_query' => array(
        array(
            'key' => 'models_available',
            'value' => '"' . get_the_ID() . '"',
            'compare' => 'LIKE'
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

From Communities:

<!-- Check for available models -->

<?php

$models = get_field( 'models_available' );

?>

<style>
    .model-plan::after{
        content: ','
    }
    .model-plan:last-of-type::after{
        content: ' '
    }
</style>

<?php if( $models ): ?>

    <h3>Models Available</h3>
    <p>

    <?php foreach( $models as $model ): ?>

        <a href="<?php echo get_permalink( $model->ID ); ?>" class="model-plan"><?php echo get_the_title( $model->ID ); ?></a>
        
    <?php endforeach; ?>

    </p>

<?php endif; ?>