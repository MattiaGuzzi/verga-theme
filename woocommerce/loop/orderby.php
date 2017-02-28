<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     2.2.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

?>

<div class="sub-menu">
    <div class="sub-menu__header  sub-menu__header--shrink">
        <div class="sub-menu__header--title"><?php _e('prodotti', 'verga') ?></div>
        <div class="sub-menu__header--button sub-menu__header--button-close">
            <a href="#" class="button">
                <label class="button__label"><?php _e('Chiudi', 'verga') ?></label>
            </a>
        </div>
    </div>
    <div class="sub-menu__list sub-menu__list--grid">

        <?php if (get_queried_object()->parent == 0) {
            $args = array(
                'orderby' => 'name',
                'hide_empty' => 0,
                'child_of' => get_queried_object()->term_id,
            );
        } else {
            $args = array(
                'orderby' => 'name',
                'hide_empty' => 0,
                'child_of' => get_queried_object()->parent,
            );
        } ?>
        <?php

        $subcategories = get_terms('product_cat', $args);
        foreach ($subcategories as $subcategory) {
            echo '<span class="item item--shrink item--shrink__cell-s6"><a href="' . get_category_link($subcategory->term_id) . '">' . $subcategory->name . '</a></span>';
        }
        ?>
    </div>
</div>


<div class="order-block order-block--shrink order-block--grow-lg">
    <div class="order-block__categories">
        <div class="button--reverse">
            <span class="button__label"><?php _e('area', 'verga'); ?></span>
        </div>
    </div>

    <h1 class="order-block__title"><?php woocommerce_page_title(); ?></h1>


    <!-- <form class="order-block__ordering" method="get">
        <select name="orderby" class="orderby">
            <?php /*foreach ($catalog_orderby_options as $id => $name) : */ ?>
                <option
                    value="<?php /*echo esc_attr($id); */ ?>" <?php /*selected($orderby, $id); */ ?>><?php /*echo esc_html($name); */ ?></option>
            <?php /*endforeach; */ ?>
        </select>-->
    <div class="post-per-page">
        <div class="first-level">
            <div class="current-value">
                <span>post per page</span>
                <div class="current-value__list" data-placeholder="post per page">
                    <ul class="order-block__ppp">
                        <li class="order-block__item" data-ppp="8"><?php _e('Mostra 8', 'verga'); ?></li>
                        <li class="order-block__item" data-ppp="16"><?php _e('Mostra 16', 'verga'); ?></li>
                        <li class="order-block__item" data-ppp="24"><?php _e('Mostra 24', 'verga'); ?></li>
                        <li class="order-block__item" data-ppp="-1"><?php _e('Tutti', 'verga'); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- --><?php
    /*        // Keep query string vars intact
            foreach ($_GET as $key => $val) {
                if ('orderby' === $key || 'submit' === $key) {
                    continue;
                }
                if (is_array($val)) {
                    foreach ($val as $innerVal) {
                        echo '<input type="hidden" name="' . esc_attr($key) . '[]" value="' . esc_attr($innerVal) . '" />';
                    }
                } else {
                    echo '<input type="hidden" name="' . esc_attr($key) . '" value="' . esc_attr($val) . '" />';
                }
            }
            */ ?>

    <!--</form>-->

</div>