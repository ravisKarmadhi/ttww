<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined('ABSPATH') || exit;
?>
<main class="woocommerce-shop">
  <?php woocommerce_content(); ?>
</main>
<?php
$shop_page_content = get_field("shop_page_content", "option");
$shop_page_content_heading = $shop_page_content['heading'];
$shop_page_content_descriptions = $shop_page_content['descriptions'];


?>
<section class="product-section-main bg-white position-relative z-3">
	<div class="container">

		<div class="tpt-150 dpt-200"></div>
		<div class="text-uppercase text-88B3DA font97 leading85 res-font40 res-leading50 aptly-bold text-center wow animated animate__fadeInUp" data-wow-duration="1.5s">
			<?php echo $shop_page_content_heading; ?>
		</div>
		<div
			class="font21 leading28 res-font16 res-leading26 bradon-regular col-lg-6 px-2 mx-auto mt-lg-3 tmt-15 text-center text-2F2F2F" data-wow-duration="1.5s"><?php echo $shop_page_content_descriptions; ?></div>
		<div class="tpt-100 dpt-80"></div>

		<?php if (woocommerce_product_loop()) : ?>
			<div class="products columns-3">
				<div class="row row11 res-row6 wow animated animate__fadeInUp" data-wow-duration="1.5s" id="product-list">
					<?php
						$paged = get_query_var('paged') ? get_query_var('paged') : 1;
						$args = array(
							'post_type' => 'product',
							'posts_per_page' => 6,
							'paged' => $paged,
							'post_status' => 'publish',
							'orderby' => 'date',
							'order' => 'DESC',
						);
						$loop = new WP_Query($args);
						if ($loop->have_posts()) :
							while ($loop->have_posts()) : $loop->the_post();
							wc_get_template_part('content', 'product');
						endwhile;
						wp_reset_postdata();
					endif;
					?>
				</div>
			</div>

			<div class="text-center tmt-60 dmt-80 wow animated animate__fadeIn " data-wow-duration="2s">
				<button id="load-more-products" class="btnA bg-707070-btn aptly-bold font22 leading26 text-505050 radius8 text-uppercase transition" data-page="2">Load MORE +</button>
			</div>
		<?php else : ?>
			<?php do_action('woocommerce_no_products_found'); ?>
		<?php endif; ?>

		<div class="dpt-185 tpt-85"></div>
	</div>
</section>

<?php
