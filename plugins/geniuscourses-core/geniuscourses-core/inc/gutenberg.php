<?php
function gcab_register_blocks(){

    if(!function_exists('register_block_type')){
        return;
    }

    wp_register_script('gc-about', plugins_url('/blocks/js/gc-about.js', __FILE__), ['wp-blocks','wp-element','wp-editor'],'1.0');
    wp_register_style('gc-about',  plugins_url('/blocks/css/gc-about.css', __FILE__), [],'1.0');

    register_block_type('gcab/gc-about',['style' => 'gc-about', 'editor_script' => 'gc-about' ]);
}
add_action('init','gcab_register_blocks');