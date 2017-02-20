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
    <div class="main-menu">
        <div class="main-menu__header  main-menu__header--shrink">
            <div class="main-menu__header--title"><?php _e('catalogo', 'verga') ?></div>
            <div class="main-menu__header--button main-menu__header--button-close"><a href="#" class="button">
                    <label class="button__label"><?php _e('Chiudi', 'verga') ?></label>
                </a></div>
        </div>
        <ul class="main-menu__left">
            <?php   $args = array(
                'orderby' => 'name',
                'hide_empty' => 0,
                'parent' => 0
            );
            $product_categories = get_terms('product_cat', $args);
            foreach ($product_categories as $product_category) {?>
                <?php $link = get_terms_link( (int)$product_category->term_id, 'product_cat' ) ?>
            <li class="main-menu__left--list main-menu__left--shrink" data-attribute="<?php echo $product_category->name; ?>"><a href="<?php  echo $link ?>"><span><?php echo $product_category->name; ?></span></a></li>
            <?php } ?>
        </ul>

        <div class="main-menu__right">
        <?php   $args = array(
            'orderby' => 'name',
            'hide_empty' => 0,
            'parent' => 0
        );
        $product_categories = get_terms('product_cat', $args);
        foreach ($product_categories as $product_category) {?>
        <div class="main-menu__right--list" data-attribute="<?php echo $product_category->name; ?>">
            <?php
            $args = array(
                'orderby' => 'name',
                'hide_empty' => 0,
                'parent' => $product_category->term_id,
            );
            $subcategories = get_terms('product_cat', $args);
            foreach ($subcategories as $subcategory) {
                echo '<span class="item item--shrink"><a href="' . get_category_link($subcategory->term_id) . '">' . $subcategory->name . '</a></span>';
            }
            ?>
        </div>
        <?php } ?>
        </div>
    </div>
</header>
