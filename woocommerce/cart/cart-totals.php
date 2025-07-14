<?php

/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined('ABSPATH') || exit;
?>

<div class="cart_totals w-100 <?php echo (WC()->customer->has_calculated_shipping()) ? 'calculated_shipping' : ''; ?>">

	<?php do_action('woocommerce_before_cart_totals'); ?>

	<div cellspacing="0" class="shop_table shop_table_responsive">


		<?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
			<?php
			$packages = WC()->shipping()->get_packages();
			foreach ($packages as $i => $package) {
				$chosen_method = WC()->session->get("chosen_shipping_methods")[$i];
				$available_methods = $package['rates'];

				if (isset($available_methods[$chosen_method])) {
					$method = $available_methods[$chosen_method];
			?>
					<div class="shipping d-flex justify-content-between dmb-15">
						<div class="sans-normal font17 leading26 text-505050"><?php esc_html_e('Delivery', 'woocommerce'); ?></div>
						<div class="sans-normal font17 leading26 text-505050" data-title="<?php esc_attr_e('Delivery', 'woocommerce'); ?>">
							<?php echo wc_price($method->cost); ?>
						</div>
					</div>
			<?php
				}
			}
			?>
		<?php endif; ?>

		
		<div class="cart-subtotal d-flex justify-content-between dmb-20">
			<div class="sans-normal font17 leading26 text-505050"><?php esc_html_e('Subtotal', 'woocommerce'); ?></div>
			<div class="sans-normal font17 leading26 text-505050" data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>"><?php wc_cart_totals_subtotal_html(); ?></div>
		</div>


		<?php foreach (WC()->cart->get_fees() as $fee) : ?>
			<div class="fee">
				<div><?php echo esc_html($fee->name); ?></div>
				<div data-title="<?php echo esc_attr($fee->name); ?>"><?php wc_cart_totals_fee_html($fee); ?></div>
			</div>
		<?php endforeach; ?>

		<?php
		if (wc_tax_enabled() && !WC()->cart->display_prices_including_tax()) {
			foreach (WC()->cart->get_tax_totals() as $code => $tax) {
		?>
				<tr class="tax-rate tax-rate-<?php echo esc_attr(sanitize_title($code)); ?>">
					<th><?php echo esc_html($tax->label); ?></th>
					<td data-title="<?php echo esc_attr($tax->label); ?>"><?php echo wp_kses_post($tax->formatted_amount); ?></td>
				</tr>
		<?php
			}
		}
		?>

		<?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
			<tr class="cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
				<th><?php wc_cart_totals_coupon_label($coupon); ?></th>
				<td data-title="<?php echo esc_attr(wc_cart_totals_coupon_label($coupon, false)); ?>"><?php wc_cart_totals_coupon_html($coupon); ?></td>
			</tr>
		<?php endforeach; ?>


		<?php do_action('woocommerce_cart_totals_before_order_total'); ?>

		<div class="order-total d-flex justify-content-between dmb-35">
			<div class="sans-normal font21 leading28 text-2F2F2F"><?php esc_html_e('Total', 'woocommerce'); ?></div>
			<div class="sans-normal font21 leading28 text-2F2F2F" data-title="<?php esc_attr_e('Total', 'woocommerce'); ?>"><?php wc_cart_totals_order_total_html(); ?></div>
		</div>

		<?php do_action('woocommerce_cart_totals_after_order_total'); ?>

	</div>

	<div class="wc-proceed-to-checkout">
		<?php do_action('woocommerce_proceed_to_checkout'); ?>
	</div>

	<?php do_action('woocommerce_after_cart_totals'); ?>

</div>