<?php

/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined('ABSPATH') || exit;
?>
<div class="shop_table woocommerce-checkout-review-order-table">
	<div>
		<div class="d-flex justify-content-end align-items-center row tmb-45 dmb-30">
			<div class="product-name col-9 col-lg-8 sans-normal font14 leading26 text-191919 text-capitalize"><?php esc_html_e('product', 'woocommerce'); ?></div>
			<div class="product-total col-1 col-lg-2 sans-normal font14 leading26 text-191919 text-capitalize text-center"><?php esc_html_e('Qty', 'woocommerce'); ?></div>
			<div class="product-total col-2 sans-normal font14 leading26 text-191919 text-capitalize text-end"><?php esc_html_e('Price', 'woocommerce'); ?></div>
		</div>
	</div>
	<div class="main-producr-your-order tmb-55 dmb-45">
		<?php
		do_action('woocommerce_review_order_before_cart_contents');

		foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
			$_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

			if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key)) {
		?>
				<div class="d-flex align-items-center dmb-20 <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">
					<div class="product-name col-9 col-lg-8 d-flex align-items-center">
						<div class="product-img radius5 overflow-hidden me-3 me-lg-5">

							<?php
							$thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

							if (! $product_permalink) {
								echo $thumbnail; // PHPCS: XSS ok.
							} else {
								printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
							}
							?>

						</div>

						<div class="sans-normal font16 leading26 text-191919 pe-5 pe-lg-0">
							<?php echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key)) . '&nbsp;'; ?>
						</div>

						<?php echo wc_get_formatted_cart_item_data($cart_item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
						?>
					</div>
					<div class="col-1 col-lg-2 text-center">
						<?php echo apply_filters('woocommerce_checkout_cart_item_quantity', ' <div class="product-quantity sans-normal font16 leading26 text-191919">' . sprintf('%s', $cart_item['quantity']) . '</div>', $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
						?>
					</div>
					<div class="product-total col-2 text-end sans-normal font16 leading26 text-191919">
						<?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
						?>
					</div>
				</div>
		<?php
			}
		}

		do_action('woocommerce_review_order_after_cart_contents');
		?>
	</div>
	<div class="border-top border-BCBCBC dpt-50 ">
		<!-- <div class="shipping-section">
			<?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
				<?php do_action('woocommerce_review_order_before_shipping'); ?>
				<?php wc_cart_totals_shipping_html(); ?>
				<?php do_action('woocommerce_review_order_after_shipping'); ?>
			<?php endif; ?>
		</div> -->

		<div class="shipping-section">
			<?php foreach (WC()->shipping()->get_packages() as $i => $package) : ?>
    <?php
    $chosen_method = WC()->session->get('chosen_shipping_methods')[$i] ?? '';
    $package_methods = $package['rates'];
    ?>
    <?php foreach ($package_methods as $method_id => $method) : ?>
        <?php if ($method_id === $chosen_method) : ?>
            <div class="fee d-flex justify-content-between dmb-15">
                <div class="sans-medium font16 leading20 text-707070">
                    Delivery
                </div>
                <div class="sans-medium font16 leading20 text-182132">
                    <?php echo wc_price($method->cost); ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endforeach; ?>

		</div>
		<?php foreach (WC()->cart->get_fees() as $fee) : ?>
			<div class="fee d-flex justify-content-between dmb-15">
				<div class="sans-medium font16 leading20 text-707070"><?php echo esc_html($fee->name); ?></div>
				<div class="sans-medium font16 leading20 text-182132"><?php wc_cart_totals_fee_html($fee); ?></div>
			</div>
		<?php endforeach; ?>
		<?php if (wc_tax_enabled() && ! WC()->cart->display_prices_including_tax()) : ?>
			<?php if ('itemized' === get_option('woocommerce_tax_total_display')) : ?>
				<?php foreach (WC()->cart->get_tax_totals() as $code => $tax) : ?>
					<div class="tax-rate d-flex tax-rate-<?php echo esc_attr(sanitize_title($code)); ?>">
						<div><?php echo esc_html($tax->label); ?></div>
						<div><?php echo wp_kses_post($tax->formatted_amount); ?></div>
					</div>
				<?php endforeach; ?>
			<?php else : ?>
				<div class="tax-total d-flex">
					<div><?php echo esc_html(WC()->countries->tax_or_vat()); ?></div>
					<div><?php wc_cart_totals_taxes_total_html(); ?></div>
				</div>
			<?php endif; ?>
		<?php endif; ?>


		<div class="cart-subtotal d-flex justify-content-between dmb-15">
			<div class="sans-normal font16 leading26 text-707070"><?php esc_html_e('Subtotal', 'woocommerce'); ?></div>
			<div class="sans-normal font16 leading26 text-707070"><?php wc_cart_totals_subtotal_html(); ?></div>
		</div>


		<?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
			<div class="cart-discount d-flex coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
				<div><?php wc_cart_totals_coupon_label($coupon); ?></div>
				<div><?php wc_cart_totals_coupon_html($coupon); ?></div>
			</div>
		<?php endforeach; ?>


		<?php do_action('woocommerce_review_order_before_order_total'); ?>
		<div class="order-total d-flex justify-content-between dmb-15">
			<div class="sans-medium font20 leading26 text-182132"><?php esc_html_e('Total', 'woocommerce'); ?></div>
			<div class="sans-medium font20 leading26 text-182132"><?php wc_cart_totals_order_total_html(); ?></div>
		</div>
		<?php do_action('woocommerce_review_order_after_order_total'); ?>

	</div>
</div>