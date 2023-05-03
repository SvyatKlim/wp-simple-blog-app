<?php
if (function_exists('acf_register_block_type')) {
    add_action('acf/init', 'register_acf_block_types');
}

function register_acf_block_types()
{
    acf_register_block_type(
        array(
            'supports' => array( 'anchor' => true ),
            'name' => 'Slider Block',
            'title' => __('Slider Block','elvinci'),
            'render_template' => 'blocks/slider-block.php',
            'icon' => 'block-default',
            'keywords' => array('Slider Block'),
            'example' => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'image' => '<img src="' . get_template_directory_uri() . '/blocks/slider-block.jpg" style="width:100%;display: block; margin: 0 auto;">'
                    ),
                ),
            ),
        )
    );

    acf_register_block_type(
        array(
            'supports' => array( 'anchor' => true ),
            'name' => 'posts_grid_layout',
            'title' => __('Posts grid layout','elvinci'),
            'render_template' => 'blocks/posts-grid-layout-block.php',
            'icon' => 'block-default',
            'keywords' => array('Posts grid layout','grid','posts'),
            'example' => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'image' => '<img src="' . get_template_directory_uri() . '/blocks/posts-grid-layout-block.jpg" style="width:100%;display: block; margin: 0 auto;">'
                    ),
                ),
            ),
        )
    );
}
