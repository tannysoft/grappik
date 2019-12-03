<?php
/**
 * Add Backend styles for Gutenberg.
 */
add_action('admin_enqueue_scripts', 'seed_add_gutenberg_assets');
function seed_add_gutenberg_assets() {
    wp_enqueue_style('s-gutenberg', get_theme_file_uri('/css/wp-gutenberg.css'), false);
    wp_enqueue_script('s-fkt', get_theme_file_uri('/js/flickity.js'), array(), '2.2.1', true);
    wp_enqueue_script('s-blocks', get_theme_file_uri('/js/wp-blocks.js'), array(), '1.0.0', true);
}


/**
 * Custom Block Category
 * https://developer.wordpress.org/block-editor/developers/filters/block-filters/#managing-block-categories
 */
function seed_plugin_block_categories( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'seedthemes',
                'title' => __( 'SeedThemes', 'seed' ),
            ),
        )
    );
}
add_filter( 'block_categories', 'seed_plugin_block_categories', 10, 2 );


/**
 * Gutenberg layout class
 * @link https://www.billerickson.net/change-gutenberg-content-width-to-match-genesis-layout/
 *
 * @param string $classes
 * @return string
 */
function seed_gutenberg_layout_class( $classes ) {
	$screen = get_current_screen();
	if( ! $screen->is_block_editor() ) {
        return $classes;
    }

    $layout = false;
	$post_id = isset( $_GET['post'] ) ? intval( $_GET['post'] ) : false;
    if( $post_id ) {
        $layout = 's-type-' . get_post_type() ;
    }
	
	$classes .= ' ' . $layout . ' ';
	return $classes;
}
add_filter( 'admin_body_class', 'seed_gutenberg_layout_class' );



/**
 * ACF Blocks
 */
function register_acf_block_types() {
    acf_register_block_type(array(
        'name'              => 'post-grid',
        'title'             => __('Post Grid'),
        'description'       => __('Custom Post Grid from SeedThemes.'),
		'render_template'   => 'template-parts/blocks/post-grid.php',
        'category'          => 'seedthemes',
        'icon'              => 'screenoptions',
        'keywords'          => array( 'post', 'grid', 'postgrid', 'seed'  ),
    ));
    acf_register_block_type(array(
        'name'              => 'post-slider',
        'title'             => __('Post Slider'),
        'description'       => __('Custom Post Grid from SeedThemes.'),
		'render_template'   => 'template-parts/blocks/post-slider.php',
        'category'          => 'seedthemes',
        'icon'              => 'slides',
        'keywords'          => array( 'post', 'slider', 'postslider', 'seed' ),
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}