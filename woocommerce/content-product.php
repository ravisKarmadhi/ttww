<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

	<div class="col-6 col-lg-4 shop-product" <?php wc_product_class( 'custom-shop-card', $product ); ?>>
		<a href="<?php the_permalink(); ?>" class="shop-card-link w-100 text-decoration-none">
			<div class="shop-card-image w-100 radius20 overflow-hidden tmb-20 dmb-25">
				<?php echo $product->get_image(); ?>
			</div>
			<h2 class="shop-card-title aptly-medium font32 leading37 res-font26 text-505050 tmb-10 dmb-5"><?php the_title(); ?></h2>
			<span class="shop-card-price bradon-regular font17 leading26 res-font16 text-505050"><?php echo $product->get_price_html(); ?></span>
		</a>
	</div>
