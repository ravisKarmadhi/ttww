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
function get_flat_rate_cost_for_current_user()
{
	$shipping_packages = WC()->cart->get_shipping_packages();
	$package = $shipping_packages[0];

	$zone = WC_Shipping_Zones::get_zone_matching_package($package);
	if (!$zone) return false;

	foreach ($zone->get_shipping_methods() as $method) {
		if ($method->id === 'flat_rate') {
			$cost = floatval($method->get_option('cost'));
			return wc_price($cost);
		}
	}
	return false;
}

$flat_rate_cost = get_flat_rate_cost_for_current_user();

$shipping_packages = WC()->cart->get_shipping_packages();
$package = $shipping_packages[0];
$zone = WC_Shipping_Zones::get_zone_matching_package($package);

if ($zone) :
    $shipping_methods = $zone->get_shipping_methods();
    $enabled_methods = array_filter($shipping_methods, fn($method) => $method->enabled === 'yes');

    if (!empty($enabled_methods)) :

        // If only one method, show checkbox; else show radios
        if (count($enabled_methods) === 1) {
            // Only one method - checkbox
            $method = reset($enabled_methods);
            $method_title = $method->get_title();
            $cost_float = floatval($method->get_option('cost'));
            $method_cost = wc_price($cost_float);
            $method_id = esc_attr($method->id);
            $input_name = 'home_delivery_method';
            $input_id = 'home_delivery_method_' . $method_id;

            // Get saved session value to pre-check
            $selected_method = WC()->session->get('home_delivery_method');
            $checked = ($selected_method === $method_id) ? 'checked' : '';
        ?>
            <div class="form-row form-row-wide">
            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                    <input
                       type="checkbox"
                        class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox"
                        name="<?php echo $input_name; ?>"
                        id="<?php echo $input_id; ?>"
                        value="<?php echo $method_id; ?>"
                        <?php echo $checked; ?>
                    />
                    <span><?php echo esc_html($method_title) . ' ' . $method_cost; ?></span>
                </label>
            </div>
                    <?php
        } else {
            // Multiple methods - radios
            ?>
            <div class="form-row form-row-wide" id="home_delivery_radio_group">
                <label class="woocommerce-form__label">
                    <?php esc_html_e('Choose your preferred shipping method:', 'woocommerce'); ?>
                </label>
                <?php
                $selected_method = WC()->session->get('home_delivery_method');
                foreach ($enabled_methods as $key => $method) :
                    $method_title = $method->get_title();
                    $cost_float = floatval($method->get_option('cost'));
                    $method_cost = wc_price($cost_float);
                    $method_id = esc_attr($method->id);
                    $input_name = 'home_delivery_method';
                    $input_id = 'home_delivery_method_' . $method_id;
                    ?>
                    <div class="form-row form-row-wide">
                        <label class="woocommerce-form__label woocommerce-form__label-for-radio radio">
                            <input
                                class="woocommerce-form__input woocommerce-form__input-radio input-radio"
                                type="radio"
                                name="<?php echo $input_name; ?>"
                                id="<?php echo $input_id; ?>"
                                value="<?php echo $key; ?>"
                            />
                            <span><?php echo esc_html($method_title) . ' ' . $method_cost; ?></span>
            </label>
                    </div>
                <?php endforeach; ?>
        </div>
    <?php
        }
    endif;
endif;
?>
