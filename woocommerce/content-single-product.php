<?php
defined('ABSPATH') || exit;
global $product;

do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form();
	return;
}
?>
<div class="spacing dpb-170 tpb-125 bg-white position-relative z-3"></div>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('single-product-custom-layout bg-white position-relative z-3', $product); ?>>
	<div class="container px-p-0">
		<div class="row px-p-p">

			<!-- Product Images (Left Column) -->
			<div class="col-lg-6 col-12 product-images position-relative tmb-25">
				<?php
				/**
				 * Hook: woocommerce_before_single_product_summary.
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				do_action('woocommerce_before_single_product_summary');
				?>
			</div>

			<!-- Product Info (Right Column) -->
			<div class="col-lg-5 col-12 product-info">
				<div class="col-lg-10 pe-lg-4 ps-lg-2 ms-auto">
					<div class="summary entry-summary w-100">
						<?php
						// Show Title
						woocommerce_template_single_title();

						// Show Price
						woocommerce_template_single_price();

						// Show Short Description (optional)
						woocommerce_template_single_excerpt();


						$content = get_the_content();

						if (!empty(trim($content))) {
							// Show Full Product Content (Description)
							echo '<div class="woocommerce-product-description-wrapper">
							<div class="woocommerce-product-description sans-normal font17 leading26 text-505050 pe-5 dmb-40">';
							echo apply_filters('the_content', get_the_content());
							echo '</div></div>';
							echo '<a href="" class="read-more-btn sans-normal font17 leading26 text-505050">Read More +</a>';
						}

						?>
						<div class="add-to-cart-wrapper <?php echo $product->get_type(); ?>-products">
							<?php
							// Show Add to Cart button
							woocommerce_template_single_add_to_cart();
							?>
						</div>
						<div>
							<?php
							global $product;

							if (have_rows('shop_accordion', $product->get_id())): ?>
								<div class="shop-accordion">
									<?php while (have_rows('shop_accordion', $product->get_id())): the_row();
									?>
										<div class="accordion-item dpt-15 dpb-15">
											<div class="closet-header d-flex align-items-center justify-content-between">
												<div class="garamond font20 leading36 text-1B2995">
													<?php the_sub_field('heading'); ?>
												</div>
												<div class="accordion-arrow d-inline-flex">
													<img src="<?php echo get_template_directory_uri(); ?>/templates/icon/blue-polygon.svg" alt="" class="h-100">
												</div>
											</div>
											<div class="closet-content sans-normal font16 leading24 text-191919 tpt-15 dpt-20">
												<?php the_sub_field('description'); // if you have a 'content' subfield 
												?>
											</div>
										</div>
									<?php endwhile; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="spacing tmb-95 dmb-100"></div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action('woocommerce_after_single_product_summary');
	?>

</div>

<?php do_action('woocommerce_after_single_product'); ?>