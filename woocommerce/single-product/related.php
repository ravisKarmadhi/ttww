<?php

/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     9.6.0
 */

if (! defined('ABSPATH')) {
	exit;
}

if ($related_products) : ?>

	<section class="related products overflow-hidden">
		<div class="container">
			<?php
			$heading = apply_filters('woocommerce_product_related_products_heading', __('Related products', 'woocommerce'));
			if ($heading) : ?>
				<h2 class="aptly-bold font77 leading85 res-font40 res-leading50 text-88B3DA text-uppercase tmb-35 dmb-60"><?php echo esc_html($heading); ?></h2>
			<?php endif; ?>
			<div class="col-8 col-md-12">
				<div class="related-product-slider">
					<?php foreach ($related_products as $related_product) :
						$post_object = get_post($related_product->get_id());
						setup_postdata($GLOBALS['post'] = $post_object);
						wc_get_template_part('content', 'product');
					endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<div class="spacing tmb-70 dmb-145"></div>
<?php
endif;
wp_reset_postdata();
