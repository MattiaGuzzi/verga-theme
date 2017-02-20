/**
* Echos the SKU for the product when used on a single product page
* Can optionally pass in the ID to echo the SKU for a product elsewhere
* Use [wc_sku] or [wc_sku id="ID"]
* Tutorial: http://www.skyverge.com/blog/output-woocommerce-sku/
**/
<?php

function skyverge_get_product_sku( $atts ) {

global $product;

$atts = shortcode_atts( array(
'id'  =>  '',
), $atts );

// If no id, we're probably on a product page already
if ( empty( $atts['id'] ) ) {

$sku = $product->get_sku();

} else {

//get which product from ID we should display a SKU for
$product = wc_get_product( $atts['id'] );
$sku = $product->get_sku();

}

ob_start();

//Only echo if there is a SKU
if ( !empty( $sku ) ) {
echo $sku;
}

return ob_get_clean();

}
add_shortcode( 'wc_sku', 'skyverge_get_product_sku' );