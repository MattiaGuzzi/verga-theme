<section class="catalog">
    <?php
    $args = array(
        'orderby' => 'name',
        'hide_empty' => 0,
        'parent' => 0
    );
    $product_categories = get_terms('product_cat', $args);
    foreach ($product_categories as $product_category) {
        echo $product_category->name;

        $args = array(
            'orderby' => 'name',
            'hide_empty' => 0,
            'parent' => $product_category->term_id,
        );
        $subcategories = get_terms('product_cat', $args);
        foreach ($subcategories as $subcategory) {
            echo $subcategory->name;
        }
    }
    ?>
</section>
