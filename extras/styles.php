<?php
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
function clean_css() {
    wp_deregister_style( 'contact-form-7' );
}
add_action( 'wp_enqueue_scripts', 'clean_css');