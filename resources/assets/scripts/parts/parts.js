let isLoading = false;

export class Parts {

	init() {
		this.DeliveryMethod();
		this.FilterDropDown();
	}

	DeliveryMethod() {
		$(document).ready(function ($) {
			function updateShippingOption() {
        var isChecked = $('input[name="delivery_method"]').is(':checked') ? 1 : 0;

        $.ajax({
            type: 'POST',
            url: wc_checkout_params.ajax_url,
            data: {
                action: 'update_shipping_option',
                delivery_option: isChecked,
            },
            success: function(response) {
                // Trigger checkout update after session is updated
                $('body').trigger('update_checkout');
            }
        });
    }

    $('input[name="delivery_method"]').on('change', function(){
        updateShippingOption();
    });

    // On page load
    updateShippingOption();
		});
	}

	FilterDropDown() {
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
					$(this).addClass('active');
					$('.category-btn').removeClass('active');
				} else {
					$('.more-filter').addClass('d-none');
					$(this).removeClass('active');
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
				$('.filter-btn').removeClass('active');
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

				$('.category-btn').removeClass('active');

				if (selectedCategories.length === 0) {
					$(".category-btn[data-category='all']").addClass('active');
				} else {
					const fakeCategory = selectedCategories.join(',');
					$(this).closest('.category-btn').addClass('active').attr('data-category', fakeCategory)
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

