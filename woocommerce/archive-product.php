<section class="product-section-main bg-white position-relative z-3">
	<div class="container">
		<div class="tpt-150 dpt-200"></div>

		<div class="">
			<div class="dmb-20">The Shop</div>
		</div>

		<?php
		$terms = get_terms(array(
			'taxonomy' => 'product_cat',
			'hide_empty' => true,
		));
		if (!empty($terms) && !is_wp_error($terms)) :
		?>
			<div class="product-filter mb-4" id="category-filter">
				<button data-category="all" class="product-filter-btn active">View all</button>
				<?php foreach ($terms as $term) : ?>
					<button data-category="<?php echo esc_attr($term->slug); ?>" class="product-filter-btn">
						<?php echo esc_html($term->name); ?>
					</button>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<div class="dpt-40"></div>

		<div class="products columns-3">
			<div class="row wow animate__fadeInUp" data-wow-duration="1.5s" id="product-list">
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
				<button id="load-more-products" class="btnA" data-page="2" data-category="">Load more +</button>
			</div>
		<?php endif; ?>

		<div class="dpt-185 tpt-85"></div>
	</div>
</section>
