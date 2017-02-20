<header class="header header--shrink">
    <a class="header__logo icon icon-pittogramma" href="<?= esc_url(home_url('/')); ?>">
    </a>
    <nav class="header__nav">

        <?php
        if (has_nav_menu('primary_navigation')) :
            /* wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'walker' => 'walker_texas_ranger']);*/
            bem_menu('primary_navigation', 'menu');
        endif;
        ?>
    </nav>
    <div class="header__preventivi">
        <a href="#" class="button">
            <label class="button__label"><?php _e('Preventivo', 'verga') ?></label>
        </a>
    </div>
    <div class="menu">
        <div class="menu__header">
            <div class="menu__header-title"><?php _e('catalogo', 'verga') ?></div>
            <div class="menu__header-button"><a href="#" class="button">
                    <label class="button__label"><?php _e('Preventivo', 'verga') ?></label>
                </a></div>
        </div>
        <div class="menu__left">
            <?php   $args = array(
                'orderby' => 'name',
                'hide_empty' => 0,
                'parent' => 0
            );
            $product_categories = get_terms('product_cat', $args);
            foreach ($product_categories as $product_category) {
            $thumbnail_id = get_woocommerce_term_meta($product_category->term_id, 'thumbnail_id', true);
            $image = wp_get_attachment_image_src($thumbnail_id, 'full')[0]; ?>
            <h2 class="block__title block__title--grow-md-top" data-attribute="<?php echo $product_category->name; ?>"><?php echo $product_category->name; ?></h2>
            <?php } ?>
        </div>
        <div class="menu__right"></div>
    </div>
</header>
