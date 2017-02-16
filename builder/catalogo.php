<section class="catalog">
<?php
$args = array(
    'number'     => -1,
    'orderby'    => 'title',
    'order'      => 'ASC',
    'hide_empty' => 0,
);
$product_categories = get_terms( 'product_cat', $args );
foreach ( $product_categories as $product_category ) {
    echo '<h4><a href="' . get_term_link( $product_category ) . '">' . $product_category->name . '</a></h4>';
    $args = array(
        'posts_per_page' => -1,
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                // 'terms' => 'white-wines'
                'terms' => $product_category->slug
            )
        ),
        'post_type' => 'product',
        'orderby' => 'title,'
    );
    $products = new WP_Query( $args );
    echo "<ul>";
    while ( $products->have_posts() ) {
        $products->the_post();
        ?>
        <li>
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </li>
        <?php
    }
    echo "</ul>";
}
?>
</section>
