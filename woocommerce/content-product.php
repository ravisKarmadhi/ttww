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

defined('ABSPATH') || exit;
global $product;

// Ensure visibility.
if (empty($product) || ! $product->is_visible()) {
	return;
}
?>

<div class="col-6 col-xl-3 col-lg-4 shop-product dmb-85 tmb-35" <?php wc_product_class('custom-shop-card', $product); ?>>
	<a href="<?php the_permalink(); ?>" class="shop-card-link w-100 text-decoration-none">
		<div class="shop-card-image w-100 radius5 overflow-hidden tmb-20 dmb-20">
			<?php echo $product->get_image(); ?>
		</div>
		<h2 class="shop-card-title garamond font24 leading36 space-0_48 res-font18 res-space-0_36 res-leading24 text-1B2995 dmb-5"><?php the_title(); ?></h2>
		<span class="shop-card-price sans-medium font16 space-0_48 leading26 res-font14 res-space-0_42 res-leading24 text-858AB5"><?php echo $product->get_price_html(); ?></span>
	</a>
</div>