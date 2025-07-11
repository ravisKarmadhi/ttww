<?php

/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.1.0
 *
 * @var WC_Order $order
 */

use function Curious\Wrapper\template_path;

defined('ABSPATH') || exit;
?>

<div class="woocommerce-order">

	<?php
	if ($order) :

		do_action('woocommerce_before_thankyou', $order->get_id());
	?>

		<?php if ($order->has_status('failed')) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce'); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>" class="button pay"><?php esc_html_e('Pay', 'woocommerce'); ?></a>
				<?php if (is_user_logged_in()) : ?>
					<a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="button pay"><?php esc_html_e('My account', 'woocommerce'); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

			<div class="d-none">
				<?php wc_get_template('checkout/order-received.php', array('order' => $order)); ?>
			</div>

			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details d-none">

				<li class="woocommerce-order-overview__order order">
					<?php esc_html_e('Order number:', 'woocommerce'); ?>
					<strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
							?></strong>
				</li>

				<li class="woocommerce-order-overview__date date">
					<?php esc_html_e('Date:', 'woocommerce'); ?>
					<strong><?php echo wc_format_datetime($order->get_date_created()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
							?></strong>
				</li>

				<?php if (is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email()) : ?>
					<li class="woocommerce-order-overview__email email">
						<?php esc_html_e('Email:', 'woocommerce'); ?>
						<strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
								?></strong>
					</li>
				<?php endif; ?>

				<li class="woocommerce-order-overview__total total">
					<?php esc_html_e('Total:', 'woocommerce'); ?>
					<strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
							?></strong>
				</li>

				<?php if ($order->get_payment_method_title()) : ?>
					<li class="woocommerce-order-overview__payment-method method">
						<?php esc_html_e('Payment method:', 'woocommerce'); ?>
						<strong><?php echo wp_kses_post($order->get_payment_method_title()); ?></strong>
					</li>
				<?php endif; ?>

			</ul>


			<section class="order-complete-section position-relative h-vh">
				<div class="position-absolute top-0 start-0 dpt-40 dpb-40 w-100 z-3">
						<div class="container">
						<div class="col-6 col-lg-4 header-logo d-lg-block d-flex justify-content-center align-items-center">
							<a href="/" class="">
								<img src="<?php echo get_template_directory_uri(); ?>/templates/icons/black-logo.svg" alt="black-logo" class="h-100 black-logo" />
							</a>
						</div>
					</div>
				</div>
				<div class="row align-items-center h-100">
					<div class="position-absolute top-0 start-0 w-100 h-100">
						<div class="col-lg-7 col-12 bg-FDE5E9 left-content h-100"></div>
					</div>
					<div class="position-absolute top-0 start-0 h-100 w-100 d-flex align-items-center justify-content-center text-center">
						<div class="container">
							<div class="col-lg-6 col-12 h-100">
								<div class="aptly-bold font77 leading85 text-707070 dmb-25 res-font40 res-leading50 text-uppercase tmb-20">order complete</div>
								<div class="bradon-regular font17 leading26 res-font16 res-leading24 text-707070">Your order number #<?php echo $order->get_id(); ?> and will be with you soon.</div>
								<div class="d-lg-flex d-block align-items-center justify-content-center btn-group dmt-40 tmt-35">
									<a href="<?php echo get_home_url(); ?>" class="text-decoration-none btnA bg-F9AFBD-btn aptly-bold font22 leading83  res-w-100 text-uppercase text-505050 radius8 transition d-inline-flex align-items-center justify-content-center me-lg-3">
										CONTINUE TO HOMEPAGE
									</a>
									<a href="<?php echo get_home_url(); ?>/my-account//view-order/<?php echo $order->get_id(); ?>/" class="text-decoration-none btnA bg-F9AFBD-btn aptly-bold font22 leading83 text-uppercase res-w-100 text-505050 radius8 transition d-inline-flex align-items-center justify-content-center tmt-20">
										VIEW MY ORDER
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-12 ms-auto h-100 d-lg-block d-none">
						<div class="order-complete h-100 w-100">
							<img src="<?php echo get_home_url(); ?>/wp-content/uploads/2025/05/pannel-right.png" alt="pannel-right" class="h-100 w-100 object-cover">
						</div>
					</div>
				</div>
			</section>


		<?php endif; ?>
		<div class="d-none">
			<?php do_action('woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id()); ?>
			<?php do_action('woocommerce_thankyou', $order->get_id()); ?>
		</div>

	<?php else : ?>

		<?php wc_get_template('checkout/order-received.php', array('order' => false)); ?>

	<?php endif; ?>

</div>