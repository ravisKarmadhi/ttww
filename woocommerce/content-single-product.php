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
	<div class="container">
		<div class="row">

			<!-- Product Images (Left Column) -->
			<div class="col-lg-7 col-12 product-images position-relative tmb-35">
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
				<div class="col-lg-10 pe-lg-4 ms-auto">

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
							<div class="woocommerce-product-description bradon-regular font17 leading26 text-505050 pe-5 dmb-40">';
							echo apply_filters('the_content', get_the_content());
							echo '</div></div>';
							echo '<a href="" class="read-more-btn bradon-regular font17 leading26 text-505050">Read More +</a>';
						}

						?>
						<div class="add-to-cart-wrapper <?php echo $product->get_type(); ?>-products dmt-40">
							<?php
							// Show Add to Cart button
							woocommerce_template_single_add_to_cart();
							?>
						</div>




					</div>
				</div>

			</div>

		</div>
	</div>

	<div class="spacing tmb-65 dmb-150"></div>

	<section class="faq-section position-relative bg-white">
		<div class="container">
			<div class="col-lg-10 closet-accordion">
				<?php
				$select_faqs_category = get_field('select_faqs_category');
				$category_slug = '';

				if ($select_faqs_category) {
					$category = get_term($select_faqs_category);
					if (!is_wp_error($category)) {
						$category_slug = $category->slug;
					}
				}

				if ($category_slug) {
					$args = array(
						'post_type'      => 'product_faqs',
						'posts_per_page' => -1,
						'post_status'    => 'publish',
						'orderby'        => 'date',
						'order'          => 'DESC',
						'tax_query'      => array(
							array(
								'taxonomy' => 'product_faq_category',
								'field'    => 'slug',
								'terms'    => $category_slug,
							),
						),
					);

					$product_faq_query = new WP_Query($args);

					if ($product_faq_query->have_posts()) :
						while ($product_faq_query->have_posts()) : $product_faq_query->the_post();
							$product_faq_title = get_the_title();
							$product_faq_content = get_the_content();
				?>
							<div class="accordion-item radius20 overflow-hidden tmb-15 dmb-30">
								<div class="closet-header radius20 position-relative tpt-25 tpb-25 dpt-30 dpb-30 d-flex justify-content-between align-items-center cursor-pointer transition">
									<div class="aptly-medium col-lg-11 col-10 font32 leading30 res-font26 res-leading36 text-uppercase text-505050">
										<?php echo esc_html($product_faq_title); ?>
									</div>
									<div class="arrow-bg bg-505050 rounded-circle d-flex justify-content-center align-items-center">
										<div class="accordion-arrow d-flex align-items-center justify-content-center transition">
											<img class="w-100 object-cover" src="<?php echo esc_url(get_template_directory_uri()); ?>/resources/assets/images/white-plus.svg" alt="white-plus">
										</div>
									</div>
								</div>
								<div class="closet-content dpb-30 ps-3 pe-4 px-lg-5">
									<div class="col-lg-10 col-11 bradon-regular font17 res-font16 leading26 text-505050">
										<?php echo wp_kses_post($product_faq_content); ?>
									</div>
								</div>
							</div>
				<?php
						endwhile;
						wp_reset_postdata();
					endif;
				}
				?>
			</div>
		</div>
	</section>

	<div class="spacing  dmb-190 tmb-95"></div>

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