<section class="catalog">
    <?php
    $args = array(
        'orderby' => 'name',
        'hide_empty' => 0,
        'parent' => 0
    );
    $product_categories = get_terms('product_cat', $args);
    foreach ($product_categories as $product_category) {
        $thumbnail_id = get_woocommerce_term_meta($pterm->term_id, 'full', true);
        // get the image URL for parent category
        $image = wp_get_attachment_url($product_category->term_id);?>

        <div class="catalog__item" style="background-image: url('<?php echo $image  ?>')">
       <?php echo $product_category->name;

        $args = array(
            'orderby' => 'name',
            'hide_empty' => 0,
            'parent' => $product_category->term_id,
        );
        $subcategories = get_terms('product_cat', $args);
        foreach ($subcategories as $subcategory) {
            echo $subcategory->name;
        }
       ?>
            </div>
    <?php
    }
    ?>
</section>
