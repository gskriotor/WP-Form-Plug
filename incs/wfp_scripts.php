<?php

// register jquery and style on initialization
add_action('init', 'register_script');
function register_script() {
      wp_enqueue_script( 'jDex', plugins_url('/js/index.js', __FILE__), array( 'jquery' ), '1.0.0', true );

    wp_register_style( 'iStyle', plugins_url('/css/style.css', __FILE__), false,  '1.0.0', 'all');
}

// use the registered jquery and style above
add_action('wp_enqueue_scripts', 'enqueue_style');

function enqueue_style(){
   wp_enqueue_script('jDex');

   wp_enqueue_style( 'iStyle' );
}


?>
