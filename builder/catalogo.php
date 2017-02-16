<section class="catalog">
<?php
$args = array(
    'orderby'    => 'title',
    'orderby' => 'name',
    'hide_empty' => 0,
    'hierarchical' => false,
);
$product_categories = get_terms( 'product_cat', $args );
foreach ( $product_categories as $product_category ) {
   echo $product_category -> name;
}
?>
</section>
