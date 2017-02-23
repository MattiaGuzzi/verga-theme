<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
/**
 * woocommerce_before_single_product hook.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}
?>
<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="product-schedule">
	<?php
		/**
		 * woocommerce_before_single_product_summary hook.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="product-schedule__summary product-schedule__summary--shrink">

		<?php
			/**
			 * woocommerce_single_product_summary hook.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>

	</div><!-- .summary -->
	</div>
	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_output_related_products - 15
		 * @hooked woocommerce_upsell_display - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>


<section class="catalog">
	<?php global $product;
	global $product;
	$terms =  wp_get_post_terms( get_the_ID(), 'product_cat', array('orderby' => 'term_group', 'parent' => 0));
	foreach ($terms as $term) {
		$thumbnail_id = get_woocommerce_term_meta( wp_get_post_parent_id( $term->term_id ), 'thumbnail_id', true);
		$image = wp_get_attachment_image_src($thumbnail_id, 'full')[0];?>

		<div class="catalog__item">
			<div class="background" style="background-image: url('<?php echo $image ?>')"></div>
			<div class="block block--grow-lg block--shrink">
				<h2 class="block__title block__title--grow-md-top"><?php echo $term->name; ?></h2>
				<p class="block__description block__description--grow-md"><?php echo $term->description; ?></p>
				<div class="block__submenu">
					<?php
					$args = array(
						'orderby' => 'name',
						'hide_empty' => 0,
						'parent' => $term->term_id,
					);
					$subcategories = get_terms('product_cat', $args);
					foreach ($subcategories as $subcategory) {
						echo '<span class="item"><a href="' . get_category_link($subcategory->term_id) . '">' . $subcategory->name . '</a></span>';
					}
					?>
				</div>
				<div class="block__button">
					<a href="<?php get_term_link( $term ); ?>" class="button button--rotate">
						<span class="button__label"><?php _e('Scopri tutto', 'verga') ?></span>
					</a>
				</div>
				<div class="block__overlay"><p class="totale"><?php echo $term->count; _e(" prodotti","verga")?></p></div>
			</div>
		</div>
		<?php
	}
	?>
</section>