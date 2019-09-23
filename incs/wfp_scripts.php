<?php

// register jquery and style on initialization
function wfp_add_scripts() {
    wp_enqueue_script( 'jDex', plugins_url('js/wfp_index.js', __FILE__), array( 'jquery' ), '1.0.0', true );

    wp_register_style( 'iStyle', plugins_url('css/wfp_style.css', __FILE__), false,  '1.0.0', 'all');
}

// use the registered jquery and style above
add_action('wp_enqueue_scripts', 'wfp_add_scripts');


?>
