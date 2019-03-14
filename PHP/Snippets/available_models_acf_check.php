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