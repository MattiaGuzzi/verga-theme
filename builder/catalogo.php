<section class="catalog">
<?php
$args = array(
    'orderby' => 'name',
    'hide_empty' => 0,
);
$product_categories = get_terms( 'product_cat', $args );
foreach ( $product_categories as $product_category ) {
   echo $product_category -> name;
}
?>
</section>
