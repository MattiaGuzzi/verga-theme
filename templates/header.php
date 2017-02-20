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
    <div class="mainmenu">
        <div class="mainmenu__header  mainmenu__header--shrink">
            <div class="mainmenu__header--title"><?php _e('catalogo', 'verga') ?></div>
            <div class="mainmenu__header--button mainmenu__header--button-close"><a href="#" class="button">
                    <label class="button__label"><?php _e('Chiudi', 'verga') ?></label>
                </a></div>
        </div>
        <div class="mainmenu__left">
            <?php   $args = array(
                'orderby' => 'name',
                'hide_empty' => 0,
                'parent' => 0
            );
            $product_categories = get_terms('product_cat', $args);
            foreach ($product_categories as $product_category) {?>
            <h3 class="menu__left--list menu__left--shrink" data-attribute="<?php echo $product_category->name; ?>"><?php echo $product_category->name; ?></h3>
            <?php } ?>
        </div>

        <div class="mainmenu__right">
        <?php   $args = array(
            'orderby' => 'name',
            'hide_empty' => 0,
            'parent' => 0
        );
        $product_categories = get_terms('product_cat', $args);
        foreach ($product_categories as $product_category) {?>
        <div class="mainmenu__right--list" data-attribute="<?php echo $product_category->name; ?>">
            <?php
            $args = array(
                'orderby' => 'name',
                'hide_empty' => 0,
                'parent' => $product_category->term_id,
            );
            $subcategories = get_terms('product_cat', $args);
            foreach ($subcategories as $subcategory) {
                echo '<span class="item"><a href="' . get_category_link($subcategory->term_id) . '">' . $subcategory->name . '</a></span>';
            }
            ?>
        </div>
        <?php } ?>
        </div>
    </div>
</header>
