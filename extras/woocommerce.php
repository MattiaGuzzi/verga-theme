<?php
// Remove the product rating display on product loops
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );


remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );


remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

function item_before_img (){
    ?> <span class="item-thumbnail"><span class="button">
        <span class="button__label"><?php _e('scopri', 'verga'); ?></span>
    </span>
<?php
}

add_action( 'woocommerce_before_shop_loop_item', 'item_before_img', 11);


function close_tag () {
    echo '</span>';
}
add_action( 'woocommerce_before_shop_loop_item_title', 'close_tag', 11);

function header_title () {
    global $product;
    $terms =  wp_get_post_terms( get_the_ID(), 'product_cat', array('orderby' => 'term_group', 'order' => 'ASC'));
    echo '<div class="header-title">';
    $i = 0;
    echo '<span>';
    foreach ($terms as $term) {
        $sep = ($i == 0)? ' / ' : '';
        echo '<a href="'.get_term_link($term->term_id).'">'. $term->name.'</a>'.$sep;
        $i++;
    }
    echo '</span>';
    if ($product->get_sku()) {
        echo '<div class="product-meta">Cod: ' . $product->get_sku() . '</div>';
    }
    echo '</div>';
}
add_action( 'woocommerce_single_product_summary', 'header_title', 4);


add_action('woocommerce_single_product_summary','woocommerce_output_product_data_tabs', 11);
remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs', 10);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating', 10);

remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta', 40);



add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
add_filter( 'woocommerce_product_additional_information_heading', '__return_false' );

function woo_remove_product_tabs( $tabs ) {


    unset( $tabs['reviews'] ); 			// Remove the reviews tab

    return $tabs;

}

