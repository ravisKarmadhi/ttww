<section class="product-section-main bg-white position-relative z-3">
	<div class="container px-p-0">
		<div class="tpt-205 dpt-200"></div>

		<div class="dmb-25 px-lg-0 px-3">
			<div class="garamond font89 space-1_78 leading85 res-font40 res-space-0_8 res-leading50 text-1B2995">The Shop</div>
		</div>

		<?php
		$terms = get_terms(array(
			'taxonomy' => 'product_cat',
			'hide_empty' => true,
		));
		if (!empty($terms) && !is_wp_error($terms)) :
		?>
			<div class="product-filter d-flex text-nowrap dmb-40 tmb-55 ps-3" id="category-filter">
				<button data-category="all" class="product-filter-btn border-0 px-3 py-1 radius8 me-2 text-1B2995 transition active">View all</button>
				<?php foreach ($terms as $term) : ?>
					<button data-category="<?php echo esc_attr($term->slug); ?>" class="product-filter-btn border-0 radius8 px-3 py-1 text-1B2995 transition me-2">
						<?php echo esc_html($term->name); ?>
					</button>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<div class="products columns-3 px-p-p">
			<div class="row row8 wow animate__fadeInUp" data-wow-duration="1.5s" id="product-list">
				<?php
				$args = array(
					'post_type' => 'product',
					'posts_per_page' => 12,
					'paged' => 1,
					'post_status' => 'publish',
					'orderby' => 'date',
					'order' => 'DESC',
				);

				$loop = new WP_Query($args);

				if ($loop->have_posts()) :
					while ($loop->have_posts()) : $loop->the_post();
						wc_get_template_part('content', 'product');
					endwhile;
				endif;

				$total_pages = $loop->max_num_pages;
				wp_reset_postdata();
				?>
			</div>
		</div>

		<?php if ($total_pages > 1) : ?>
			<div class="text-center tmt-60 dmt-80" id="load-more-wrapper">
				<button id="load-more-products" class="btnA border-1B2995-btn sans-medium font16 space-0_48 leading26 rounded-pill transition" data-page="2" data-category="">Load more +</button>
			</div>
		<?php endif; ?>

		<div class="dpt-150 tpt-120"></div>
	</div>
</section>
