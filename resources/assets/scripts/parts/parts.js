let isLoading = false;

export class Parts {

	init() {
		this.DeliveryMethod();
		this.FilterDropDown();
	}
	
	DeliveryMethod(){
		$(document).ready(function ($) {
			function updateShippingVisibility() {
				const selected = $('input[name="delivery_method"]:checked').val();
	
				if (selected === 'home') {
					$('.shipping-section').slideDown();
				} else {
					$('.shipping-section').slideUp();
				}
	
				// Important: Trigger WooCommerce to recalculate totals
				$('body').trigger('update_checkout');
			}
	
			// Bind event
			$(document).on('change', 'input[name="delivery_method"]', updateShippingVisibility);
	
			// On page load
			updateShippingVisibility();
		});
	}

	FilterDropDown(){
		// $(document).ready(function () {
		// 	$('.filter-btn').on('click', function (e) {
		// 		e.stopPropagation(); // Prevent event from bubbling up
		// 		$('.more-filter').toggleClass('d-none');
		// 	});
		// 	$(document).on('click', function () {
		// 		$('.more-filter').addClass('d-none');
		// 	});
		// 	$('.more-filter').on('click', function (e) {
		// 		e.stopPropagation();
		// 	});
		// });

		$(document).ready(function () {
	// Show/hide More Filters dropdown
	$('.filter-btn').on('click', function (e) {
		e.stopPropagation();

		if ($('.more-filter').hasClass('d-none')) {
			$('.more-filter').removeClass('d-none');
		} else {
			$('.more-filter').addClass('d-none');
		}
	});

	// Close More Filters if clicked outside
	$(document).on('click', function () {
		$('.more-filter').addClass('d-none');
	});

	// Prevent closing when clicking inside More Filters
	$('.more-filter').on('click', function (e) {
		e.stopPropagation();
	});

	// Handle category button clicks (first two categories + View All)
	$('body').on('click', '.category-btn', function () {
		$('.category-btn').removeClass('active');
		$(this).addClass('active');

		// Uncheck all checkboxes when button clicked
		$('.category-checkbox').prop('checked', false);

		// Reset load more
		$('.load-more').attr("data-items", "13");

		// Trigger main filter function
		if (typeof window.filter !== 'undefined' && typeof window.filter.ProjectFilter === 'function') {
			window.filter.ProjectFilter();
		}
	});

	// Handle checkbox changes (extra categories)
	$(document).on('change', '.category-checkbox', function () {
		let selectedCategories = [];

		$('.category-checkbox:checked').each(function () {
			selectedCategories.push($(this).val());
		});

		// Remove active class from all buttons
		$('.category-btn').removeClass('active');

		if (selectedCategories.length === 0) {
			// If no checkbox selected, reset to "View All"
			$(".category-btn[data-category='all']").addClass('active');
		} else {
			// Simulate active category button using first selected
			const fakeCategory = selectedCategories.join(',');
			// Reuse the first category button just to set data-category
			$(".category-btn").first().addClass('active').attr('data-category', fakeCategory);
		}

		// Reset load more
		$('.load-more').attr("data-items", "13");

		// Trigger main filter function
		if (typeof window.filter !== 'undefined' && typeof window.filter.ProjectFilter === 'function') {
			window.filter.ProjectFilter();
		}
	});
});


	}
}
