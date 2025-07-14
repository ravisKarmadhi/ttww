<?php

/**
 * Checkout shipping information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-shipping.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 * @global WC_Checkout $checkout
 */

defined('ABSPATH') || exit;
?>
<div class="woocommerce-shipping-fields">
	<?php if (true === WC()->cart->needs_shipping_address()) : ?>

		<div class="dmt-30 tmt-20" id="ship-to-different-address">
			<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox-container checkbox d-flex align-items-center cursor-pointer">
				<input id="ship-to-different-address-checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox d-none" <?php checked(apply_filters('woocommerce_ship_to_different_address_checked', 'shipping' === get_option('woocommerce_ship_to_destination') ? 1 : 0), 1); ?> type="checkbox" name="ship_to_different_address" value="1" />
				<div class="sans-normal font16 leading24 text-191919"><?php esc_html_e('Is your billing address the same as the delivery', 'woocommerce'); ?></div>
				<span class="checkmark position-relative cursor-pointer d-block ms-1" type="checkbox" name="" id="">
			</label>
		</div>

		<div class="shipping_address">

			<?php do_action('woocommerce_before_checkout_shipping_form', $checkout); ?>

			<div class="woocommerce-shipping-fields__field-wrapper">
				<?php
				$fields = $checkout->get_checkout_fields('shipping');

				foreach ($fields as $key => $field) {
					woocommerce_form_field($key, $field, $checkout->get_value($key));
				}
				?>
			</div>

			<?php do_action('woocommerce_after_checkout_shipping_form', $checkout); ?>

		</div>

	<?php endif; ?>
</div>
<div class="woocommerce-additional-fields">
	<?php do_action('woocommerce_before_order_notes', $checkout); ?>

	<?php if (apply_filters('woocommerce_enable_order_notes_field', 'yes' === get_option('woocommerce_enable_order_comments', 'yes'))) : ?>

		<?php if (! WC()->cart->needs_shipping() || wc_ship_to_billing_address_only()) : ?>

			<div class="sans-normal font17 leading26 text-505050"><?php esc_html_e('Additional information', 'woocommerce'); ?></div>

		<?php endif; ?>

		<div class="woocommerce-additional-fields__field-wrapper">
			<?php foreach ($checkout->get_checkout_fields('order') as $key => $field) : ?>
				<?php woocommerce_form_field($key, $field, $checkout->get_value($key)); ?>
			<?php endforeach; ?>
		</div>

	<?php endif; ?>

	<?php do_action('woocommerce_after_order_notes', $checkout); ?>
</div>


<?php
$selected = WC()->session->get('custom_delivery_option');
?>
<div class="delivery-method-options dmt-60">
	<label class="form-checkbox sans-normal font16 leading24 text-191919">
		<input type="checkbox" name="delivery_method" value="home" checked>
		<span class="checkmark position-absolute top-50 start-0"></span>
		Home
		<?php
		WC()->cart->calculate_shipping();
		$delivery_label = 'Delivery';
		$delivery_cost = 0;
		foreach (WC()->shipping->get_packages()[0]['rates'] as $rate) {
			if (stripos($rate->get_label(), $delivery_label) !== false) {
				$delivery_cost = $rate->get_cost();
				break;
			}
		}
		echo $delivery_label . ' ' . wc_price($delivery_cost) . '';
		?>
	</label>

</div>