<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

if (! defined('ABSPATH')) {
	exit;
}

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in()) {
	echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
	return;
}

?>
<div class="bg-white">
	<div class="container">
		<form name="checkout" method="post" class="checkout woocommerce-checkout row justify-content-between dpt-230 dpb-210 tpt-145 tpb-45" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data" aria-label="<?php echo esc_attr__('Checkout', 'woocommerce'); ?>">

			<div class="col-lg-6 pe-3">
				<?php if ($checkout->get_checkout_fields()) : ?>
					<div class="" id="customer_details">
						<div class="">
							<?php do_action('woocommerce_checkout_billing'); ?>
						</div>

						<div class="">
							<?php do_action('woocommerce_checkout_shipping'); ?>
						</div>
					</div>

					<?php do_action('woocommerce_checkout_after_customer_details'); ?>

				<?php endif; ?>
			</div>
			<div class="col-lg-6  radius40 dpt-55 dpb-30 tpt-40 dpb-40 payment-box">
				<div class="col-lg-11 ms-auto ps-lg-5">
					<?php do_action('woocommerce_checkout_before_order_review_heading'); ?>


					<?php do_action('woocommerce_checkout_before_order_review'); ?>

					<div id="order_review" class="woocommerce-checkout-review-order d-flex align-items-center justify-content-between border-bottom border-BCBCBC dpb-25 dmb-20">
						<div class="order-title d-flex justify-content-between align-items-center w-100">
							<div class="garamond font36 leading38 text-1B2995 text-capitalize" id="order_review_heading"><?php esc_html_e('Your order', 'woocommerce'); ?></div>
							<div class="">
								<a href="/cart/" class="sans-normal font21 text-2F2F2F">
									Amend
								</a>
							</div>
						</div>
					</div>
					<?php do_action('woocommerce_checkout_order_review'); ?>

					<?php do_action('woocommerce_checkout_after_order_review'); ?>
				</div>
			</div>
		</form>
	</div>
</div>
<?php do_action('woocommerce_after_checkout_form', $checkout); ?>