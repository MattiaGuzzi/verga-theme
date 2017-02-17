<section class="catalog">
    <?php
    $args = array(
        'orderby' => 'name',
        'hide_empty' => 0,
        'parent' => 0
    );
    $product_categories = get_terms('product_cat', $args);
    foreach ($product_categories as $product_category) {
        $thumbnail_id = get_woocommerce_term_meta($product_category->term_id, 'thumbnail_id', true);
        $image = wp_get_attachment_image_src($thumbnail_id, 'full')[0];?>

        <div class="catalog__item" style="background-image: url('<?php echo $image  ?>')">
            <div class="block block--grow-lg block--shrink">
                <h2 class="block__title block__title--grow-md-top"><?php echo $product_category->name;?></h2>
                <p class="block__description block__description--grow-md"><?php echo $product_category->description;?></p>
                <?php
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
        </div>
    <?php
    }
    ?>
</section>
