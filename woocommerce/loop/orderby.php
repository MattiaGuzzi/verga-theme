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
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<div class="sub-menu">
	<div class="sub-menu__header  sub-menu__header--shrink">
		<div class="sub-menu__header--title"><?php _e('catalogo', 'verga') ?></div>
		<div class="sub-menu__header--button sub-menu__header--button-close"><a href="#" class="button">
				<label class="button__label"><?php _e('Chiudi', 'verga') ?></label>
			</a></div>
	</div>

	<?php
		$args = array(
		'orderby' => 'name',
		'hide_empty' => 0,
		'parent' => 0,
	);
	$product_categories = get_terms('product_cat', $args);
	foreach ($product_categories as $product_category) {?>
		<div class="main-menu__right--list" data-attribute="<?php echo $product_category->name; ?>">
			<?php
			$args = array(
				'orderby' => 'name',
				'hide_empty' => 0,
				'parent' => get_the_ID(),
			);
			$subcategories = get_terms('product_cat', $args);
			foreach ($subcategories as $subcategory) {
				echo '<span class="item item--shrink"><a href="' . get_category_link($subcategory->term_id) . '">' . $subcategory->name . '</a></span>';
			}
			?>
		</div>
	<?php } ?>
</div>


	<?php /*  $args = array(
		'orderby' => 'name',
		'hide_empty' => 0,
		'parent' => 0
	);
	$product_categories = get_terms('product_cat', $args);
	foreach ($product_categories as $product_category) {*/?><!--
		<div class="main-menu__right--list" data-attribute="<?php /*echo $product_category->name; */?>">
			<?php
/*			$args = array(
				'orderby' => 'name',
				'hide_empty' => 0,
				'parent' => $product_category->term_id,
			);
			$subcategories = get_terms('product_cat', $args);
			foreach ($subcategories as $subcategory) {
				echo '<span class="item item--shrink"><a href="' . get_category_link($subcategory->term_id) . '">' . $subcategory->name . '</a></span>';
			}
			*/?>
		</div>
	--><?php /*} */?>




</div>




<div class="order-block order-block--shrink">
<div class="categories">
	<div class="button--reverse">
		<span class="button__label"><?php _e('area','verga');?></span>
	</div>
</div>

<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>


<form class="woocommerce-ordering" method="get">
	<select name="orderby" class="orderby">
		<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
			<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
		<?php endforeach; ?>
	</select>
	<?php
		// Keep query string vars intact
		foreach ( $_GET as $key => $val ) {
			if ( 'orderby' === $key || 'submit' === $key ) {
				continue;
			}
			if ( is_array( $val ) ) {
				foreach( $val as $innerVal ) {
					echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
				}
			} else {
				echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
			}
		}
	?>

</form>

</div>