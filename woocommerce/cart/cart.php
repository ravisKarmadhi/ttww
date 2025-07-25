<?php

/**
 * Cart Page
 *
 * Template override: yourtheme/woocommerce/cart/cart.php
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_cart'); ?>

<div class="bg-white">
	<div class="cart-section">
		<div class="container">
			<div class="row justify-content-between dpt-200 dpb-150 tpt-175 tpb-100 bg-white custom-row">
				<div class="col-lg-12">
					<div class="row justify-content-between">
						<form class="woocommerce-cart-form col-lg-6 col-12" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
							<?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
							<?php do_action('woocommerce_before_cart_table'); ?>

							<div class="shop_table shop_table_responsive cart woocommerce-cart-form__contents row" cellspacing="0">
								<div class="col-12 garamond font32 leading38 text-1B2995 text-capitalize dpb-15 tpb-25 border-bottom boder-BCBCBC">
									Your Basket [<span class="cart-count"><?php echo WC()->cart->cart_contents_count; ?></span>]
								</div>
								<div class="d-flex align-items-center dpt-20">
									<div class="product-name col-8"><?php esc_html_e('', 'woocommerce'); ?></div>
									<div class="product-quantity col-2 text-end sans-normal font16 leading20 text-191919"><?php esc_html_e('Qty', 'woocommerce'); ?></div>
									<div class="product-subtotal col-2 text-end sans-normal font16 leading20 text-191919"><?php esc_html_e('Price', 'woocommerce'); ?></div>
								</div>

								<?php do_action('woocommerce_before_cart_contents'); ?>

								<?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) :
									$_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
									$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

									if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) :
										$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
								?>
										<div class="woocommerce-cart-form__cart-item tmb-20 dmb-30 <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

											<!-- Product Image -->
											<div class="row justify-content-between align-items-center dmb-15">
												<div class="col-xl-2 cart-img radius8 overflow-hidden col-4">
													<?php
													$thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
													echo sprintf('<a class="h-100" href="%s">%s</a>', esc_url($product_permalink), $thumbnail);
													?>
												</div>

												<!-- Product Name -->
												<div class="col-xl-4 col-lg-3 col-sm-4 col-8 ms-4">
													<?php
													echo wp_kses_post(apply_filters(
														'woocommerce_cart_item_name',
														sprintf('<a class="sans-normal font16 leading24 text-191919 text-decoration-none" href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()),
														$cart_item,
														$cart_item_key
													));
													echo wc_get_formatted_cart_item_data($cart_item);

													if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
														echo '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>';
													}
													?>
												</div>

												<!-- Quantity -->
												<div class="col-xl-6 col-lg-6 col-sm-4 d-flex justify-content-end mt-3 mt-md-0">
													<?php
													woocommerce_quantity_input(
														array(
															'input_name'   => "cart[{$cart_item_key}][qty]",
															'input_value'  => $cart_item['quantity'],
															'max_value'    => $_product->get_max_purchase_quantity(),
															'min_value'    => $_product->is_sold_individually() ? 1 : 0,
															'product_name' => $_product->get_name(),
														),
														$_product,
														true
													);
													?>
												</div>

												<!-- Subtotal -->
												<div class="col-md-3 col-6 text-end mt-3 mt-md-0">
													<?php
													echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key);
													?>
												</div>
											</div>
										</div>

								<?php endif;
								endforeach; ?>

								<?php do_action('woocommerce_cart_contents'); ?>

								<div class="d-flex justify-content-end border-top border-bottom border-BCBCBC dpt-5 dpb-5">
									<a class="sans-normal font20 res-font16 res-leading30 text-191919 text-capitalize text-decoration-none ms-3" href="<?php echo get_home_url(); ?>/shop">
										Continue Shopping
									</a>
									<button type="submit" id="delayed-submit"
										class="sans-normal font20 res-font16 res-leading30 text-191919 text-decoration-none text-capitalize border-0 bg-transparent ms-3"
										name="update_cart"
										value="<?php esc_attr_e('Update basket', 'woocommerce'); ?>">
										<?php esc_html_e('Update basket', 'woocommerce'); ?>
									</button>
									<script>
										document.addEventListener("DOMContentLoaded", function() {
											let actionTriggered = false;
											const button = document.getElementById("delayed-submit");
											const woocommerceMessage = document.querySelector(".woocommerce-notices-wrapper");
											if (button) {
												button.addEventListener("click", function(event) {
													if (actionTriggered) return;
													actionTriggered = true;
													if (woocommerceMessage) {
														woocommerceMessage.classList.add("d-none");
													}
													setTimeout(function() {
														location.reload();
													}, 500);
												});
											}
										});
									</script>
								</div>

								<?php do_action('woocommerce_after_cart_contents'); ?>
							</div>

							<?php do_action('woocommerce_after_cart_table'); ?>

							<?php if (wc_coupons_enabled()) : ?>
								<div class="coupon col-lg-11 col-xl-9 tmt-25 dmt-40 tmb-45 mb-4">
									<div class="pe-lg-5">
										<div class="position-relative">
											<input type="text" name="coupon_code" class="coupon-input sans-medium font18 leading24 text-191919 radius8 w-100 px-3" id="coupon_code" value="" placeholder="<?php esc_attr_e('Enter promo code', 'woocommerce'); ?>" />
											<div class="position-absolute top-center end-0">
												<button type="submit" class="btnA bg-1B2995-btn sans-medium font16 space-0_48 leading26 rounded-pill text-decoration-none d-inline-flex justify-content-center align-items-center transition me-2" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>">
													<?php esc_html_e('Apply coupon', 'woocommerce'); ?>
												</button>
											</div>
											<?php do_action('woocommerce_cart_coupon'); ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
						</form>
					</div>
					<div class="col-lg-5 col-12">
						<div class="cart-collaterals dpt-65 px-4 px-lg-5 dpb-40 radius40 res-radius20">
							<?php
							/**
							 * Cart collaterals hook.
							 *
							 * @hooked woocommerce_cross_sell_display
							 * @hooked woocommerce_cart_totals - 10
							 */
							do_action('woocommerce_cart_collaterals');
							?>
						</div>
					</div>
				</div>
				<?php do_action('woocommerce_before_cart_collaterals'); ?>
			</div>
			<?php do_action('woocommerce_after_cart'); ?>
		</div>
	</div>
</div>